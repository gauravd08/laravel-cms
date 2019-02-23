<?php
namespace App\Http\Controllers\Frontend;
use App\Models\Portfolio;

class PortfoliosController extends \App\Http\Controllers\Controller
{
    public function detail($id)
    {
        $record = Portfolio::where('id',$id)->firstOrFail();
        
        $title = 'Portfolio Details';
        return view('Frontend.Portfolios.detail')->with(compact('record','title'));
    }
}