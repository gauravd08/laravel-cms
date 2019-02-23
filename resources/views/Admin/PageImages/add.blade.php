@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                     {{ Form::open(['method' => 'POST', 'files' => true]) }}
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">Add Image</span>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row"><small class="text-danger col-md-offset-2">{{ $errors->first('page_id') }}</small></div>
                        <div class="form-group mt-20">
                            <label>Image</label>
                            <span class="pull-right file-links">
                            </span>
                           {{ Form::file('image', ['class' => 'form-control']) }}
                        </div>
                        <div class="row"><small class="text-danger col-md-offset-2">{{ $errors->first('image') }}</small></div>
                        <div class="row">
                            <div class="col-md-offset-8 col-md-4 mt-40" style="text-align: right;">
                                <input type="hidden" name="page_id" value="{{$id}}">
                                <button type="submit" class="btn blue">Submit</button>
                                <button type="button" class="btn default" onClick="location.href = '{{ URL::previous() }}'">Cancel</button>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
@endsection