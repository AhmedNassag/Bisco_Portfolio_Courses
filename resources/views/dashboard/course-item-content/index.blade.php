<?php $page="course-item-contents";?>

@extends('layouts.master')

@section('css')
    <!-- Print -->
    <style>
        @media print {
            .notPrint {
                display: none;
            }
        }
        td div 
        {
            width: 120px !important;
            /* left: 0; */
            height: 80px !important;

        }
        td div iframe
        {
            width: 120px !important;
            left: 0;
            height: 80px !important;
            object-fit: cover

        }
        td img{
            width: 120px !important;
            object-fit: cover;
            
            height: 80px !important;
        }
    </style>
    @section('title')
        {{ trans('main.Course Item Contents') }}
    @stop
@endsection



@section('content')
            <!-- validationNotify -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- success Notify -->
            @if (session()->has('success'))
                <script id="successNotify">
                    window.onload = function() {
                        notif({
                            msg: "تمت العملية بنجاح",
                            type: "success"
                        })
                    }
                </script>
            @endif

            <!-- error Notify -->
            @if (session()->has('error'))
                <script id="errorNotify">
                    window.onload = function() {
                        notif({
                            msg: "لقد حدث خطأ.. برجاء المحاولة مرة أخرى!",
                            type: "error"
                        })
                    }
                </script>
            @endif

            <!-- canNotDeleted Notify -->
            @if (session()->has('canNotDeleted'))
                <script id="canNotDeleted">
                    window.onload = function() {
                        notif({
                            msg: "لا يمكن الحذف لوجود بيانات أخرى مرتبطة بها..!",
                            type: "error"
                        })
                    }
                </script>
            @endif


            <!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">{{ trans('main.Course Item Contents') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('main.Dashboard') }}</a></li>
                                    <li class="breadcrumb-item active">{{ trans('main.Course Item Contents') }}</li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn add-button me-2" data-bs-toggle="modal" data-bs-target="#addModal">
                                    <i class="fas fa-plus"></i>
                                </button>
                                <button type="button" class="btn filter-btn me-2" id="filter_search">
                                    <i class="fas fa-filter"></i>
                                </button>
                                <button type="button" class="btn" id="btn_delete_selected" title="{{ trans('main.Delete Selected') }}" style="display:none; width: 42px; height: 42px; justify-content: center; align-items: center; color: #fff; background: red; border: 1px solid red; border-radius: 5px;">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <!-- Search Filter -->
                    <div class="card filter-card" id="filter_inputs" @if($name || $course_item_id || $from_date || $to_date) style="display:block" @endif>
                        <div class="card-body pb-0">
                            <form action="{{ route('course-item-content.index') }}" method="get">
                                <div class="row filter-row">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label>{{ trans('main.Name') }}</label>
                                            <input class="form-control" type="text" name="name" value="{{ $name }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label>{{ trans('main.Course Item') }}</label>
                                            <select class="form-control form-select" name="course_item_id">
                                                <option value="">{{ trans('main.All') }}</option>
                                                @foreach($courseItems as $courseItem)
                                                    <option value="{{ $courseItem->id }}" {{ $course_item_id == $courseItem->id ? 'selected' : '' }}>{{ $courseItem->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label>{{ trans('main.From Date') }}</label>
                                            <input class="form-control" type="date" name="from_date" value="{{ $from_date }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label>{{ trans('main.To Date') }}</label>
                                            <input class="form-control" type="date" name="to_date" value="{{ $to_date }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" type="submit">{{ trans('main.Search') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /Search Filter -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <ul id="edit_error_list"></ul>
                                    <ul id="delete_error_list"></ul>
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-stripped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">{{ trans('main.Name') }}</th>
                                                    <th class="text-center">{{ trans('main.Course Item') }}</th>
                                                    <th class="text-center">{{ trans('main.Sort') }}</th>
                                                    <th class="text-center">{{ trans('main.thumbnail') }}</th>
                                                    <th class="text-center">{{ trans('main.iframe') }}</th>
                                                    <th class="text-center">{{ trans('main.File') }}</th>
                                                    <th class="text-center">{{ trans('main.Actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($data->count() > 0)
                                                    <?php $i = 0; ?>
                                                    @foreach ($data as $item)
                                                        <?php $i++; ?>
                                                        <tr>
                                                            <td class="text-center notPrint">
                                                                <input id="delete_selected_input" type="checkbox" value="{{ $item->id }}" class="box1 mr-1" oninput="showBtnDeleteSelected()">
                                                                {{ $i }}
                                                            </td>
                                                            <td class="text-center">{{ $item->name }}</td>
                                                            <td class="text-center">{{ $item->course_item->name }}</td>
                                                            <td class="text-center">{{ $item->sort }}</td>
                                                            <td class="text-center" ><img style="width: 100%" src="{{ $item->thumbnail }}"   ></td>
                                                            <td class="text-center" style="white-space:wrap !important;">{!! $item->iframe !!}</td>
                                                            <td class="text-center notPrint">
                                                                @if($item->photo)
                                                                    {{-- <div style="position:relative;padding-top:56.25%;width:200px;height:200px">
                                                                        <iframe src="https://iframe.mediadelivery.net/embed/301841/{{ $item->photo }}?autoplay=true&loop=false&muted=false&preload=true&responsive=true" loading="lazy" style="border:0;position:absolute;top:0;height:100%;width:100%;" allow="accelerometer;gyroscope;autoplay;encrypted-media;picture-in-picture;" allowfullscreen="true"></iframe>
                                                                    </div> --}}
                                                                    <span>{{ $item->photo }}</span>
                                                                    <br>
                                                                    <a class="btn btn-outline-success btn-sm" href="{{ route('show_file',['course-item-content',$item->photo]) }}" role="button" target="_blank"><i class="fas fa-eye"></i></a>
                                                                    <a class="btn btn-outline-info btn-sm" href="{{ route('download_file',['course-item-content',$item->photo]) }}" role="button" target="_blank"><i class="fas fa-download"></i></a>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="button" class="editBtn btn btn-sm btn-secondary mr-1" value="{{ $item->id }}"><i class="far fa-edit"></i></button>
                                                                <button type="button" class="deleteBtn btn btn-sm btn-danger" value="{{ $item->id }}"><i class="far fa-trash-alt"></i></button>
                                                            </td>
                                                        </tr>
                                                        @include('dashboard.course-item-content.deleteModal')
                                                        @include('dashboard.course-item-content.deleteSelectedModal')
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <th class="text-center" colspan="10">
                                                            <div class="col mb-3 d-flex">
                                                                <div class="card flex-fill">
                                                                    <div class="card-body p-3 text-center">
                                                                        <p class="card-text f-12">{{ trans('main.No Data Founded') }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        {{ $data->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('dashboard.course-item-content.addModal')
                        @include('dashboard.course-item-content.editModal')
                    </div>
                </div>
            </div>
            <!-- /Page Wrapper -->
        </div>
    </div>
    <!-- /Main Wrapper -->

@endsection



@section('js')
    <script>
        $(document).ready(function () {

            //store
            $(document).on('click', '#storeBtn', function (e) {
                e.preventDefault();
                $(this).text('جارى الحفظ');

                // Create a FormData object to handle the file upload
                var formData = new FormData();
                formData.append('name_ar', $('.name_ar').val());
                formData.append('name_en', $('.name_en').val());
                formData.append('course_item_id', $('.course_item_id').val());
                formData.append('sort', $('.sort').val());
                formData.append('thumbnail', $('.thumbnail').val());
                formData.append('iframe', $('.iframe').val());
                formData.append('photo', $('.photo')[0].files[0]);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "{{ route('course-item-content.store') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function (response) {
                        if (response.status == false) {
                            $('#error_list').html("");
                            $('#error_list').addClass('alert alert-danger');
                            $.each(response.messages, function (key, val) {
                                $('#error_list').append('<li>' + val + '</li>');
                            });
                        } else {
                            $('#error_list').html("");
                            $('#addModal').modal('hide');
                            $('#addModal').find('input').val("");
                            $(this).text('حفظ');
                            location.reload();
                        }
                    },
                    error: function (reject) {},
                });
            });



            //edit
            $(document).on('click', '.editBtn', function (e) {
                e.preventDefault();
                var id = $(this).val();
                $('#edit_error_list').html("");
                $('#editModal').modal('show');
                $.ajax({
                    type: "get",
                    url: "/admin/course-item-content/edit/" + id,
                    success: function (response) {
                        if (response.status == false) {
                            $('#edit_error_list').html("");
                            $('#edit_error_list').addClass('alert alert-danger');
                            $("#edit_error_list").append("<li>" + response.messages + "</li>");
                        } else {
                            $('#update_id').val(response.data.id);
                            $('#update_name_ar').val(response.data.name_ar);
                            $('#update_name_en').val(response.data.name_en);
                            $('#update_course_item_id').val(response.data.course_item_id);
                            $('#update_sort').val(response.data.sort);
                            $('#update_thumbnail').val(response.data.thumbnail);
                            $('#update_iframe').val(response.data.iframe);
                            $('#preview_image').attr('src', '/attachments/course-item-content/' + response.data.photo);
                            $('#preview_image').attr('alt', response.data.photo);
                        }
                    },
                    error: function (reject) {},
                });
            });



            //update
            $(document).on('click', '.updateBtn', function (e) {
                e.preventDefault();
                $(this).text('جارى التعديل');

                // update a FormData object to handle the file upload
                var formData = new FormData();
                formData.append('id', $('#update_id').val());
                formData.append('name_ar', $('#update_name_ar').val());
                formData.append('name_en', $('#update_name_en').val());
                formData.append('course_item_id', $('#update_course_item_id').val());
                formData.append('sort', $('#update_sort').val());
                formData.append('thumbnail', $('#update_thumbnail').val());
                formData.append('iframe', $('#update_iframe').val());
                formData.append('photo', $('#update_photo')[0].files[0]);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "{{ route('course-item-content.update') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function (response) {
                        if (response.status == false) {
                            $('#update_error_list').html("");
                            $('#update_error_list').addClass('alert alert-danger');
                            $.each(response.messages, function (key, val) {
                                $('#update_error_list').append('<li>' + val + '</li>');
                            });
                        } else {
                            $('#update_error_list').html("");
                            $('#editModal').modal('hide');
                            $('#editModal').find('input').val("");
                            $(this).text('تم التعديل');
                            location.reload();
                        }
                    },
                    error: function (reject) {},
                });
            });



            //delete
            $(document).on('click', '.deleteBtn', function (e) {
                e.preventDefault();
                var id = $(this).val();
                console.log('Delete button clicked, id:', id); // Debugging log
                $('#delete_id').val(id);
                $('#delete_error_list').html("");
                $('#deleteModal').modal('show');
            });

            //confirm delete button click event
            $(document).on('click', '.destroyBtn', function (e) {
                e.preventDefault();
                $(this).text('جارى الحذف');
                var id = $('#delete_id').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "delete",
                    url: "/admin/course-item-content/destroy/" + id,
                    success: function (response) {
                        if (response.status == false) {
                            $('#delete_error_list').html("");
                            $('#delete_error_list').addClass('alert alert-danger');
                            $("#delete_error_list").append("<li>" + response.messages + "</li>");
                        } else {
                            $('#delete_error_list').html("");
                            $('#deleteModal').modal('hide');
                            $(this).text('تم الحذف');
                            location.reload();
                        }
                    },
                    error: function (reject) {},
                });
            });
        });
    </script>
@endsection
