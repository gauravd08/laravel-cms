<?php
namespace App\Http\Controllers\Frontend;
use App\Models\Testimonial;

class TestimonialsController extends \App\Http\Controllers\Controller
{
    /**
     * Serves the main Home page on front-end.
     */
    public function index()
    {
        $testimonials = Testimonial::where('is_active',TRUE)->get();
        
        $title = 'Testimonial';
        return view('Frontend.Testimonials.index')->with(compact('testimonials', 'title'));
    }    
}