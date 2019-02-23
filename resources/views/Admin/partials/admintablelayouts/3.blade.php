<table class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer" width="100%" role="grid">
    <thead>
        <tr role="row">
            <td class="p-0 text-center">
                <table class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer">
                    <thead>
                        <tr role="row">
                            <td class="p-rel">
                                <img src="/{{PAGE_IMAGE_UPLOAD_PATH.$record->id.'/'.$images[COMPANY_IMAGE_1]['image']}}" width="200">
                                <div class="edit-div">
                                    <div class="form-group inner-edit-div">
                                        <a class="btn default" href="/admin/page-image/edit/{{ $id }}/{{ $images[COMPANY_IMAGE_1]['id'] }}">Edit</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </thead>
                </table>
            </td>
            <td class="p-rel">
                {!! strip_tags($sections[COMPANY_1]['content'], 3500) !!} 
                <div class="edit-div">
                    <div class="form-group inner-edit-div">
                        <a class="btn default" href="<?php echo "/admin/page-section/edit/" . $sections[COMPANY_1]['id'] ?>">Edit</a>
                    </div>
                </div>
            </td>
            <td class="p-rel">
                {!! strip_tags($sections[COMPANY_2]['content'], 3500) !!} 
                <div class="edit-div">
                    <div class="form-group inner-edit-div">
                        <a class="btn default" href="<?php echo "/admin/page-section/edit/" . $sections[COMPANY_2]['id'] ?>">Edit</a>
                    </div>
                </div>
            </td>
        </tr>
    </thead>
</table>