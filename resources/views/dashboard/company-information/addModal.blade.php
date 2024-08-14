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

                    <!-- address_ar -->
                    <div class="form-group">
                        <label>{{ trans('main.Address') }} {{ trans('main.In Arabic') }}</label>
                        <input type="text" class="form-control address_ar" name="address_ar" value="{{ old('address_ar') }}" placeholder="{{ trans('main.Address') }} {{ trans('main.In Arabic') }}" required>
                    </div>

                    <!-- address_en -->
                    <div class="form-group">
                        <label>{{ trans('main.Address') }} {{ trans('main.In English') }}</label>
                        <input type="text" class="form-control address_en" name="address_en" value="{{ old('address_en') }}" placeholder="{{ trans('main.Address') }} {{ trans('main.In English') }}" required>
                    </div>
                    
                    <!-- phone -->
                    <div class="form-group">
                        <label>{{ trans('main.phone') }}</label>
                        <input type="text" class="form-control phone" name="phone" value="{{ old('phone') }}" placeholder="{{ trans('main.phone') }}">
                    </div>

                    <!-- mobile -->
                    <div class="form-group">
                        <label>{{ trans('main.mobile') }}</label>
                        <input type="text" class="form-control mobile" name="mobile" value="{{ old('mobile') }}" placeholder="{{ trans('main.mobile') }}">
                    </div>

                    <!-- whatsapp -->
                    <div class="form-group">
                        <label>{{ trans('main.whatsapp') }}</label>
                        <input type="text" class="form-control whatsapp" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="{{ trans('main.whatsapp') }}">
                    </div>

                    <!-- email -->
                    <div class="form-group">
                        <label>{{ trans('main.email') }}</label>
                        <input type="text" class="form-control email" name="email" value="{{ old('email') }}" placeholder="{{ trans('main.email') }}">
                    </div>

                    <!-- facebook_url -->
                    <div class="form-group">
                        <label>{{ trans('main.facebook_url') }}</label>
                        <input type="text" class="form-control facebook_url" name="facebook_url" value="{{ old('facebook_url') }}" placeholder="{{ trans('main.facebook_url') }}">
                    </div>

                    <!-- youtube_url -->
                    <div class="form-group">
                        <label>{{ trans('main.youtube_url') }}</label>
                        <input type="text" class="form-control youtube_url" name="youtube_url" value="{{ old('youtube_url') }}" placeholder="{{ trans('main.youtube_url') }}">
                    </div>

                    <!-- linkedin_url -->
                    <div class="form-group">
                        <label>{{ trans('main.linkedin_url') }}</label>
                        <input type="text" class="form-control linkedin_url" name="linkedin_url" value="{{ old('linkedin_url') }}" placeholder="{{ trans('main.linkedin_url') }}">
                    </div>

                    <!-- twitter_url -->
                    <div class="form-group">
                        <label>{{ trans('main.twitter_url') }}</label>
                        <input type="text" class="form-control twitter_url" name="twitter_url" value="{{ old('twitter_url') }}" placeholder="{{ trans('main.twitter_url') }}">
                    </div>
                    
                    <!-- instagram_url -->
                    <div class="form-group">
                        <label>{{ trans('main.instagram_url') }}</label>
                        <input type="text" class="form-control instagram_url" name="instagram_url" value="{{ old('instagram_url') }}" placeholder="{{ trans('main.instagram_url') }}">
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