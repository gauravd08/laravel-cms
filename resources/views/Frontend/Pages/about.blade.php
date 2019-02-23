@extends('layouts.front')

@push('styles')
<style>
    .left_img{
       background-image: url("/{{PAGE_IMAGE_UPLOAD_PATH.$record->id.'/'.$images[ABOUT_US_IMAGE_1]['image']}}");
       height: 900px;
       width:100%;
    }
</style>
@endpush

@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content">
                <h2>About Us</h2>
                <div class="page_link">
                    <a href="/">Home</a>
                    <a href="/about">About Us</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Mission Area =================-->

<section class="mission_area">
    <div class="row m0">
        <div class="col-lg-6 p0">
            <div class="left_img"></div>
        </div>
        <div class="col-lg-6 p0">
            <div class = "main-section" style="padding-left: 145px">
                <div class="item">
                    {!! $sections[ABOUT_US_1]['content'] !!}
                    {!! $sections[ABOUT_US_2]['content'] !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Mission Area =================-->
@endsection