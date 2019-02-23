<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\PageSection;
use Validator;
use Illuminate\Support\Facades\Input;

class PageSectionsController extends \App\Http\Controllers\Controller
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
	public function index(Page $page)
	{
            $title = "Page Sections";
            
            return view('Admin.PageSections.index')->with(compact('page', 'title'));
	}
    
    /**
	 * 
	 * @param type $page_id
	 * @return type
     * Pages Summary
     */
    public function ajaxIndex($page_id, Request $request)
    {
        $columns = array('id', 'section_name', 'actions');

        $totalFiltered = $totalData = PageSection::where('page_id', $page_id)->count();

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $records = PageSection::where('page_id', $page_id)->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }
        else
        {
            $search = $request->input('search.value');
            $records = PageSection::where('section_name', 'LIKE', "%{$search}%")
                    ->where('page_id', $page_id)->offset($start)->limit($limit)->orderBy($order, $dir)->get();
            $totalFiltered = $records->count();
        }

        $data = array();
        if (!empty($records))
        {
            foreach ($records as $record)
            {
                $nestedData['id'] = $record->id;
                $nestedData['section_name'] = $record->section_name;
                $nestedData['actions'] = '<a href="/admin/page-section/edit/'. $record->id .'" title="View" class="icon blue"><i class=" fa fa-edit"></i></a>';
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
	 * edit page section
	 */
	public function edit(Request $request, $section_id)
	{
		$record = PageSection::with('Page')->findOrFail($section_id);
		
		$title = "Edit Page Section";

        if($request->method() == 'POST')
        {
            $validator = Validator::make(Input::all(), $this->rules);
            if ($validator->passes())
            {
                $record->fill(Input::all());
                $record->save();
                return redirect('/admin/pages/edit/'.$record->page_id)->with(['level' => 'success', 'content' => "Record updated successfully"]);
            }
            else
            {
                return back()->with(['level' => 'danger', 'content' => "Unable to save, Please check the below form for detailed errors."])
                        ->withErrors($validator)->withInput(Input::all());
            }
        }
		return view('Admin.PageSections.form')->with(compact('record', 'title'));
	}
	
}
