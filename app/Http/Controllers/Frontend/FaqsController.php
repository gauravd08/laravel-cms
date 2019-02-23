<?php
namespace App\Http\Controllers\Frontend;
use App\Models\Faq;
use App\Models\FaqCategory;

class FaqsController extends \App\Http\Controllers\Controller
{
    /**
     * Serves the main Home page on front-end.
     */
    public function index()
    {
        $records_raw = Faq::get();
        $records = $records_raw->mapToGroups(function ($item, $key)
        {
            return [$item['faq_category_id'] => $item];
        });
            
        $faqCategoryList = FaqCategory::faqCategoryList();
        
        $title = 'FAQ';

        return view('Frontend.Faq.index')->with(compact('records', 'title', 'faqCategoryList'));
    }    
}