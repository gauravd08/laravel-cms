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
                            <i class="icon-question font-dark"></i>
                            <span class="caption-subject bold uppercase">
                               faqs
                            </span>
                        </div>
                        <div class="tools"> </div>
                        <div class="pull-right form-actions noborder">
                                <button type="button"  class="btn blue" onClick="location.href = '/admin/faqs/add'">Add Faq</button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%"  id="ajax-dt">
                            <thead>
                                <tr>
                                    <th width="150"> Id </th>
                                    <th> Category </th>
                                    <th> Question </th>
                                    <th> Answer </th>
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
            "processing": true,
            "scrollX": true,
            "language":
            {
                "sSearch": "", 
                'sSearchPlaceholder': "Search by question ",
                "processing": '<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>'
            },
            "serverSide": true,
            "bLengthChange": false,
            "ajax":
                {
                    "url": "/admin/ajax-faqs",
                    "dataType": "json",
                    "type": "POST",
                    "data": {_token: "{{csrf_token()}}"}
                },
            "columns":
                [
                    {"data": "id"},
                    {"data": "category"},
                    {"data": "question"},
                    {"data": "answer"},
                    {"data": "actions"}
                ],
            "columnDefs": [
                {"className": "dt-center", "targets": [0,4]},
                {"orderable": false, "targets": [2,3,4]}
            ]
        });
        
        $(document).on("click",".deleteRecord",function() 
        {
            if(confirm('Are you sure to want delete this record?'))
            {
                var id = $(this).attr('data-id');
                location.href('faq/delete/'+id);
            }
            else
            {
                return false;
            }
        });
    });
</script>
@endpush