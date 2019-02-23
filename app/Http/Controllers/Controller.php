<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Image;
use Illuminate\Support\Facades\File;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Vinkla\Instagram\Instagram;
use Exception;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function __construct() 
    {
        $meta_info = $this->_meta_info();
        $social_links = $this->_social_links();
        $instagram_feeds = $this->_instagram_feed();
        $modules = $this->_modules();
        
        View::share('default_meta_info', $meta_info);
        View::share('social_links', $social_links);
        view::share('instagram_feeds', $instagram_feeds);
        view::share('modules', $modules);
    }
    
    private function _meta_info()
    {
        $record = Setting::findOrFail(1);
        return $record;
    }
    
    
    
    /**
     * Resizes and upload image
     * @param type $request
     * @param type $field
     * @param type $path
     * @param type $name
     * @param type $width
     * @param type $height
     * @return string
     */
    protected function resizeAndUploadImage($request, $field, $path, $name, $width, $height)
    {
        // echo $path;exit;
        //Create directory if not exists
        if(!File::exists($path))
        {
            File::makeDirectory($path, 0777, true);
        }
                
        $requestImg = $request->file($field);
        
        return $this->resizeAndSave($requestImg, $path, $name, $width, $height);
    }

    /**
     * Resizes and Save image in folder
     * @param type $img
     * @param type $path
     * @param type $name
     * @param type $width
     * @param type $height
     */
    protected function resizeAndSave($img, $path, $name, $width, $height)
    {
        $filename = $name . '.' . $img->getClientOriginalExtension();
        $canvas = Image::canvas($width, $height);
        $imgObj = Image::make($img->getRealPath());
        
        //Resize image maintaining aspect ratio
        $imgObj->resize($width, $height, function ($c) 
        {
            $c->aspectRatio();
        });

        //insert resized image centered into background
        $canvas->insert($imgObj, 'center');
        $canvas->save($path . $filename);
        
        return $filename;
    }
    
    //get newsletter subscription 
    public function subscribe($email)
    {
        $record  = \App\Models\Subscription::where('email',$email)->first();
        
        if($record)
        {
             return "You are already subscribed";
        }
       
        $subscription = new \App\Models\Subscription();
        $subscription->email = $email;
        $subscription->save();

        return "You have subscribed successfully";
    }
    
    //get social links for header and footer
    private function _social_links()
    {
        $records = \App\Models\Setting::get()->first();

        $record = array(
            'facebook_link' => $records->facebook_link,
            'twitter_link' => $records->twitter_link,
            'google_link' => $records->google_link,
            'pinterest_link' => $records->pinterest_link,
            'instagram_link' => $records->instagram_link,
            'copy_write' => $records->copy_write,
        );
        return $record;
    }
    
    //get instagram feeds
    private function _instagram_feed()
    {
        try
        {
            //get access token for account
            $instagram = new Instagram(config('services.instagram.access-token'));
            
            //get array of only images
            return $images = collect($instagram->get())->map(function ($each) {
                        return $each->images->standard_resolution->url;
                    });
        } 
        catch (Exception $ex) 
        {
            return [];
        }
    }
    
    //get header and footer modules content
    private function _modules()
    {
        $modules =  \App\Models\Module::get()->toArray();
        
        $module_name = [];
        foreach($modules as $module)
        {
            $module_name[$module['name']] = $module['content'];
        }
        
        return $module_name;
    }
}
