<table class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer" width="100%" height="300" role="grid" >
    <thead>
        <tr>
            <td class="p-rel" colspan="2">
                <img width="100%" height="300" src="/{{PAGE_IMAGE_UPLOAD_PATH.$record->id.'/'.$images[HOME_IMAGE_1]['image']}}" />
                <div class="edit-div">
                    <div class="form-group inner-edit-div">
                        <a class="btn default" href="/admin/page-image/edit/{{ $id }}/{{ $images[HOME_IMAGE_1]['id'] }}">Edit</a>
                    </div>
                </div>
            </td>
            <td class="p-rel" colspan="2">
                {!! $sections[HOME_1]['content'] !!}
                <div class="edit-div">
                    <div class="form-group inner-edit-div">
                        <a class="btn default" href="<?php echo "/admin/page-section/edit/" . $sections[HOME_1]['id'] ?>">Edit</a>
                    </div>
                </div>
            </td>
            <td class="p-rel" colspan="2">
                {!! $sections[HOME_2]['content'] !!}
                <div class="edit-div">
                    <div class="form-group inner-edit-div">
                        <a class="btn default" href="<?php echo "/admin/page-section/edit/" . $sections[HOME_2]['id'] ?>">Edit</a>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="p-rel" colspan="2">
                {!! $sections[HOME_3]['content'] !!}
                <div class="edit-div">
                    <div class="form-group inner-edit-div">
                        <a class="btn default" href="<?php echo "/admin/page-section/edit/" . $sections[HOME_3]['id'] ?>">Edit</a>
                    </div>
                </div>
            </td>
             <td class="p-rel" colspan="2">
                <img width="100%" height="300" src="/{{PAGE_IMAGE_UPLOAD_PATH.$record->id.'/'.$images[HOME_IMAGE_2]['image']}}" />
                <div class="edit-div">
                    <div class="form-group inner-edit-div">
                        <a class="btn default" href="/admin/page-image/edit/{{ $id }}/{{ $images[HOME_IMAGE_2]['id'] }}">Edit</a>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="p-rel" colspan="2">
                <img width="100%" height="300" src="/{{PAGE_IMAGE_UPLOAD_PATH.$record->id.'/'.$images[HOME_IMAGE_3]['image']}}" />
                <div class="edit-div">
                    <div class="form-group inner-edit-div">
                        <a class="btn default" href="/admin/page-image/edit/{{ $id }}/{{ $images[HOME_IMAGE_3]['id'] }}">Edit</a>
                    </div>
                </div>
            </td>
             <td class="p-rel" colspan="2">
                {!! $sections[HOME_4]['content'] !!}
                <div class="edit-div">
                    <div class="form-group inner-edit-div">
                        <a class="btn default" href="<?php echo "/admin/page-section/edit/" . $sections[HOME_4]['id'] ?>">Edit</a>
                    </div>
                </div>
            </td>
        </tr>
    </thead>
</table>

