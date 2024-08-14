<!-- Start Modal -->
<div class="modal fade custom-modal" id="editModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">{{ trans('main.Edit') }}</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <div class="modal-body">
                <!-- <form action="{{ route('course-item-content.update', 'test') }}" method="post" enctype="multipart/form-data">
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

                    <!-- course_item_id -->
                    <div class="form-group">
                        <label>{{ trans('main.Course Item') }}</label>
                        <select id="update_course_item_id" class="form-control form-select course_item_id" name="course_item_id" required>
                            @foreach($courseItems as $courseItem)
                                <option value="{{ $courseItem->id }}" {{ old('course_item_id') == $courseItem->id ? 'selected' : '' }}>{{ $courseItem->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- sort -->
                    <div class="form-group">
                        <label>{{ trans('main.Sort') }}</label>
                        <input id="update_sort" type="number" class="form-control sort" name="sort" placeholder="{{ trans('main.Sort') }}" required>
                    </div>
                    
                    <!-- photo -->
                    <div class="form-group">
                    <label>{{ trans('main.Video') }} :</label>
                    <input id="update_photo" class="form-control photo" type="file" name="photo" data-height="70"/>
                    <div class="row">
                        <div class="col-12">
                            <video width="200" height="200" controls>
                                <source id="preview_image" class="m-1" src="" alt="">
                            </video>
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
