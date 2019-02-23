@extends('layouts.admin')

@section('content')
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
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-note"></i>
                            <span class="caption-subject bold uppercase">Edit {{$record->page->name}}</span>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body form">
                        <form method="post" class="form-horizontal form-row-seperated">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group" style="border-bottom:none;">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Content <span>*</span> :</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {!! Form::textarea('content',isset($record->content) ? $record->content : '', array('class'=>'form-control ckeditor', 
                                     'rows' => 10, 'cols' => 50)) !!}
                                <small class="text-danger">{{ $errors->first('content') }}</small>
                                <div class="pull-right mt-40">
                                    <button type="submit" class="btn blue">Submit</button>
                                    <button type="button" class="btn default" onClick="location.href='/admin/pages/edit/{{$record->page_id}}'">Cancel</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
@endsection