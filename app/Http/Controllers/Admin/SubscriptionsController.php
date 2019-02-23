<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionsController extends \App\Http\Controllers\Controller
{   
    /**
     * Enquiry Summary
     */
    public function index()
    {
        $title = "Subscriptions";
        
        return view('Admin.Subscriptions.index')->with(compact('title'));
    }

     /**
     * Enquiry Summary
     */
    public function ajaxIndex(Request $request)
    {
        $columns = array('id', 'email', 'actions');

        $totalFiltered = $totalData = Subscription::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $records = Subscription::offset($start)->limit($limit)->orderBy($order, $dir)->get();
        }
        else
        {
            $search = $request->input('search.value');
            $records = Subscription::where('email', 'LIKE', "%{$search}%")
                        ->offset($start)->limit($limit)->orderBy($order, $dir)->get();
            $totalFiltered = $records->count();
        }
        
        $data = array();
        if (!empty($records))
        {
            foreach ($records as $record)
            {
                $nestedData['id'] = $record->id;
                $nestedData['email'] = $record->email;
                $nestedData['actions'] = '<a class="icon blue deleteRecord" data-id= '.$record->id.' href="/admin/subscription/delete/'.$record->id.'"><i class="fa fa-trash fa-lg"></i></a>';
                                        
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
    public function deleteSubscription(Request $request)
    {
        Subscription::where('id', $request->id)->delete();
		
        return back()->with(['level' => 'success', 'content' =>  "Record deleted successfully"]);
    }
}