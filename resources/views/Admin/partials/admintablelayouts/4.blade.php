<table class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer" width="100%" role="grid">
    <thead>
        <tr role="row">
            <td class="p-rel">
                {!! strip_tags($sections[PRIVACY_1]['content'], 3500) !!} 
                <div class="edit-div">
                    <div class="form-group inner-edit-div">
                        <a class="btn default" href="<?php echo "/admin/page-section/edit/" . $sections[PRIVACY_1]['id'] ?>">Edit</a>
                    </div>
                </div>
            </td>
            <td class="p-rel">
                {!! strip_tags($sections[PRIVACY_2]['content'], 3500) !!} 
                <div class="edit-div">
                    <div class="form-group inner-edit-div">
                        <a class="btn default" href="<?php echo "/admin/page-section/edit/" . $sections[PRIVACY_2]['id'] ?>">Edit</a>
                    </div>
                </div>
            </td>
        </tr>
    </thead>
</table>