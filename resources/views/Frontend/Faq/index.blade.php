@extends('layouts.front')

@push('styles')
<style>
    .dashed {
        border-bottom: 1px dashed #656565;
        cursor: pointer
    }   
</style>

@endpush
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content">
                <h2>FAQ</h2>
                <div class="page_link">
                    <a href="/">Home</a>
                    <a href="/faq">FAQ</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Mission Area =================-->
<div id="FAQ">
    <h2>Frequently Asked Questions</h2>
    @foreach ($records as $key => $record)
    <h3>{{ $faqCategoryList[$key] }}</h3>
        @foreach ($record as $value)
        <div class="question" style="width:690px;">
            <a class="plus" ajaxmode="disabled">+</a>
            <a class="dashed" ajaxmode="disabled">{{ $value->question }}</a>
            <div class="answer">
                <p> <?php echo nl2br($value->answer); ?> </p>
            </div>
        </div>
        @endforeach 
    @endforeach 
</div>
<!--================End Mission Area =================-->
@endsection

@push('view-scripts')
<script type="text/javascript">
    $("#FAQ .plus").click(function(n) 
    {
        $(n.target).hasClass("minus") ? ($(n.target).html("+"), $(n.target).next().next().slideUp("slow"), $(n.target).removeClass("minus")) : ($(n.target).html("-"), $(n.target).next().next().slideDown("slow"), $(n.target).addClass("minus"));
    });
    
    $("#FAQ .dashed").click(function(n) 
    {
        $(n.target).prev().click();
    });
</script>
@endpush