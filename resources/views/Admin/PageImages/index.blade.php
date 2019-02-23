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
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">
                               Images for page {{$pageList[$pageId]}}
                            </span>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                            <thead>
                                <tr>
                                    <th width="150"> Id </th>
                                    <th> Image </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($records as $key => $record)
                                <tr class="odd gradeX">
                                    <td class="text-center va-middle"> {{ $record->id }} </td>
                                    <td class="text-center"><img src ="/{{PAGE_IMAGE_UPLOAD_PATH.$record->page_id.'/'.$record->image }}?{{time()}}" width = "100" height = "60"></td>
                                    <td class="text-center va-middle">
                                        <a href="/admin/page-image/edit/{{$record->page_id}}/{{ $record->id }}" title="View" class="icon blue">
                                            <i class=" fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
@endsection