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
                <div class="portlet light">

                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">Contact Details</span>
                        </div>
                    </div>
                    
                    <div class="portlet-body form">
                        {{Form::open(['method' => 'POST', 'files' => true, 'role' => 'form'])}}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" name="contact_email"
                                        value="{{isset($record->contact_email) ? $record->contact_email : old('contact_email')}}" placeholder="Enter Contact Email" required/>
                                <label for="form_control_1">Contact Email</label>
                            </div>

                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" name="contact_number"
                                        value="{{isset($record->contact_number) ? $record->contact_number : old('contact_number')}}" placeholder="Enter contact number" required/>
                                <label for="form_control_1">Contact Number</label>
                            </div>
                        </div>
                    </div>

                    <div class="portlet-title mb-25">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">Social Details</span>
                        </div>
                        <div class="tools"> </div>
                    </div>

                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" name="facebook_link"
                                        value="{{isset($record->facebook_link) ? $record->facebook_link : old('facebook_link')}}" placeholder="Enter facebook link" required/>
                                <label for="form_control_1">Facebook Link</label>
                            </div>

                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" name="twitter_link"
                                        value="{{isset($record->twitter_link) ? $record->twitter_link : old('twitter_link')}}" placeholder="Enter twitter link" required/>
                                <label for="form_control_1">Twitter Link</label>
                            </div>

                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" name="google_link"
                                        value="{{isset($record->google_link) ? $record->google_link : old('google_link')}}" placeholder="Enter google link" required/>
                                <label for="form_control_1">Google Link</label>
                            </div>

                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" name="pinterest_link"
                                        value="{{isset($record->pinterest_link) ? $record->pinterest_link : old('pinterest_link')}}" placeholder="Enter pinterest link" required/>
                                <label for="form_control_1">Pinterest Link</label>
                            </div>

                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" name="youtube_link"
                                        value="{{isset($record->youtube_link) ? $record->youtube_link : old('youtube_link')}}" placeholder="Enter youtube link" required/>
                                <label for="form_control_1">Youtube Link</label>
                            </div>

                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" name="instagram_link"
                                        value="{{isset($record->instagram_link) ? $record->instagram_link : old('instagram_link')}}" placeholder="Enter instagram link" required/>
                                <label for="form_control_1">Instagram Link</label>
                            </div>

                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" name="copy_write"
                                        value="{{isset($record->copy_write) ? $record->copy_write : old('copy_write')}}" placeholder="Enter Copy write content" required/>
                                <label for="form_control_1">Copyright information</label>
                            </div>
                        </div>
                    </div>

                    <div class="portlet-title mb-25">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">Default Meta Information</span>
                        </div>
                        <div class="tools"> </div>
                    </div>

                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" name="default_meta_title"
                                        value="{{isset($record->default_meta_title) ? $record->default_meta_title : old('default_meta_title')}}" placeholder="Enter meta title" />
                                <label for="form_control_1">Default Meta Title</label>
                            </div>
                            
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" name="default_meta_keyword"
                                        value="{{isset($record->default_meta_keyword) ? $record->default_meta_keyword : old('default_meta_keyword')}}" placeholder="Enter meta keywords" />
                                <label for="form_control_1">Default Meta Keywords</label>
                            </div>

                            <div class="form-group form-md-line-input">
                                <textarea class="form-control" rows="3" type="text" name="default_meta_description" placeholder="Enter default meta description">{{isset($record->default_meta_description) ? $record->default_meta_description : old('default_meta_description')}}</textarea>
                                <label for="form_control_1">Default Meta Description</label>
                            </div>

                            <div class="form-actions noborder">
                                <div class="pull-right">
                                    <button type="submit" href="javascript:;" class="btn blue">Submit</button>
                                    <button type="button" onclick="location.href = '/admin/pages';" class="btn default">Cancel</button>
                                </div>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@endsection