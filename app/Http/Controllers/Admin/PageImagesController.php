<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\PageImage;
use App\Models\Page;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Image;

class PageImagesController extends \App\Http\Controllers\Controller
{
	
	/**
     * Validation Rules
     */
    public $rules = array(
        'image'     => ['required'],
        'page_id'   => ['required'],
    );
	
    /**
	 * 
	 * @param type $page_id
	 * @return type
     * page image summary
     */
    public function index($pageId)
    {
        $records = PageImage::where('page_id', $pageId)
					->orderBy('id', 'desc')
                    ->get();
		
        $pageList = Page::pageList();
        
        $title = "Page Images";
        
        return view('Admin.PageImages.index')->with(compact('records', 'pageList','pageId', 'title'));
    }
	
	/**
	 * 
	 * @param type $id
	 * @return type
     * add page image
     */
    public function add($id, Request $request)
    {
        if($request->method() == 'POST')
        {
            $validator = Validator::make(Input::all(), $this->rules);

            $pageId = $request->page_id;
            $record = new PageImage();
            $record->fill(Input::all());
            if ($validator->passes() && $record->save())
            {
                $img = request()->file('image');
				$filename = $record->id . '.' . $img->getClientOriginalExtension();
                $img->move(PAGE_IMAGE_UPLOAD_PATH . '/' . $pageId, $filename );
                $record->image = $filename;
                $record->save();
                
                return redirect('/admin/page-images/'.$id)->with(['level' => 'success', 'content' => "Record added successfully"]);
            }
            else
            {
                return back()->with(['level' => 'danger', 'content' => "Unable to save, Please check the below form for detailed errors."])
                        ->withErrors($validator)->withInput(Input::all());
            }
        }
        
        $pageList = Page::pageList();
        
        $title = "Add Page Image";
        return view('Admin.PageImages.add')->with(compact('pageList','id', 'title'));
    }
	
	/**
	 * 
	 * @param type $pageId, $id
	 * @return type
     * edit page image
     */
    public function edit($pageId, $id, Request $request)
    {
        $record = PageImage::findOrFail($id);
		
        if($request->method() == 'POST')
        {
            $image_dimension = \StaticArray::$static_page_images[$pageId][$record->id];
            $validator = Validator::make($request->all(), []);
            $record->fill(Input::all());
            
            if($request->has('image'))
            {
                $this->imageRules = ['image' => 'required|image|mimes:jpeg,png,jpg|dimensions:min_width=' . $image_dimension["width"] . ',min_height=' . $image_dimension["height"] . ''];
                $validator = Validator::make($request->all(), $this->imageRules);
            }

            if ($validator->passes())
            {
                if($request->has('image'))
                {
                    
                    $record->image = $this->resizeAndUploadImage($request, 'image', PAGE_IMAGE_UPLOAD_PATH . '/' . $pageId . '/', $record->id, $image_dimension['width'], $image_dimension['height']);

                    $record->save();
                }
                return redirect('/admin/pages/edit/'.$request->page_id)->with(['level' => 'success', 'content' => "Record added successfully"]);
            }
            else
            {
                return back()->with(['level' => 'danger', 'content' => "Unable to save, Please check the below form for detailed errors."])
                        ->withErrors($validator)->withInput(Input::all());
            }
        }
        $pageList = Page::pageList();
        
        $title = "Edit Page Image";
        
        return view('Admin.PageImages.form')->with(compact('record', 'pageList', 'title'));
    }
}
