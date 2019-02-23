<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Cache;
use Validator;

class TeamsController extends \App\Http\Controllers\Controller
{   
    /**
     * Validation Rules
     */
    public $rules = array(
        'display_name' => 'required',
        'designation' => 'required',
        'about' => 'required',
        'image'       => 'required|image|mimes:jpeg,png,jpg|dimensions:min_width=480,min_height=650',
    );

    //Validation messages
    public $validationMessages = [
        'image.required' => 'Image is required',
        'image.mimes' => 'Image must be jpeg,png or jpg',
        'image.dimensions' => 'Image must have minimum dimensions : 480px * 650px',
        'display_name.required' => 'Name is required'
     ];


    /**
     * Team Summary
     */
    public function index()
    {
        $title = "Team Members";
        
        return view('Admin.Teams.index')->with(compact('title'));
    }

     /**
     * Team Summary
     */
    public function ajaxIndex(Request $request)
    {
        $columns = array('id', 'display_name','designation', 'image', 'is_active', 'actions');

        $totalFiltered = $totalData = Team::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $records = Team::offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }
        else
        {
            $search = $request->input('search.value');
            $records = Team::where('display_name', 'LIKE', "%{$search}%")
                        ->orWhere('designation', 'LIKE', "%{$search}%")
                        ->offset($start)->limit($limit)->orderBy($order, $dir)->get();
            $totalFiltered = $records->count();
        }
        
        $data = array();
        if (!empty($records))
        {
            foreach ($records as $record)
            {
                $nestedData['id'] = $record->id;
                $nestedData['display_name'] = $record->display_name;
                $nestedData['designation'] = $record->designation;
                $nestedData['image'] = '<img src="/assets/frontend/uploads/teamsimages/'.$record->id.'/'.$record->image.'" height="50">';
                if($record->is_active == 1)
                {
                    $nestedData['is_active'] ='<a href="/admin/team/toggle/status/'.$record->id.'/'.$record->is_active.' " class="btn btn-success"> Active </a>';
                }
                else
                {
                    $nestedData['is_active'] = '<a href=/admin/team/toggle/status/'.$record->id.'/'.$record->is_active.' " class="btn btn-danger"> Inactive </a>';
                }

                $nestedData['actions'] = '<a href="/admin/team/edit/'. $record->id .'" title="View" class="icon blue"><i class=" fa fa-edit fa-lg"></i></a> 
                                            &nbsp;
                                        <a class="icon blue deleteRecord" data-id= '.$record->id.' href="/admin/team/delete/'.$record->id.'"><i class="fa fa-trash fa-lg"></i></a>';
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }

    /**
     * Add Team Member
     */
    public function add(Request $request)
    {
        if($request->method() == 'POST')
        {
            $validator = Validator::make($request->all(), $this->rules, $this->validationMessages);

            if ($validator->passes())
            {
                $record = new Team();
                
                $record->is_active = $request->is_active ? 1 : 0;

                $record->fill($request->all());
                
                $record->save();
                
                $record->image = $this->resizeAndUploadImage($request, 'image', TEAMSIMAGES . '/' . $record->id . '/', $record->id, 480, 650);

                $record->save();
                
                return redirect("/admin/teams")->with(['level' => 'success', 'content' => "Team Member added successfully"]);
            }
            else
            {
                return back()->with(['level' => 'danger', 'content' => "Unable to save,  Please check the below form for detailed errors."])
                            ->withErrors($validator)->withInput(Input::all());
            }
        }
        $heading = 'Add Team Member';
        $title = "Add Team Member";
        return view('Admin.Teams.form')->with(compact('record','heading', 'title'));;
    }

    /**
     * Edit Team member
     */
    public function edit($id, Request $request)
    {
        $record = Team::findOrFail($id);

        Cache::flush('$record->main_image','$record->hobby_image');
        
        if($request->method() == 'POST')
        {
            //Required validation removed for image in case of edit
            $this->rules['image'] = 'image|mimes:jpeg,png,jpg|dimensions:min_width=480,min_height=650';
            
            $validator = Validator::make($request->all(), $this->rules, $this->validationMessages);
            
            if($validator->passes())
            {
                $record->is_active = $request->is_active ? 1 : 0;
                $record->fill(Input::all());

                if($record->save())
                {
                    if($request->has('image'))
                    {
                        $record->image = $this->resizeAndUploadImage($request, 'image', TEAMSIMAGES . '/' . $record->id . '/', $record->id, 480, 650);
                        $record->save();
                    }

                    return redirect('/admin/teams')->with(['level' => 'success', 'content' => "Team member updated successfully"]);
                }
            }
            else
            {
                return back()->with(['level' => 'danger', 'content' => "Unable to save,  Please check the below form for detailed errors."])
                            ->withErrors($validator)->withInput(Input::all());
            }
        }
        $heading = 'Edit Team Member';
        
        $title = "Edit Team Member";
        return view('Admin.Teams.form')->with(compact('record','heading', 'title'));
    }

    //Delete Record
    public function deleteTeam(Request $request)
    {
        Team::where('id', $request->id)->delete();
		
        return back()->with(['level' => 'success', 'content' =>  "Record deleted successfully"]);
    }

    //toggle active state
    public function toggleStatus(Team $model, $status)
    {
        $model->is_active = !$status;

        $model->save();

        return back()->with(['level' => 'success', 'content' => "Status updated successfully"]);
    }

}