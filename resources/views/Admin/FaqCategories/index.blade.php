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
                            <i class="icon-grid font-dark"></i>
                            <span class="caption-subject bold uppercase">
                               faq categories
                            </span>
                        </div>
                        <div class="tools"> </div>
                        <div class="pull-right form-actions noborder">
                                <button type="button"  class="btn blue" onClick="location.href = '/admin/faq-category/add'">Add Faq Category</button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%"  id="ajax-dt">
                            <thead>
                                <tr>
                                    <th> Id </th>
                                    <th> Category Name </th>
                                    <th> No of Questions </th>
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
                'sSearchPlaceholder': "Search by category name ",
                "processing": '<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>'
            },
            "serverSide": true,
            "bLengthChange": false,
            "ajax":
                {
                    "url": "/admin/ajax-faq-categories",
                    "dataType": "json",
                    "type": "POST",
                    "data": {_token: "{{csrf_token()}}"}
                },
            "columns":
                [
                    {"data": "id"},
                    {"data": "category_name"},
                    {"data": "question_count"},
                    {"data": "action"}
                ],
            "columnDefs": [
                {"className": "dt-center", "targets": [0,1,2,3]},
                {"orderable": false, "targets": [2,3]}
            ]
        });
        
        
        $(document).on("click",".deleteRecord",function() 
        {
            if(confirm('Are you sure to want delete this record?'))
            {
                var id = $(this).attr('data-id');
                location.href('faq-category/delete/'+id);
            }
            else
            {
                return false;
            }
        });
    });
</script>
@endpush