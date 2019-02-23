@extends('layouts.front')

@push('styles')
<link rel="stylesheet" href="assets/frontend/plugins/slider/css/owl.carousel.min.css">
<link rel="stylesheet" href="assets/frontend/plugins/slider/css/owl.theme.min.css">
@endpush

@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content">
                <h2>Testimonial</h2>
                <div class="page_link">
                    <a href="/">Home</a>
                    <a href="/testimonial">Testimonial</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Mission Area =================-->
<div class="testimonial-bg">
    <div class="container testimonial-container">
        <div style="text-align:center;padding-bottom: 48px">
            <h3 style="font-size: 36px;color: black;">What our Clients Say</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="testimonial-slider" class="owl-carousel owl-theme">
                    @foreach($testimonials as $testimonial)
                    <div class="testimonial">
                        <div class="testimonial-profile">
                            <img src="/assets/frontend/uploads/testimonialsimages/{{$testimonial->id}}/{{$testimonial->image}}" alt="">
                        </div>
                        <div class="testimonial-content">
                            <h3 class="testimonial-title"><span>{{$testimonial->client_name}}</span></h3>
                            <span class="testimonial-post">{{$testimonial->designation}}</span>
                            <p class="testimonial-description">
                                {{$testimonial->comments}}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Mission Area =================-->
@endsection

@push('view-scripts')
<script type="text/javascript" src="assets/frontend/plugins/slider/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="assets/frontend/plugins/slider/js/owl.carousel.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#testimonial-slider").owlCarousel({
            items:2,
            itemsDesktop:[1000,2],
            itemsDesktopSmall:[979,2],
            itemsTablet:[767,1],
            pagination: true,
            autoPlay:true
        });
    });
    
</script>
@endpush