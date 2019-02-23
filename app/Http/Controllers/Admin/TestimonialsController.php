<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Cache;
use Validator;

class TestimonialsController extends \App\Http\Controllers\Controller
{   
    /**
     * Validation Rules
     */
    public $rules = array(
        'image'       => 'required|image|mimes:jpeg,png,jpg|dimensions:min_width=270,min_height=270',
        'comments'    => 'required',
        'designation' => 'required',
        'client_name' => 'required'
    );
    
    //Validation messages
    public $validationMessages = [
        'image.required' => 'Image is required',
        'image.mimes' => 'Image must be jpeg,png or jpg',
        'image.dimensions' => 'Image must have minimum dimensions : 270px * 270px',
     ];

    /**
     * Testimonials Summary
     */
    public function index()
    {
        $title = "Testimonials";
        
        return view('Admin.Testimonials.index')->with(compact('title'));
    }

     /**
     * Testimonials Summary
     */
    public function ajaxIndex(Request $request)
    {
        $columns = array('id', 'client_name', 'image', 'designation', 'is_active', 'actions');

        $totalFiltered = $totalData = Testimonial::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $records = Testimonial::offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }
        else
        {
            $search = $request->input('search.value');
            $records = Testimonial::where('client_name', 'LIKE', "%{$search}%")
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
                $nestedData['client_name'] = $record->client_name;
                $nestedData['image'] = '<img src="/assets/frontend/uploads/testimonialsimages/'.$record->id.'/'.$record->image.'" height="50">';
                $nestedData['designation'] = $record->designation;
                if($record->is_active == 1)
                {
                    $nestedData['is_active'] ='<a href="/admin/testimonial/toggle/status/'.$record->id.'/'.$record->is_active.' " class="btn btn-success"> Active </a>';
                }
                else
                {
                    $nestedData['is_active'] = '<a href=/admin/testimonial/toggle/status/'.$record->id.'/'.$record->is_active.' " class="btn btn-danger"> Inactive </a>';
                }
                $nestedData['actions'] = '<a href="/admin/testimonial/edit/'. $record->id .'" title="View" class="icon blue"><i class=" fa fa-edit fa-lg"></i></a> 
                                            &nbsp;
                                        <a class="icon blue deleteRecord" data-id= '.$record->id.' href="/admin/testimonial/delete/'.$record->id.'"><i class="fa fa-trash fa-lg"></i></a>';
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
     * Add Testimonial
     */
    public function add(Request $request)
    {
        if($request->method() == 'POST')
        {
            $validator = Validator::make($request->all(), $this->rules, $this->validationMessages);

            if ($validator->passes())
            {
                $record = new Testimonial();
                
                $record->is_active = $request->is_active ? 1 : 0;
                
                $record->fill($request->all());
                
                $record->save();
                
                $record->image = $this->resizeAndUploadImage($request, 'image', TESTIMONIALSIMAGES . '/' . $record->id . '/', $record->id, 270, 270);

                $record->save();
                
                return redirect("/admin/testimonials")->with(['level' => 'success', 'content' => "Record added successfully"]);
            }
            else
            {
                return back()->with(['level' => 'danger', 'content' => "Unable to save,  Please check the below form for detailed errors."])
                            ->withErrors($validator)->withInput(Input::all());
            }
        }
        $heading = 'Add Testimonial';
        $title = "Add Testimonial";
        return view('Admin.Testimonials.form')->with(compact('record','heading', 'title'));;
    }

    /**
     * Edit Testimonial
     */
    public function edit($id, Request $request)
    {
        $record = Testimonial::findOrFail($id);

        Cache::flush('$record->main_image','$record->hobby_image');
        
        if($request->method() == 'POST')
        {
            //Required validation removed for image in case of edit
            $this->rules['image'] = 'image|mimes:jpeg,png,jpg|dimensions:min_width=100,min_height=100';

            $validator = Validator::make($request->all(), $this->rules);
            
            if($validator->passes())
            {
                $record->is_active = $request->is_active ? 1 : 0;
                $record->fill(Input::all());

                if($record->save())
                {
                    if($request->has('image'))
                    {
                        $record->image = $this->resizeAndUploadImage($request, 'image', TESTIMONIALSIMAGES . '/' . $record->id . '/', $record->id, 270, 270);
                        $record->save();
                    }

                    return redirect('/admin/testimonials')->with(['level' => 'success', 'content' => "Testimonial updated successfully"]);
                }
            }
            else
            {
                return back()->with(['level' => 'danger', 'content' => "Unable to save,  Please check the below form for detailed errors."])
                            ->withErrors($validator)->withInput(Input::all());
            }
        }
        $heading = 'Edit Testimonial';
        
        $title = "Edit Testimonial";
        return view('Admin.Testimonials.form')->with(compact('record','heading', 'title'));
    }

    //Delete Record
    public function deleteTestimonial(Request $request)
    {
        Testimonial::where('id', $request->id)->delete();
		
        return back()->with(['level' => 'success', 'content' =>  "Record deleted successfully"]);
    }
    
    //toggle active state
    public function toggleStatus(Testimonial $model, $status)
    {
        $model->is_active = !$status;

        $model->save();

        return back()->with(['level' => 'success', 'content' => "Status updated successfully"]);
    }
}