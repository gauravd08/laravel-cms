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
                            <i class="fa fa-quote-left"></i>
                            <span class="caption-subject bold uppercase">Testimonials</span>
                        </div>
                        <div class="tools">
                            <button type="button" onclick="location.href='/admin/testimonial/add';" class="btn blue">Add New Testimonial</button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover dt-responsive" id="ajax-dt" width="100%">
                            <thead>
                                <tr>
                                    <th> Id </th>
                                    <th> Name </th>
                                    <th width="150"> Image </th>
                                    <th> Designation </th>
                                    <th> Status </th>
                                    <th> Action </th>
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
            "processing": true,
            "scrollX": true,
            "language":
            {
                "sSearch": "", 
                'sSearchPlaceholder': "Search by name or designation ",
                "processing": '<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>'
            },
            "serverSide": true,
            "bLengthChange": false,
            "ajax":
                {
                    "url": "/admin/ajax-testimonials",
                    "dataType": "json",
                    "type": "POST",
                    "data": {_token: "{{csrf_token()}}"}
                },
            "columns":
                [
                    {"data": "id"},
                    {"data": "client_name"},
                    {"data": "image"},
                    {"data": "designation"},
                    {"data": "is_active"},
                    {"data": "actions"}
                ],
            "columnDefs": [
                {"className": "dt-center", "targets": [0,2,4,5]},
                {"orderable": false, "targets": [2,3,5]}
            ]
        });
    });

    $(document).on("click",".deleteRecord",function() 
    {
        if(confirm('Are you sure to want delete this record?'))
        {
            var id = $(this).attr('data-id');
            location.href('testimonial/delete/'+id);
        }
        else
        {
            return false;
        }
    });
    
</script>
@endpush