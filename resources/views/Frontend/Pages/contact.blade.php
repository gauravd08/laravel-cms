@extends('layouts.front')

@section('content')

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content">
                <h2>Contact Us</h2>
                <div class="page_link">
                    <a href="/">Home</a>
                    <a href="/contact">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Mission Area =================-->
<div class="row">
        @include('Admin/partials/message')
</div>
 <section class="contact_area p_120">
            <div class="container">
                <div id="map"></div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="contact_info">
                            <div class="info_item">
                                <i class="lnr lnr-phone-handset"></i>
                                <h6><a href="#">{{$contactInfo->contact_number}}</a></h6>
                                <p>Mon to Fri 9am to 6 pm</p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-envelope"></i>
                                <h6><a href="#">{{$contactInfo->contact_email}}</a></h6>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <form class="row contact_form" action="/contact" method="post" id="contactForm" novalidate="novalidate">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('first_name')}}" name="first_name" placeholder="Enter your first name">
                                    <small class="text-danger">{{ $errors->first('first_name') }}</small>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{old('last_name')}}"  name="last_name" placeholder="Enter your last name">
                                     <small class="text-danger">{{ $errors->first('last_name') }}</small>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" value="{{old('email')}}" name="email" placeholder="Enter email address">
                                     <small class="text-danger">{{ $errors->first('email') }}</small>
                                </div>
                                 <div class="form-group">
                                     <input type="number" class="form-control" value="{{old('phone')}}" name="phone" placeholder="Enter Phone number">
                                      <small class="text-danger">{{ $errors->first('phone') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="comment"  rows="1" placeholder="Enter Message">{{old('comment')}}</textarea>
                                     <small class="text-danger">{{ $errors->first('comment') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" value="submit" class="btn submit_btn">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
<!--================End Mission Area =================-->
@endsection
