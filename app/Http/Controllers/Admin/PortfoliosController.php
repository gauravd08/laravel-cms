<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Cache;
use Validator;

class PortfoliosController extends \App\Http\Controllers\Controller
{   
    /**
     * Validation Rules
     */
    public $rules = array(
        'project_name' => 'required',
        'short_description' => 'required',
        'image'       => 'required|image|mimes:jpeg,png,jpg|dimensions:min_width=640,min_height=420',
    );

    //Validation messages
    public $validationMessages = [
        'image.required' => 'Image is required',
        'image.mimes' => 'Image must be jpeg,png or jpg',
        'image.dimensions' => 'Image must have minimum dimensions : 640px * 420px',
     ];


    /**
     * Team Summary
     */
    public function index()
    {
        $title = "Portfolios";
        
        return view('Admin.Portfolios.index')->with(compact('title'));
    }

     /**
     * Team Summary
     */
    public function ajaxIndex(Request $request)
    {
        $columns = array('id', 'project_name','image', 'short_description', 'actions');

        $totalFiltered = $totalData = Portfolio::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $records = Portfolio::offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }
        else
        {
            $search = $request->input('search.value');
            $records = Portfolio::where('project_name', 'LIKE', "%{$search}%")
                        ->offset($start)->limit($limit)->orderBy($order, $dir)->get();
            $totalFiltered = $records->count();
        }
        
        $data = array();
        if (!empty($records))
        {
            foreach ($records as $record)
            {
                $nestedData['id'] = $record->id;
                $nestedData['project_name'] = $record->project_name;
                $nestedData['image'] = '<img src="/assets/frontend/uploads/portfoliosimages/'.$record->id.'/'.$record->image.'" height="50">';
               
                $nestedData['short_description'] = $record->short_description;

                $nestedData['actions'] = '<a href="/admin/portfolio/edit/'. $record->id .'" title="View" class="icon blue"><i class=" fa fa-edit fa-lg"></i></a> 
                                            &nbsp;
                                        <a class="icon blue deleteRecord" data-id= '.$record->id.' href="/admin/portfolio/delete/'.$record->id.'"><i class="fa fa-trash fa-lg"></i></a>';
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
                $record = new Portfolio();
                
                $record->fill($request->all());
                
                $record->save();
                
                $record->image = $this->resizeAndUploadImage($request, 'image', PORTFOLIOSIMAGES . '/' . $record->id . '/', $record->id, 640, 420);

                $record->save();
                
                return redirect("/admin/portfolios")->with(['level' => 'success', 'content' => "Portfolio added successfully"]);
            }
            else
            {
                return back()->with(['level' => 'danger', 'content' => "Unable to save,  Please check the below form for detailed errors."])
                            ->withErrors($validator)->withInput(Input::all());
            }
        }
        $heading = 'Add Portfolio';
        $title = "Add Portfolio";
        return view('Admin.Portfolios.form')->with(compact('record','heading', 'title'));;
    }

    /**
     * Edit Team member
     */
    public function edit($id, Request $request)
    {
        $record = Portfolio::findOrFail($id);

        Cache::flush('$record->image');
        
        if($request->method() == 'POST')
        {
            //Required validation removed for image in case of edit
            $this->rules['image'] = 'image|mimes:jpeg,png,jpg|dimensions:min_width=640,min_height=420';
            
            $validator = Validator::make($request->all(), $this->rules, $this->validationMessages);
            
            if($validator->passes())
            {
                $record->fill(Input::all());

                if($record->save())
                {
                    if($request->has('image'))
                    {
                        $record->image = $this->resizeAndUploadImage($request, 'image', PORTFOLIOSIMAGES . '/' . $record->id . '/', $record->id, 640, 420);
                        $record->save();
                    }

                    return redirect('/admin/portfolios')->with(['level' => 'success', 'content' => "Portfolio updated successfully"]);
                }
            }
            else
            {
                return back()->with(['level' => 'danger', 'content' => "Unable to save,  Please check the below form for detailed errors."])
                            ->withErrors($validator)->withInput(Input::all());
            }
        }
        $heading = 'Edit Portfolio';
        
        $title = "Edit Portfolio";
        return view('Admin.Portfolios.form')->with(compact('record','heading', 'title'));
    }

    //Delete Record
    public function deletePortfolio(Request $request)
    {
        Portfolio::where('id', $request->id)->delete();
		
        return back()->with(['level' => 'success', 'content' =>  "Record deleted successfully"]);
    }
}