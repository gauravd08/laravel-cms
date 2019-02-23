@extends('layouts.admin')

@section('content')
<?php
$type = isset($record->type) ? $record->type : old('type');
?>
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
                            <i class="glyphicon glyphicon-picture"></i>
                            <span class="caption-subject bold uppercase">{{isset($record) ? 'Edit' : 'Add'}} Graphic</span>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row mt-20">
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <div class="form-group form-md-line-input form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control" id="form_control_1" name="name" 
                                           value="{{isset($record->name) ? $record->name : old('name')}}" placeholder="Enter graphic name">
                                    <label for="form_control_1">Name</label>
                                    <span class="help-block"><small class="text-danger">{{ $errors->first('name') }}</small></span>
                                </div>

                                <div class="form-group form-md-line-input has-info">
                                    <select class="form-control" name="type" id="select-type">
                                        <option value=""> Select Type </option>
                                        <?php foreach(StaticArray::$graphic_types as $value => $key): ?>
                                        <option <?= ($value == $type) ? 'selected' : ''; ?> value={{$value}} data-id="{{StaticArray::$graphic_type_images[$value]['width']}}px X {{StaticArray::$graphic_type_images[$value]['height']}}px, JPG, JPEG, PNG_only">{{$key}}</option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="form_control_1">Type</label>
                                    <span class="help-block"><small class="text-danger show-error hide"> <p id="error"></p></small></span>
                                </div>

                                <div class="form-group form-md-line-input {{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label>Image</label>
                                    @if(isset($record->image))
                                    <span class="pull-right file-links">
                                        <a href="/{{GRAPHIC_UPLOAD_PATH.$record->type.'/'.$record->image }}?{{time()}}" data-fancybox="images"><i class="icon-magnifier"></i></a>
                                    </span>
                                    @endif
                                    <input class="form-control" name="image" type="file">
                                    <span class="help-block" id="hint-block"><small class="text-danger">{{ $errors->first('image') }}</small></span>
                                </div>

                                <div class="form-group form-md-line-input form-group {{ $errors->has('caption') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control" id="form_control_1" name="caption" 
                                           value="{{isset($record->caption) ? $record->caption : old('caption')}}" placeholder="Enter caption name">
                                    <label for="form_control_1">Caption</label>
                                    <span class="help-block"><small class="text-danger">{{ $errors->first('caption') }}</small></span>
                                </div>

                                <div class="form-group form-md-line-input form-group {{ $errors->has('link') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control" id="form_control_1" name="link" 
                                           value="{{isset($record->link) ? $record->link : old('link')}}" placeholder="Enter link name">
                                    <label for="form_control_1">Link</label>
                                    <span class="help-block">http://www.example.com</span>
                                </div>
                                
                                <div class="form-group form-md-line-input form-group {{ $errors->has('link_text') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control" id="form_control_1" name="link_text" 
                                           value="{{isset($record->link_text) ? $record->link_text : old('link_text')}}" placeholder="Enter link text name">
                                    <label for="form_control_1">Link Text</label>
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
                                
                                <div class="form-group">
                                    <div class="pull-right mt-40">
                                        <button type="submit" submit-form class="btn blue">Submit</button>
                                        <button type="button" class="btn default" onClick="location.href = '/admin/graphics'">Cancel</button>
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
@push('view-scripts')
<script type="text/javascript">
    var hint = $('#select-type').find(':selected').data('id');
    $('#hint-block').text(hint);
    $('#select-type').change(function ()
    {
        var hint = $(this).find(':selected').data('id');
        $('#hint-block').text(hint);
    });
    $("[submit-form]").click(function ()
    {
        if (!$('#select-type').val())
        {
            $("#error").html("Graphic Type Required");
            $(".show-error").removeClass("hide");
            return false;
        }
    });

</script>
@endpush