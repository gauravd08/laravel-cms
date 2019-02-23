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
                            <span class="caption-subject bold uppercase">Edit Image</span>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row mt-20">
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label>Image</label>
                                    <span class="help">({{StaticArray::$static_page_images[$record->page_id][$record->id]['width']}}px X {{StaticArray::$static_page_images[$record->page_id][$record->id]['height']}}px, JPG, JPEG, PNG only)</span>
                                    <span class="pull-right file-links">
                                        <a href="/{{PAGE_IMAGE_UPLOAD_PATH.$record->page_id.'/'.$record->image }}?{{time()}}" data-fancybox="images"><i class="icon-magnifier"></i></a>
                                    </span>
                                    <input class="form-control" name="image" type="file">
                                    <small class="text-danger">{{ $errors->first('image') }}</small>
                                    <input type="hidden" name="page_id" value="{{$record->page_id}}">
                                </div>
                                <div class="form-group">
                                    <div class="pull-right mt-40">
                                        <button type="submit" class="btn blue">Submit</button>
                                        <button type="button" class="btn default" onClick="location.href = '/admin/pages/edit/{{$record->page_id}}'">Cancel</button>
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
    </div>
</div>
@endsection