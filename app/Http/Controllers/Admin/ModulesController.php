<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Module;
use Validator;
use Illuminate\Support\Facades\Input;

class ModulesController extends \App\Http\Controllers\Controller
{  
    /**
     * Validation Rules
     */
    public $rules = array(
        'content'  => ['required'],
    );
    
    /**
	 * 
	 * @param type $page
	 * @return type
	 * page section summary
	 */
    public function index()
    {
        $title = "Modules";
       
        return view('Admin.Modules.index')->with(compact('title'));
    }
    
     /**
	 * 
	 * @param type
	 * @return type
     * modules Summary
     */
    public function ajaxIndex(Request $request)
    {
        $columns = array('name', 'actions');
        
        $totalFiltered = $totalData = Module::count();
        
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if(empty($request->input('search.value')))
        {
            $records = Module::offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }
        else
        {
            $search = $request->input('search.value');
            $records = Module::where('name', 'LIKE', "%{$search}%")->offset($start)->limit($limit)->orderBy($order, $dir)->get();
            $totalFiltered = $records->count();
        }

        $data = array();
        if (!empty($records))
        {
            foreach ($records as $record)
            {
                $nestedData['name'] = $record->name;
                $nestedData['actions'] = '<a href="/admin/module/edit/'. $record->id .'" title="View" class="icon blue"><i class=" fa fa-edit"></i></a>';
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
	 * @param type $section_id
	 * @return type
	 * edit module section
	 */
	public function edit(Request $request, $id)
	{
		$record = Module::findOrFail($id);
		
		$title = "Edit Module";

        if($request->method() == 'POST')
        {
            $validator = Validator::make(Input::all(), $this->rules);
            if ($validator->passes())
            {
                $record->fill(Input::all());
                $record->save();
                return redirect('/admin/modules')->with(['level' => 'success', 'content' => "Record updated successfully"]);
            }
            else
            {
                return back()->with(['level' => 'danger', 'content' => "Unable to save, Please check the below form for detailed errors."])
                        ->withErrors($validator)->withInput(Input::all());
            }
        }
		return view('Admin.Modules.form')->with(compact('record', 'title'));
	}
	
}