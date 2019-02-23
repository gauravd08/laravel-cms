<?php
namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use Validator;

class PagesController extends \App\Http\Controllers\Controller
{
    /**
     * Validation Rules
     */
    public $rules = array(
        'name' => ['required'],
    );
    
    public function index()
    {
        $title = "Pages";
        
        return view('Admin.Pages.index')->with(compact('title'));
    }

    /**
	 * 
	 * @param type
	 * @return type
     * Pages Summary
     */
    public function ajaxIndex(Request $request)
    {
        $columns = array('name', 'actions');
        
        $totalFiltered = $totalData = Page::count();
        
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if(empty($request->input('search.value')))
        {
            $records = Page::offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }
        else
        {
            $search = $request->input('search.value');
            $records = Page::where('name', 'LIKE', "%{$search}%")->offset($start)->limit($limit)->orderBy($order, $dir)->get();
            $totalFiltered = $records->count();
        }

        $data = array();
        if (!empty($records))
        {
            foreach ($records as $record)
            {
                $nestedData['name'] = $record->name;
                $nestedData['actions'] = '<a href="/admin/pages/edit/'. $record->id .'" title="View" class="icon blue"><i class=" fa fa-edit"></i></a>';
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
	 * @param type $id
	 * @return type
     * edit page
     */
    public function edit($id, Request $request)
    {
        $record = Page::with('PageSection','PageImage')->where('id', $id)->firstOrFail();
        $title = "Edit Page";
        if($request->method() == 'POST')
        {
            $validator = Validator::make($request->all(), $this->rules);
            if($validator->passes())
            {
                $record->fill($request->all());
                $record->save();
                return redirect('/admin/pages')->with(['level' => 'success', 'content' => 'Record updated successfully']);
            }
            else
            {
                return back()->with(['level' => 'danger', 'content' => "Unable to save,  Please check the below form for detailed errors."])
                        ->withErrors($validator)->withInput($request->all());
            }
        }
            $images = $record->PageImage->keyBy('id');
            $sections = $record->PageSection->keyBy('id');
            
            return view('Admin.Pages.form')->with(compact('record', 'images', 'sections' , 'id', 'title'));
    }
}