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

                    <!-- course_item_id -->
                    <div class="form-group">
                        <label>{{ trans('main.Course Item') }}</label>
                        <select class="form-control form-select course_item_id" name="course_item_id" required>
                            @foreach($courseItems as $courseItem)
                                <option value="{{ $courseItem->id }}" {{ old('course_item_id') == $courseItem->id ? 'selected' : '' }}>{{ $courseItem->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- sort -->
                    <div class="form-group">
                        <label>{{ trans('main.Sort') }}</label>
                        <input type="number" class="form-control sort" name="sort" value="{{ old('sort') }}" placeholder="{{ trans('main.Sort') }}" required>
                    </div>

                    <!-- thumbnail -->
                    <div class="form-group">
                        <label>{{ trans('main.thumbnail') }}</label>
                        <input type="text" class="form-control thumbnail" name="thumbnail" value="{{ old('thumbnail') }}" placeholder="{{ trans('main.thumbnail') }}" required>
                    </div>

                    <!-- iframe -->
                    <div class="form-group">
                        <label>{{ trans('main.iframe') }}</label>
                        <input type="text" class="form-control iframe" name="iframe" value="{{ old('iframe') }}" placeholder="{{ trans('main.iframe') }}" required>
                    </div>
                    
                    <!-- photo -->
                    <div class="form-group">
                        <label>{{ trans('main.File') }}</label>
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