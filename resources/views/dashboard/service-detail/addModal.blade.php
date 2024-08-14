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
                    
                    <!-- details_ar -->
                    <div class="form-group">
                        <label>{{ trans('main.Details') }} {{ trans('main.In Arabic') }}</label>
                        <textarea type="text" class="form-control details_ar" name="details_ar" value="{{ old('details_ar') }}" placeholder="{{ trans('main.Details') }} {{ trans('main.In Arabic') }}" required></textarea>
                    </div>
                    
                    <!-- details_en -->
                    <div class="form-group">
                        <label>{{ trans('main.Details') }} {{ trans('main.In English') }}</label>
                        <textarea type="text" class="form-control details_en" name="details_en" value="{{ old('details_en') }}" placeholder="{{ trans('main.Details') }} {{ trans('main.In English') }}" required></textarea>
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