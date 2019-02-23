<?php

namespace App\Http\Controllers\Admin;
use App\Models\Faq;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Models\FaqCategory;


class FaqsController extends \App\Http\Controllers\Controller
{
    /**
     * Validation Rules
     */
    public $rules = array(
        'question'          => ['required'],
        'answer'            => ['required'],
        'faq_category_id'          => ['required'],
    );
    
        
    public $messages = ['faq_category_id.required' => 'The category field is required.'
        ];
    
    /**
	 * 
	 * @param type
	 * @return type
	 * faq summary
	 */
    public function index()
    {
        $title = "FAQs";
        return view('Admin.Faqs.index')->with(compact('title'));
    }
    
     /**
	 * 
	 * @param type
	 * @return type
	 * faq summary
	 */
    public function ajaxIndex(Request $request)
    {
        $columns = array('id', 'faq_category_id', 'question', 'answer', 'actions');

        $totalFiltered = $totalData = Faq::count();

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $records = Faq::offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }
        else
        {
            $search = $request->input('search.value');
            $records = Faq::where('question', 'LIKE', "%{$search}%")->offset($start)->limit($limit)->orderBy($order, $dir)->get();
            $totalFiltered = $records->count();
        }
        $faqCategoryList = FaqCategory::faqCategoryList();
        $data = array();
        if (!empty($records))
        {
            foreach ($records as $record)
            {
                $nestedData['id'] = $record->id;
                $nestedData['category'] = $faqCategoryList[$record->faq_category_id];
                $nestedData['question'] = $record->question;
                $nestedData['answer'] = $record->answer;
                $nestedData['actions'] = '<a href="/admin/faq/edit/'. $record->id .'" title="View" class="icon blue"><i class=" fa fa-edit fa-lg"></i></a> 
                                         &nbsp;
                                            <a class="icon blue deleteRecord" data-id= '.$record->id.' href="/admin/faq/delete/'.$record->id.'"><i class="fa fa-trash fa-lg"></i></a>';
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
            $validator = Validator::make(Input::all(), $this->rules, $this->messages);
            $record = new Faq();
            $record->fill(Input::all());

            if ($validator->passes() && $record->save())
            {
                return redirect('/admin/faqs')->with(['level' => 'success', 'content' => "Record added successfully"]);
            }
            else
            {
                return back()->with(['level' => 'danger', 'content' => "Unable to save,  Please check the below form for detailed errors."])
                        ->withErrors($validator)->withInput(Input::all());
            }
        }
        
            $faqCategoryList = FaqCategory::faqCategoryList();
            
            $title = "Add Faq";
            
            return view('Admin.Faqs.form')->with(compact('title','faqCategoryList'));
	}
	
	 /**
	 * 
	 * @param type $id
	 * @return type
	 * edit faq
	 */
    public function edit($id, Request $request)
    {
        $record = Faq::findOrFail($id);

        if($request->method() == 'POST')
        {
            $validator = Validator::make(Input::all(), $this->rules, $this->messages);
            $record->fill(Input::all());

            if ($validator->passes() && $record->save())
            {
                return redirect('/admin/faqs')->with(['level' => 'success', 'content' => "Record added successfully"]);
            }
            else
            {
                return back()->with(['level' => 'danger', 'content' => "Unable to save,  Please check the below form for detailed errors."])
                        ->withErrors($validator)->withInput(Input::all());
            }
        }
        $faqCategoryList = FaqCategory::faqCategoryList();
        
        $title = "Edit Faq";
        
        return view('Admin.Faqs.form')->with(compact('record', 'title', 'faqCategoryList'));
    }
    
    //Delete Record
    public function deleteFaq(Request $request)
    {
        Faq::where('id', $request->id)->delete();
		
        return back()->with(['level' => 'success', 'content' =>  "Record deleted successfully"]);
    }
}
