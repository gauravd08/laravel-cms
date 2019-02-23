@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- END PAGE HEADER-->
        <div class="row">
            @include('Admin/partials/message')
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                     {{ Form::open(['method' => 'POST', 'files' => true]) }}
                    <div class="portlet-title fs-16">
                        <div class="caption font-dark">
                            <i class="icon-question font-dark"></i>
                            <span class="caption-subject bold uppercase">{{isset($record) ? 'Edit' : 'Add'}} Faq</span>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row mt-20">
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <div class="form-group form-md-line-input has-info">
                                     {{Form::select('faq_category_id', $faqCategoryList, isset($record->faq_category_id) ? $record->faq_category_id : '', ['class' => 'form-control', 
                                        'placeholder' => 'Select Category'])}}
                                    <label for="form_control_1">Category</label>
                                    <span class="help-block"><small class="text-danger">{{ $errors->first('faq_category_id') }}</small></span>
                                </div>
                                
                                <div class="form-group form-md-line-input form-group {{ $errors->has('question') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control" id="form_control_1" name="question" 
                                           value="{{isset($record->question) ? $record->question : old('question')}}" placeholder="Enter question">
                                    <label for="form_control_1">Question</label>
                                    <span class="help-block"><small class="text-danger">{{ $errors->first('question') }}</small></span>
                                </div>

                                <div class="form-group form-md-line-input {{ $errors->has('answer') ? ' has-error' : '' }}">
                                    <textarea class="form-control" rows="10" name="answer" placeholder="Enter answer">{{isset($record->answer) ? $record->answer : old('answer')}}</textarea>
                                    <label for="form_control_1">Answer</label>
                                    <span class="help-block"><small class="text-danger">{{ $errors->first('answer') }}</small></span>
                                </div>

                                <div class="form-group">
                                    <div class="pull-right mt-40">
                                        <button type="submit" class="btn blue">Submit</button>
                                        <button type="button" class="btn default" onClick="location.href = '/admin/faqs'">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
@endsection