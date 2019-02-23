@extends('layouts.front')

@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content">
                <h2>Company</h2>
                <div class="page_link">
                    <a href="/">Home</a>
                    <a href="/company">Company</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->


<!--================Company Area =================-->
<section class="portfolio_details_area p_120 company-area" style="padding-top: 79px">
        <div class="container">
            <div class="portfolio_details_inner">
                 {!! $sections[COMPANY_1]['content'] !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="left_img company-image">
                            <img class="img-fluid" src="{{PAGE_IMAGE_UPLOAD_PATH.$record->id.'/'.$images[COMPANY_IMAGE_1]['image']}}" alt="">
                        </div>
                    </div>
                </div>
                 {!! $sections[COMPANY_2]['content'] !!}
            </div>
        </div>
    </section>
<!--================End Company Area =================-->
@endsection