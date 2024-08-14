<!-- Start Modal -->
<div class="modal fade custom-modal" id="addModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">{{ trans('main.Add') }}</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <div class="modal-body">
                <!-- <form id="storeForm" action="" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf -->

                    <ul id="error_list"></ul>

                    <!-- name_ar -->
                    <div class="form-group">
                        <label>{{ trans('main.Name') }} {{ trans('main.In Arabic') }}</label>
                        <input type="text" class="form-control name_ar" name="name_ar" value="{{ old('name_ar') }}" placeholder="{{ trans('main.Name') }} {{ trans('main.In Arabic') }}" required>
                    </div>

                    <!-- name_en -->
                    <div class="form-group">
                        <label>{{ trans('main.Name') }} {{ trans('main.In English') }}</label>
                        <input type="text" class="form-control name_en" name="name_en" value="{{ old('name_en') }}" placeholder="{{ trans('main.Name') }} {{ trans('main.In English') }}" required>
                    </div>

                    <!-- url -->
                    <div class="form-group">
                        <label>{{ trans('main.Url') }}</label>
                        <input type="text" class="form-control url" name="url" value="{{ old('url') }}" placeholder="{{ trans('main.Url') }}">
                    </div>
                    
                    <!-- photo -->
                    <div class="form-group">
                        <label>{{ trans('main.Photo') }}</label>
                        <input type="file" class="form-control photo" name="photo" value="{{ old('photo') }}" placeholder="{{ trans('main.Photo') }}">
                    </div>

                    <div class="mt-4">
                        <button id="storeBtn" class="btn btn-primary btn-block">{{ trans('main.Confirm') }}</button>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->