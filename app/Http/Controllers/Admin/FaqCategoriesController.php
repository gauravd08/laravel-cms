<?php

namespace App\Http\Controllers\Admin;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;


class FaqCategoriesController extends \App\Http\Controllers\Controller
{
    /**
     * Validation Rules
     */
    public $rules = array(
        'category_name'          => ['required'],
    );

    
    /**
	 * 
	 * @param type
	 * @return type
	 * faq summary
	 */
    public function index()
    {
        $title = "FAQ Categories";
        return view('Admin.FaqCategories.index')->with(compact('title'));
    }

     /**
     * faq Category Summary
     */
    public function ajaxIndex(Request $request)
    {
        $columns = array('id', 'category_name','action');

        $totalFiltered = $totalData = FaqCategory::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $records = FaqCategory::offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }
        else
        {
            $search = $request->input('search.value');
            $records = FaqCategory::with('faq')->where('category_name', 'LIKE', "%{$search}%")->offset($start)->limit($limit)->orderBy($order, $dir)->get();
            $totalFiltered = $records->count();
        }

        $data = array();
        if (!empty($records))
        {
            foreach ($records as $record)
            {
                $nestedData['id'] = $record->id;
                $nestedData['category_name'] = $record->category_name;
                $nestedData['question_count'] = count($record->faq);
                if(count($record->faq) > 0)
                {
                    $nestedData['action'] = '<a href="/admin/faq-category/edit/'. $record->id .'" title="View" class="icon blue"><i class=" fa fa-edit fa-lg"></i></a>';
                }
                else
                {
                    $nestedData['action'] = '<a href="/admin/faq-category/edit/'. $record->id .'" title="View" class="icon blue"><i class=" fa fa-edit fa-lg"></i></a> 
                                         &nbsp;
                                     <a class="icon blue deleteRecord" data-id= '.$record->id.' href="/admin/faq-category/delete/'.$record->id.'"><i class="fa fa-trash fa-lg"></i></a>';                      
                }
               
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
	 * add faq
	 */
	public function add(Request $request)
	{
        if($request->method() == 'POST')
        {
            $validator = Validator::make(Input::all(), $this->rules);
            $record = new FaqCategory();
            $record->fill(Input::all());

            if ($validator->passes() && $record->save())
            {
                return redirect('/admin/faq-categories')->with(['level' => 'success', 'content' => "Record added successfully"]);
            }
            else
            {
                return back()->with(['level' => 'danger', 'content' => "Unable to save,  Please check the below form for detailed errors."])
                        ->withErrors($validator)->withInput(Input::all());
            }
        }
            
        $title = "Add Faq";

        return view('Admin.FaqCategories.form')->with(compact('title'));
	}
	
	 /**
	 * 
	 * @param type $id
	 * @return type
	 * edit faq
	 */
    public function edit($id, Request $request)
    {
        $record = FaqCategory::findOrFail($id);

        if($request->method() == 'POST')
        {
            $validator = Validator::make(Input::all(), $this->rules);
            $record->fill(Input::all());

            if ($validator->passes() && $record->save())
            {
                return redirect('/admin/faq-categories')->with(['level' => 'success', 'content' => "Record updated successfully"]);
            }
            else
            {
                return back()->with(['level' => 'danger', 'content' => "Unable to save,  Please check the below form for detailed errors."])
                        ->withErrors($validator)->withInput(Input::all());
            }
        }
        
        $title = "Edit Faq Category";
        
        return view('Admin.FaqCategories.form')->with(compact('record', 'title'));
    }
    
    //Delete Record
    public function deleteFaqCategory(Request $request)
    {
        FaqCategory::where('id', $request->id)->delete();
		
        return back()->with(['level' => 'success', 'content' =>  "Record deleted successfully"]);
    }
}
