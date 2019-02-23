@extends('layouts.admin')

@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="clearfix"></div>
        <div class="row">
            @include('Admin/partials/message')
        </div>
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light ">
                        <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="fa fa-quote-left"></i>
                                <span class="caption-subject bold uppercase">{{ $heading }}</span>
                                </div>
                            </div>
                    <div class="portlet-body form">
                        {{Form::open(['method' => 'POST', 'files' => true, 'role' => 'form'])}}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-body">

                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="client_name"
                                        value="{{isset($record->client_name) ? $record->client_name : old('client_name')}}" placeholder="Enter Client Name"/>
                                    <label for="form_control_1">Client Name</label>
                                    <small class="text-danger">{{ $errors->first('client_name') }}</small>
                                </div>
                                
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="designation"
                                        value="{{isset($record->designation) ? $record->designation : old('designation')}}" placeholder="Enter Designation"/>
                                    <label for="form_control_1">Designation</label>
                                     <small class="text-danger">{{ $errors->first('designation') }}</small>
                                </div>
                                
                                <div class="form-group form-md-line-input" style="border-bottom:none;">
                                    <textarea class="form-control" rows="10" name="comments" placeholder="Enter Comments">{{isset($record->comments) ? $record->comments : old('comments')}}</textarea>
                                    <label for="form_control_1">Comments</label>
                                    <small class="text-danger">{{ $errors->first('comments') }}</small>
                                </div>
                                
                                <div class="form-group form-md-line-input">
                                    @if(isset($record->image))
                                        <a href="/{{ TESTIMONIALSIMAGES .'/'. $record->id . '/' .$record->image }}" data-fancybox="images" class="icon blue">
                                            <i class=" fa fa-search fr"></i>
                                        </a>
                                    @endif
                                    <?= Form::file('image', ['class' => 'form-control']); ?>
                                    <label for="form_control_1">Image</label>
                                    <?php if(!$errors->first('image'))
                                    {?>
                                        <span class="help-block">270px X 270px, JPG, JPEG, PNG only...</span>
                                    <?php
                                    }
                                    ?>
                                    <small class="text-danger">{{ $errors->first('image') }}</small>
                                </div>
                                <div class="form-group form-md-checkboxes">
                                    <div class="md-checkbox-list">
                                        <div class="md-checkbox">
                                            {{Form::checkbox('is_active', 1, isset($record->is_active) ? $record->is_active : true, ['class' => 'BoolActive', 'id' => 'checkbox1'])}}
                                            <input type="checkbox" id="checkbox1" class="md-check">
                                            <label for="checkbox1">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Active </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions noborder">
                                    <div class="pull-right">
                                        <button type="submit" href="javascript:;" class="btn blue">Submit</button>
                                        <button type="button" onclick="location.href='/admin/testimonials';" class="btn default">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        {{Form::close()}}
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@endsection
