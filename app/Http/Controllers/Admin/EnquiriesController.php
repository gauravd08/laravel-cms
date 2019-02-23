<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiriesController extends \App\Http\Controllers\Controller
{   
    /**
     * Enquiry Summary
     */
    public function index()
    {
        $title = "Enquiries";
        
        return view('Admin.Enquiries.index')->with(compact('title'));
    }

     /**
     * Enquiry Summary
     */
    public function ajaxIndex(Request $request)
    {
        $columns = array('id', 'first_name','last_name', 'email', 'phone','comment','actions');

        $totalFiltered = $totalData = Enquiry::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $records = Enquiry::offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }
        else
        {
            $search = $request->input('search.value');
            $records = Enquiry::where('email', 'LIKE', "%{$search}%")
                        ->orWhere('first_name', 'LIKE', "%{$search}%")
                        ->offset($start)->limit($limit)->orderBy($order, $dir)->get();
            $totalFiltered = $records->count();
        }
        
        $data = array();
        if (!empty($records))
        {
            foreach ($records as $record)
            {
                $nestedData['id'] = $record->id;
                $nestedData['first_name'] = $record->first_name;
                $nestedData['last_name'] = $record->last_name;
                $nestedData['email'] = $record->email;
                $nestedData['phone'] = $record->phone;
                $nestedData['comment'] = $record->comment;
                $nestedData['actions'] = '<a class="icon blue deleteRecord" data-id= '.$record->id.' href="/admin/enquiry/delete/'.$record->id.'"><i class="fa fa-trash fa-lg"></i></a>';
                                        
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
    
    //Delete Record
    public function deleteEnquiry(Request $request)
    {
        Enquiry::where('id', $request->id)->delete();
		
        return back()->with(['level' => 'success', 'content' =>  "Record deleted successfully"]);
    }
}