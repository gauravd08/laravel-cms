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
                                    <i class="fa fa-briefcase"></i>
                                <span class="caption-subject bold uppercase">{{ $heading }}</span>
                                </div>
                            </div>
                    <div class="portlet-body form">
                        {{Form::open(['method' => 'POST', 'files' => true, 'role' => 'form'])}}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-body">

                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="project_name"
                                        value="{{isset($record->project_name) ? $record->project_name : old('project_name')}}" placeholder="Enter Project Name"/>
                                    <label for="form_control_1">Project Name</label>
                                    <small class="text-danger">{{ $errors->first('project_name') }}</small>
                                </div>
                                <div class="form-group form-md-line-input {{ $errors->has('image') ? ' has-error' : '' }}">
                                    @if(isset($record->image))
                                        <a href="/{{ PORTFOLIOSIMAGES .'/'. $record->id . '/' .$record->image }}" data-fancybox="images" class="icon blue">
                                            <i class=" fa fa-search fr"></i>
                                        </a>
                                    @endif
                                    <?= Form::file('image', ['class' => 'form-control']); ?>
                                    <label for="form_control_1">Image</label>
                                     <?php if(!$errors->first('image'))
                                    {?>
                                        <span class="help-block">640px X 420px, JPG, JPEG, PNG only...</span>
                                    <?php
                                    }
                                    ?>
                                    <small class="text-danger">{{ $errors->first('image') }}</small>
                                </div>
                                <div class="form-group form-md-line-input" style="border-bottom:none;">
                                    <textarea class="form-control" rows="10" name="short_description" placeholder="Enter Short Description">{{isset($record->short_description) ? $record->short_description : old('short_description')}}</textarea>
                                    <label for="form_control_1">Comments</label>
                                    <small class="text-danger">{{ $errors->first('short_description') }}</small>
                                </div>
                                 <div class="form-group form-md-line-input form-group {{ $errors->has('link') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control" id="form_control_1" name="link" 
                                           value="{{isset($record->link) ? $record->link : old('link')}}" placeholder="Enter link">
                                    <label for="form_control_1">Link</label>
                                    <span class="help-block">http://www.example.com</span>
                                </div>
                                <div class="form-actions noborder">
                                    <div class="pull-right">
                                        <button type="submit" href="javascript:;" class="btn blue">Submit</button>
                                        <button type="button" onclick="location.href='/admin/portfolios';" class="btn default">Cancel</button>
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
