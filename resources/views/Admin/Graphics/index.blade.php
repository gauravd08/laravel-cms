@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- END PAGE HEADER-->
        <div class="clearfix"></div>
        <div class="row">
            @include('Admin/partials/message')
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="glyphicon glyphicon-picture"></i>
                            <span class="caption-subject bold uppercase">
                               graphics
                            </span>
                        </div>
                        <div class="tools"> </div>
                        <div class="pull-right form-actions noborder">
                                <button type="button"  class="btn blue" onClick="location.href = '/admin/graphics/add'">Add Graphic</button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%"  id="ajax-dt">
                            <thead>
                                <tr>
                                    <th> Id </th>
                                    <th> Name </th>
                                    <th> Type </th>
                                    <th> Image </th>
                                    <th> Caption </th>
                                    <th> Status </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
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
@push('view-scripts')
<script type="text/javascript">
    $(document).ready( function () 
    {
        $('#ajax-dt').DataTable(
        {
            "iDisplayLength": 50,
            "processing": true,
            "scrollX": true,
            "language":
            {
                "sSearch": "", 
                'sSearchPlaceholder': "Search by name ",
                "processing": '<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>'
            },
            "serverSide": true,
            "ajax":
                {
                    "url": "/admin/ajax-graphics",
                    "dataType": "json",
                    "type": "POST",
                    "data": {_token: "{{csrf_token()}}"}
                },
            "columns":
                [
                    {"data": "id"},
                    {"data": "name"},
                    {"data": "type"},
                    {"data": "image"},
                    {"data": "caption"},
                    {"data": "is_active"},
                    {"data": "actions"}
                ],
            "columnDefs": [
                {"className": "dt-center", "targets": [0,3,5,6]},
                {"orderable": false, "targets": [3,4,5,6]}
            ]
        });
    });
</script>
@endpush