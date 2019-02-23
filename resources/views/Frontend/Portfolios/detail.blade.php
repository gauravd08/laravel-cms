@extends('layouts.front')

@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content">
                <h2>Portfolio Details</h2>
                <div class="page_link">
                    <a href="/">Home</a>
                    <a href="/portfolio/detail/{{$record->id}}">Portfolio Details</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Portfolio Details Area =================-->
<section class="portfolio_details_area p_120" style="padding-bottom: 0px;">
        	<div class="container">
        		<div class="portfolio_details_inner">
					<div class="row">
						<div class="col-md-6">
							<div class="left_img">
								<img class="img-fluid" src="/assets/frontend/uploads/portfoliosimages/{{$record->id}}/{{$record->image}}" alt="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="portfolio_right_text">
								<h4>{{$record->project_name}}</h4>
								<p>{{$record->short_description}}</p>
							</div>
						</div>
					</div>
        		</div>
        	</div>
        </section>
<!--================End Portfolio Details Area =================-->
@endsection