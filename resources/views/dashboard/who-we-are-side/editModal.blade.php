<!-- Start Modal -->
<div class="modal fade custom-modal" id="editModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">{{ trans('main.Edit') }}</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <div class="modal-body">
                <!-- <form action="{{ route('who-we-are-side.update', 'test') }}" method="post" enctype="multipart/form-data">
                    {{ method_field('patch') }}
                    @csrf -->

                    <ul id="update_error_list"></ul>

                    <!-- name_ar -->
                    <div class="form-group">
                        <label>{{ trans('main.Name') }} {{ trans('main.In Arabic') }}</label>
                        <input id="update_name_ar" type="text" class="form-control name_ar" name="name_ar" placeholder="{{ trans('main.Name') }} {{ trans('main.In Arabic') }}" required>
                    </div>

                    <!-- name_en -->
                    <div class="form-group">
                        <label>{{ trans('main.Name') }} {{ trans('main.In English') }}</label>
                        <input id="update_name_en" type="text" class="form-control name_en" name="name_en" placeholder="{{ trans('main.Name') }} {{ trans('main.In Arabic') }}" required>
                    </div>

                    <!-- details_ar -->
                    <div class="form-group">
                        <label>{{ trans('main.Details') }} {{ trans('main.In Arabic') }}</label>
                        <textarea id="update_details_ar" type="text" class="form-control details_ar" name="details_ar" placeholder="{{ trans('main.Details') }} {{ trans('main.In Arabic') }}" required></textarea>
                    </div>

                    <!-- details_en -->
                    <div class="form-group">
                        <label>{{ trans('main.Details') }} {{ trans('main.In English') }}</label>
                        <textarea id="update_details_en" type="text" class="form-control details_en" name="details_en" placeholder="{{ trans('main.Details') }} {{ trans('main.In English') }}" required></textarea>
                    </div>
                    
                    <!-- photo -->
                    <div class="form-group">
                    <label>{{ trans('main.Photo') }} :</label>
                    <input id="update_photo" class="form-control photo" type="file" name="photo" accept="image/*" data-height="70"/>
                    <div class="row">
                        <div class="col-12">
                            <img id="preview_image" class="img-thumbnail m-1" src="" alt="" height="100" width="100">
                        </div>
                    </div>

                    <!-- id -->
                    <div class="form-group">
                        <input id="update_id" type="hidden" name="id" class="form-control id">
                    </div>

                    <div class="mt-4">
                        <button id="updateBtn" class="updateBtn btn btn-primary btn-block">{{ trans('main.Confirm') }}</button>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
