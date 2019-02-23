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
                                    <i class="icon-lock font-dark"></i>
                                    <span class="caption-subject bold uppercase">Change Password</span>
                                </div>
                            </div>
                    <div class="portlet-body form">
                        {{Form::open(['method' => 'POST', 'files' => true, 'role' => 'form'])}}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-body">
                                <div class="form-group form-md-line-input">
                                    <input type="password" class="form-control" name="old_password"
                                        value="{{isset($record->link) ? $record->link : old('link')}}" placeholder="Enter old password" required/>
                                    <label for="form_control_1">Old Password</label>
                                    <span class="help-block"><small class="text-danger">{{ $errors->first('old_password') }}</small></span>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <input type="password" class="form-control" name="new_password"
                                        value="{{isset($record->link) ? $record->link : old('link')}}" placeholder="Enter new password" required/>
                                    <label for="form_control_1">New Password</label>
                                    <span class="help-block"><small class="text-danger">{{ $errors->first('new_password') }}</small></span>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <input type="password" class="form-control" name="confirm_password"
                                        value="{{isset($record->link) ? $record->link : old('link')}}" placeholder="Enter confirm password" required/>
                                    <label for="form_control_1">Confirm Password</label>
                                    <span class="help-block"><small class="text-danger">{{ $errors->first('confirm_password') }}</small></span>
                                </div>
                                
                                <div class="form-actions noborder">
                                    <button type="submit" href="javascript:;" class="btn blue">Submit</button>
                                    <button type="button" onclick="location.href='/admin/press';" class="btn default">Cancel</button>
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

@push('view-scripts')
<script type="text/javascript">
 $('#datetimepicker').datepicker({
        autoclose:true
        });
</script>
@endpush