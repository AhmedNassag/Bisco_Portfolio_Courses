<!-- Start Modal -->
<div class="modal fade custom-modal" id="editModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">{{ trans('main.Edit') }}</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <div class="modal-body">
                <!-- <form action="{{ route('slider.update', 'test') }}" method="post" enctype="multipart/form-data">
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
                    
                    <!--details_ar-->
                    <div class="form-group">
                        <label>{{ trans('main.Details') }} {{ trans('main.In Arabic') }}</label>
                        <textarea class="ckeditor form-control details_ar" id="update_details_ar" placeholder="{{trans('main.Details') }} {{ trans('main.In Arabic') }}" rows="5" name="details_ar">{{ $item->details_ar }}</textarea>
                    </div>
                    <!--details_en-->
                    <div class="form-group">
                        <label>{{ trans('main.Details') }} {{ trans('main.In English') }}</label>
                        <textarea class="ckeditor form-control details_en" id="update_details_en" placeholder="{{trans('main.Details') }} {{ trans('main.In English') }}" rows="5" name="details_en">{{ $item->details_en }}</textarea>
                    </div>
                    
                    <!-- details_ar ->
                    <div class="form-group">
                        <label>{{ trans('main.Details') }} {{ trans('main.In Arabic') }}</label>
                        <textarea id="update_details_ar" type="text" class="form-control details_ar" name="details_ar" placeholder="{{ trans('main.Details') }} {{ trans('main.In Arabic') }}" required></textarea>
                    </div>

                    <!-- details_en ->
                    <div class="form-group">
                        <label>{{ trans('main.Details') }} {{ trans('main.In English') }}</label>
                        <textarea id="update_details_en" type="text" class="form-control details_en" name="details_en" placeholder="{{ trans('main.Details') }} {{ trans('main.In English') }}" required></textarea>
                    </div>

                    <!-- address_ar -->
                    <div class="form-group">
                        <label>{{ trans('main.Address') }} {{ trans('main.In Arabic') }}</label>
                        <input id="update_address_ar" type="text" class="form-control address_ar" name="address_ar" placeholder="{{ trans('main.Address') }} {{ trans('main.In Arabic') }}" required>
                    </div>

                    <!-- address_en -->
                    <div class="form-group">
                        <label>{{ trans('main.Address') }} {{ trans('main.In English') }}</label>
                        <input id="update_address_en" type="text" class="form-control address_en" name="address_en" placeholder="{{ trans('main.Address') }} {{ trans('main.In Arabic') }}" required>
                    </div>
                    
                    <!-- phone -->
                    <div class="form-group">
                        <label>{{ trans('main.phone') }}</label>
                        <input id="update_phone" type="text" class="form-control phone" name="phone" placeholder="{{ trans('main.phone') }}">
                    </div>

                    <!-- mobile -->
                    <div class="form-group">
                        <label>{{ trans('main.mobile') }}</label>
                        <input id="update_mobile" type="text" class="form-control mobile" name="mobile" placeholder="{{ trans('main.mobile') }}">
                    </div>

                    <!-- whatsapp -->
                    <div class="form-group">
                        <label>{{ trans('main.whatsapp') }}</label>
                        <input id="update_whatsapp" type="text" class="form-control whatsapp" name="whatsapp" placeholder="{{ trans('main.whatsapp') }}">
                    </div>

                    <!-- email -->
                    <div class="form-group">
                        <label>{{ trans('main.email') }}</label>
                        <input id="update_email" type="text" class="form-control email" name="email" placeholder="{{ trans('main.email') }}">
                    </div>

                    <!-- facebook_url -->
                    <div class="form-group">
                        <label>{{ trans('main.facebook_url') }}</label>
                        <input id="update_facebook_url" type="text" class="form-control facebook_url" name="facebook_url" placeholder="{{ trans('main.facebook_url') }}">
                    </div>

                    <!-- youtube_url -->
                    <div class="form-group">
                        <label>{{ trans('main.youtube_url') }}</label>
                        <input id="update_youtube_url" type="text" class="form-control youtube_url" name="youtube_url" placeholder="{{ trans('main.youtube_url') }}">
                    </div>

                    <!-- linkedin_url -->
                    <div class="form-group">
                        <label>{{ trans('main.linkedin_url') }}</label>
                        <input id="update_linkedin_url" type="text" class="form-control linkedin_url" name="linkedin_url" placeholder="{{ trans('main.linkedin_url') }}">
                    </div>

                    <!-- twitter_url -->
                    <div class="form-group">
                        <label>{{ trans('main.twitter_url') }}</label>
                        <input id="update_twitter_url" type="text" class="form-control twitter_url" name="twitter_url" placeholder="{{ trans('main.twitter_url') }}">
                    </div>

                    <!-- instagram_url -->
                    <div class="form-group">
                        <label>{{ trans('main.instagram_url') }}</label>
                        <input id="update_instagram_url" type="text" class="form-control instagram_url" name="instagram_url" placeholder="{{ trans('main.instagram_url') }}">
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
