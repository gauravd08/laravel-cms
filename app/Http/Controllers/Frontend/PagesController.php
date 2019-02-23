<?php
namespace App\Http\Controllers\Frontend;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use Validator;
use Illuminate\Support\Facades\Input;

class PagesController extends \App\Http\Controllers\Controller
{
    
    /**
     * Validation Rules
     */
    public $rules = array(
        'first_name' => ['required'],
        'last_name' => ['required'],
        'phone' => ['required'],
        'email' => ['email'],
        'comment' => ['required']
    );

    //Validation messages
    public $validationMessages = [
        'first_name.required' => 'First Name is required',
        'last_name.required' => 'Last Name is required',
        'phone.required' => 'Phone is required',
        'email.email' => 'Enter valid email address',
        'comment.required' => 'Message is required',
     ];


    /**
     * Serves the main Home page on front-end.
     */
    public function page($slug)
    {
        $record = Page::with('PageSection','PageImage')->where('slug', $slug)->firstOrFail();
        if(!empty($record->PageImage))
        {
            $images = $record->PageImage->keyBy('id');
        }
        if(!empty($record->PageSection))
        {
            $sections = $record->PageSection->keyBy('id');
        }

        $title = $record->name;
        $meta_info = ['meta_title' => $record->meta_title,
                      'meta_keywords' => $record->meta_keywords,
                      'meta_description' => $record->meta_description
        ];
       
        
        return view('Frontend.Pages.'.$slug)->with(compact('record', 'images', 'sections', 'title','meta_info'));
    }
    
    public function home()
    {
        $record = Page::with('PageSection','PageImage')->where('slug', 'home')->firstOrFail();
        
        $teams = \App\Models\Team::where('is_active',true)->get();
        
        $portfolios = \App\Models\Portfolio::get();
        
        if(!empty($record->PageImage))
        {
            $images = $record->PageImage->keyBy('id');
        }
        if(!empty($record->PageSection))
        {
            $sections = $record->PageSection->keyBy('id');
        }
        
        $banners = \App\Models\Graphic::where('type', GRAPHIC_TYPE_HOME_BANNER)->where('is_active', 1)->get();
        $title = "Home";
        return view('Frontend.Pages.home')->with(compact('banners','images','sections','record','teams','portfolios','title'));
    }
    
    public function contactUs(Request $request)
    {
        if($request->method() == 'POST')
        {
            $validator = Validator::make($request->all(), $this->rules, $this->validationMessages);
            if ($validator->passes())
            {
                $record = new Enquiry();
                $record->fill($request->all());
                $record->save();

                return back()->with(['level' => 'success', 'content' => "Your message has been successfully sent"]);
            }
            else
            {
                return back()->with(['level' => 'danger', 'content' => "Unable to Send,  Please fill required fields and send again."])
                    ->withErrors($validator)->withInput(Input::all());
            }
        }
        
        $contactInfo = \App\Models\Setting::first();
        $title = 'Contact';
        return view('Frontend.Pages.contact')->with(compact('contactInfo','title'));
    }
}