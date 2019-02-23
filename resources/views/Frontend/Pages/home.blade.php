@extends('layouts.front')

@section('content')
<!--================Home Banner Area =================-->
<section class="home_banner_area">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach($banners as $banner)
            <div class="swiper-slide"><img src="assets/frontend/img/graphics/{{GRAPHIC_TYPE_HOME_BANNER}}/{{$banner->image}}" alt="">
                <div class="slider_text_inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="slider_text">
                                    <h2>{{$banner->name}}</h2>
                                    <p>{{$banner->caption}}</p>
                                    <a class="banner_btn" href="{{$banner->link}}">{{$banner->link_text}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Mission Area =================-->
<section class="mission_area">
    <div class="row m0">
        <div class="col-lg-6 p0">
            <div class="left_img"><img src="assets/frontend/img/pages/{{$record->id}}/{{$images[HOME_IMAGE_1]['image']}}" alt=""></div>
        </div>
        <div class="col-lg-6 p0">
            <div class="main-section" style="padding-left: 145px">
                <div class="item">
                   {!! $sections[HOME_1]['content'] !!}
                   {!! $sections[HOME_2]['content'] !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Mission Area =================-->

<!--================Success Area =================-->
<section class="success_area">
    <div class="row m0">
        <div class="col-lg-6 p0">
            {!! $sections[HOME_3]['content'] !!}
        </div>
        <div class="col-lg-6 p0">
            <div class="success_img">
                <img src="assets/frontend/img/pages/{{$record->id}}/{{$images[HOME_IMAGE_2]['image']}}" alt="">
            </div>
        </div>
    </div>
    <div class="row m0 right_dir">
        <div class="col-lg-6 p0">
            <div class="success_img">
                <img src="assets/frontend/img/pages/{{$record->id}}/{{$images[HOME_IMAGE_3]['image']}}" alt="">
            </div>
        </div>
        <div class="col-lg-6 p0">
           {!! $sections[HOME_4]['content'] !!}
        </div>
    </div>
</section>
<!--================End Success Area =================-->

<!--================Project Area =================-->
<section class="project_area">
    <div class="row m0">
        @foreach($portfolios as $portfolio)
        <div class="col-lg-4 col-md-6 p0">
            <div class="project_item">
                <img src="{{PORTFOLIOSIMAGES .'/' .$portfolio->id .'/'. $portfolio->image}}" alt="">
                <div class="hover_text">
                    <h4>{{$portfolio->project_name}}</h4>
                    <a class="main_btn" href="/portfolio/detail/{{$portfolio->id}}">View More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!--================End Project Area =================-->

<!--================Team Area =================-->
<section class="team_area">
    <div class="team_slider owl-carousel">
        @foreach($teams as $team)
        <div class="item">
            <div class="team_item">
                <img src="{{TEAMSIMAGES .'/'. $team->id .'/'. $team->image}}" alt="">
                <div class="hover_text">
                    <h4>{{$team->display_name}}</h4>
                    <p>{{$team->designation}}</p>
                    <div class="list">
                        {{$team->about}}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!--================End Team Area =================-->

@endsection