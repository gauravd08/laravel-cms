<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Cache;

class SettingsController extends \App\Http\Controllers\Controller
{
    /**
     * Change settings
     */
    public function changesettings($id, Request $request)
    {
        
        $record = Setting::findOrFail($id);
        
        if($request->method() == 'POST')
        {
            $record->fill($request->all());
            
            $record->save();

            if($record->save())
            {
                return back()->with(['level' => 'success', 'content' => "Settings updated successfully"]);
            }
            else
            {
                return back()->with(['level' => 'danger', 'content' => "Unable to save,  Please check the below form for detailed errors."])
                            ->withErrors($validator)->withInput(Input::all());
            }
        }
        
        $title = "Change Settings";
        
        return view('Admin.Settings.index')->with(compact('record', 'title'));
    }
}