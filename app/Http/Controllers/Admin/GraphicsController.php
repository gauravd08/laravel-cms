<?php

namespace App\Http\Controllers\Admin;
use App\Models\Graphic;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use StaticArray;

class GraphicsController extends \App\Http\Controllers\Controller
{
    /**
     * Validation Rules
     */
    public $rules = array(
        'type'          => ['required'],
        'name'          => ['required'],
        'caption'       => ['required']
    );

    /**
	 * 
	 * @param type
	 * @return type
	 * graphic summary
	 */
    public function index()
    {
        $title = "Graphics";
        
        return view('Admin.Graphics.index')->with(compact('records', 'title'));
    }
    
    /**
	 * 
	 * @param type
	 * @return type
     * graphic Summary
     */
    public function ajaxIndex(Request $request)
    {
        $columns = array('id', 'name', 'type', 'image', 'caption','is_active', 'actions');

        $totalFiltered = $totalData = Graphic::count();

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $records = Graphic::offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }
        else
        {
            $search = $request->input('search.value');
            $records = Graphic::where('name', 'LIKE', "%{$search}%")->offset($start)->limit($limit)->orderBy($order, $dir)->get();
            $totalFiltered = $records->count();
        }

        $data = array();
        if (!empty($records))
        {
            foreach ($records as $record)
            {
                $nestedData['id'] = $record->id;
                $nestedData['name'] = $record->name;
                $nestedData['type'] = StaticArray::$graphic_types[$record->type];
                $nestedData['image'] = '<img src=/'.GRAPHIC_UPLOAD_PATH.$record->type.'/'.$record->image.'?'.CSS_JS_VER.' height="60" width="100">';
                $nestedData['caption'] = $record->caption;
                if($record->is_active == 1)
                {
                    $nestedData['is_active'] ='<a href="/admin/graphics/toggle/status/'.$record->id.'/'.$record->is_active.' " class="btn btn-success"> Active </a>';
                }
                else
                {
                    $nestedData['is_active'] = '<a href="/admin/graphics/toggle/status/'.$record->id.'/'.$record->is_active.' " class="btn btn-danger"> Inactive </a>';
                }
                $nestedData['actions'] = '<a href="/admin/graphics/edit/'. $record->id .'?'.CSS_JS_VER.'" title="View" class="icon blue"><i class=" fa fa-edit"></i></a> <a onclick="return confirm(`Are you sure you want to delete this item?`)" href="/admin/graphics/delete/'. $record->id.'" title="View" class="icon blue"><i class="fa fa-trash fa-lg"></i></a>';
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
	 * 
	 * @param type
	 * @return type
	 * add graphic
	 */
    public function add(Request $request)
    {
        if($request->method() == 'POST')
        {
            $image_dimension = \StaticArray::$graphic_type_images[$request->type];
           
            $this->rules['image'] = 'required|image|mimes:jpeg,png,jpg|dimensions:min_width=' . $image_dimension["width"] . ',min_height=' . $image_dimension["height"] . '';
            
            $validator = Validator::make(Input::all(), $this->rules);
            
            if($validator->passes())
            {
                $record = new Graphic();
                $record->fill(Input::all());
                $record->is_active = $request->is_active ? 1 : 0;
                $record->save();
                $record->image = $this->resizeAndUploadImage($request, 'image', GRAPHIC_UPLOAD_PATH . '/' . $request->type . '/', $record->id, $image_dimension['width'], $image_dimension['height']);
                $record->save();
                return redirect('/admin/graphics')->with(['level' => 'success', 'content' => "Record added successfully"]);

            }
            else
            {
                return back()->with(['level' => 'danger', 'content' => "Unable to save,  Please check the below form for detailed errors."])
                        ->withErrors($validator)->withInput(Input::all());
            }
        }
        
        $title = "Add Graphic";
        
        return view('Admin.Graphics.form')->with(compact('title'));
    }

   /**
	 * 
	 * @param type $id
	 * @return type
	 * edit graphic
	 */
    public function edit($id, Request $request)
    {
        $record = Graphic::findOrFail($id);

        if($request->method() == 'POST')
        {
            $image_dimension = \StaticArray::$graphic_type_images[$request->type];
           
            $this->rules['image'] = 'image|mimes:jpeg,png,jpg|dimensions:min_width=' . $image_dimension["width"] . ',min_height=' . $image_dimension["height"] . '';
            
            $validator = Validator::make(Input::all(), $this->rules);
            
            $record->fill(Input::all());
            if($validator->passes() && $record->save())
            {
                if($request->has('image'))
                {
                    $record->image = $this->resizeAndUploadImage($request, 'image', GRAPHIC_UPLOAD_PATH . '/' . $request->type . '/', $record->id, $image_dimension['width'], $image_dimension['height']);


                    $record->save();
                }
                return redirect('/admin/graphics')->with(['level' => 'success', 'content' => "Record added successfully"]);

            }
            else
            {
                return back()->with(['level' => 'danger', 'content' => "Unable to save,  Please check the below form for detailed errors."])
                        ->withErrors($validator)->withInput(Input::all());
            }
        }
        
        $title = "Edit Graphic";
        
        return view('Admin.Graphics.form')->with(compact('record', 'title'));
    }
    
    //Delete Record
    public function delete(Request $request)
    {
        Graphic::where('id', $request->id)->delete();
		
        return back()->with(['level' => 'success', 'content' =>  "Record deleted successfully"]);
    }

    //toggle active state
    public function toggleStatus(Graphic $model, $status)
    {
        $model->is_active = !$status;

        $model->save();

        return back()->with(['level' => 'success', 'content' => "Status updated successfully"]);
    }
}
