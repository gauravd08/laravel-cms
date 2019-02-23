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
                                    <i class="fa fa fa-users"></i>
                                <span class="caption-subject bold uppercase">{{ $heading }}</span>
                                </div>
                            </div>
                    <div class="portlet-body form">
                        {{Form::open(['method' => 'POST', 'files' => true, 'role' => 'form'])}}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-body">

                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="display_name"
                                        value="{{isset($record->display_name) ? $record->display_name : old('display_name')}}" placeholder="Enter Name"/>
                                    <label for="form_control_1">Name</label>
                                    <small class="text-danger">{{ $errors->first('display_name') }}</small>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="designation"
                                        value="{{isset($record->designation) ? $record->designation : old('designation')}}" placeholder="Enter Designation"/>
                                    <label for="form_control_1">Designation</label>
                                     <small class="text-danger">{{ $errors->first('designation') }}</small>
                                </div>
                                <div class="form-group form-md-line-input" style="border-bottom:none;">
                                    <textarea class="form-control" rows="10" name="about" placeholder="About Member">{{isset($record->about) ? $record->about : old('about')}}</textarea>
                                    <label for="form_control_1">Comments</label>
                                    <small class="text-danger">{{ $errors->first('about') }}</small>
                                </div>
                                
                                <div class="form-group form-md-line-input {{ $errors->has('image') ? ' has-error' : '' }}">
                                    @if(isset($record->image))
                                        <a href="/{{ TEAMSIMAGES .'/'. $record->id . '/' .$record->image }}" data-fancybox="images" class="icon blue">
                                            <i class=" fa fa-search fr"></i>
                                        </a>
                                    @endif
                                    <?= Form::file('image', ['class' => 'form-control']); ?>
                                    <label for="form_control_1">Image</label>
                                     <?php if(!$errors->first('image'))
                                    {?>
                                        <span class="help-block">480px X 650px, JPG, JPEG, PNG only...</span>
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
                                        <button type="button" onclick="location.href='/admin/team';" class="btn default">Cancel</button>
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
