@extends('layouts.front')

@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content">
                <h2>Privacy Policy</h2>
                <div class="page_link">
                    <a href="/">Home</a>
                    <a href="/privacy">Privacy Policy</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Mission Area =================-->

<div class="privacy" style="margin-top:50px;margin-bottom: 50px;">
	<div class="container">
		<div class="privacy1">
			{!! $sections[PRIVACY_1]['content'] !!}
		</div>

		<div class="privacy2">
            {!! $sections[PRIVACY_2]['content'] !!}
		</div>
	</div>
</div>
<!--================End Mission Area =================-->
@endsection