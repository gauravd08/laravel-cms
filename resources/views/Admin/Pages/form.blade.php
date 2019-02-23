@extends('layouts.admin')

 @section('content')

 <?php  $getpage = "Admin/partials/admintablelayouts/$id"; ?>

<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- END PAGE HEADER-->
        <div class="clearfix"></div>
        <div class="row">
            @include('Admin/partials/message')
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light fs-16">
                    <form method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="portlet-title mb-25">
                            <div class="caption font-dark">
                                <i class="icon-note font-dark"></i>
                                <span class="caption-subject bold uppercase">Edit {{$record['name']}}</span>
                            </div>
                            <div class="tools"> </div>
                        </div>
                        <div class="form-group form-md-line-input form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" id="form_control_1" name="name" 
                                   value="{{isset($record->name) ? $record->name : ''}}" placeholder="Enter page name">
                            <label for="form_control_1">Name</label>
                            <span class="help-block"><small class="text-danger">{{ $errors->first('name') }}</small></span>
                        </div>
                        <div class="portlet-title mt-50 mb-25">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase">Other Details</span>
                            </div>
                            <div class="tools"> </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <input type="text" class="form-control" id="form_control_2"  name="meta_title" 
                                   value="{{isset($record->meta_title) ? $record->meta_title : ''}}" placeholder="Enter page meta title">
                            <label for="form_control_2">Meta Title</label>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group form-md-line-input">
                            <input type="text" class="form-control" id="form_control_3"  name="meta_keywords" 
                                   value="{{isset($record->meta_keywords) ? $record->meta_keywords  : ''}}" placeholder="Enter page meta keywords">
                            <label for="form_control_3">Meta Keyword</label>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group form-md-line-input">
                            <input type="text" class="form-control" id="form_control_4"  name="meta_description" 
                                   value="{{isset($record->meta_description) ? $record->meta_description : ''}}" placeholder="Enter page meta keywords">
                            <label for="form_control_4">Meta Description</label>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group form-md-line-input">
                            <div class="form-group pull-right">
                                <button type="submit" class="btn blue">Submit</button>
                                <button type="button" class="btn default" onClick="location.href = '{{ URL::previous() }}'">Cancel</button>
                            </div>
                        </div>
                    </form>
                    <div class="layout-table" style="padding:15px 0px 25px 0px;">
                    @if(view()->exists($getpage))
                       @include($getpage)
                    @endif
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>

@push('view-scripts')
<script>
  
   $('.p-rel').mouseenter(function(){
        $(this).find('div.edit-div').show();
    });
    $('.p-rel').mouseleave(function(){
          $(this).find('div.edit-div').hide();
    });


</script>
@endpush

@endsection