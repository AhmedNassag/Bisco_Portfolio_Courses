<?php $page="company-informations";?>

@extends('layouts.master')

@section('css')
    <!-- Print -->
    <style>
        @media print {
            .notPrint {
                display: none;
            }
        }
    </style>
    @section('title')
        {{ trans('main.Company Informations') }}
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
                                <h3 class="page-title">{{ trans('main.Company Informations') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('main.Dashboard') }}</a></li>
                                    <li class="breadcrumb-item active">{{ trans('main.Company Informations') }}</li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                @if($data->count() == 0)
                                <button type="button" class="btn add-button me-2" data-bs-toggle="modal" data-bs-target="#addModal">
                                    <i class="fas fa-plus"></i>
                                </button>
                                @endif
                                <button type="button" class="btn filter-btn me-2" id="filter_search">
                                    <i class="fas fa-filter"></i>
                                </button>
                                <!-- <button type="button" class="btn" id="btn_delete_selected" title="{{ trans('main.Delete Selected') }}" style="display:none; width: 42px; height: 42px; justify-content: center; align-items: center; color: #fff; background: red; border: 1px solid red; border-radius: 5px;">
                                    <i class="fas fa-trash-alt"></i>
                                </button> -->
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <!-- Search Filter -->
                    <div class="card filter-card" id="filter_inputs" @if($name || $from_date || $to_date) style="display:block" @endif>
                        <div class="card-body pb-0">
                            <form action="{{ route('company-information.index') }}" method="get">
                                <div class="row filter-row">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label>{{ trans('main.Name') }}</label>
                                            <input class="form-control" type="text" name="name" value="{{ $name }}">
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
                                                    <th class="text-center">{{ trans('main.Address') }}</th>
                                                    <th class="text-center">{{ trans('main.phone') }}</th>
                                                    <th class="text-center">{{ trans('main.mobile') }}</th>
                                                    <th class="text-center">{{ trans('main.whatsapp') }}</th>
                                                    <th class="text-center">{{ trans('main.email') }}</th>
                                                    <th class="text-center">{{ trans('main.Photo') }}</th>	
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
                                                                <!-- <input id="delete_selected_input" type="checkbox" value="{{ $item->id }}" class="box1 mr-1" oninput="showBtnDeleteSelected()"> -->
                                                                {{ $i }}
                                                            </td>
                                                            <td class="text-center">{{ $item->name }}</td>
                                                            <td class="text-center">{{ $item->address }}</td>
                                                            <td class="text-center">{{ $item->phone }}</td>
                                                            <td class="text-center">{{ $item->mobile }}</td>
                                                            <td class="text-center">{{ $item->whatsapp }}</td>
                                                            <td class="text-center">{{ $item->email }}</td>
                                                            <td class="text-center notPrint">
                                                                @if($item->photo)
                                                                    <img class="mb-1" src="{{ asset('attachments/company-information/'.$item->photo) }}" alt="{{ $item->photo }}" height="50" width="70">
                                                                    <br>
                                                                    <a class="btn btn-outline-success btn-sm" href="{{ route('show_file',['company-information',$item->photo]) }}" role="button" target="_blank"><i class="fas fa-eye"></i></a>
                                                                    <a class="btn btn-outline-info btn-sm" href="{{ route('download_file',['company-information',$item->photo]) }}" role="button" target="_blank"><i class="fas fa-download"></i></a>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="button" class="editBtn btn btn-sm btn-secondary mr-1" value="{{ $item->id }}"><i class="far fa-edit"></i></button>
                                                                <!-- <button type="button" class="deleteBtn btn btn-sm btn-danger" value="{{ $item->id }}"><i class="far fa-trash-alt"></i></button> -->
                                                            </td>
                                                        </tr>
                                                        @include('dashboard.company-information.deleteModal')
                                                        @include('dashboard.company-information.deleteSelectedModal')
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
                        @include('dashboard.company-information.addModal')
                        @include('dashboard.company-information.editModal')		
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
            /**/
            // Initialize CKEditor for the textarea elements
            let editors = {};
            ClassicEditor.create(document.querySelector('#update_details_ar'))
                .then(editor => {
                    editors['update_details_ar'] = editor;
                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor.create(document.querySelector('#update_details_en'))
                .then(editor => {
                    editors['update_details_en'] = editor;
                })
                .catch(error => {
                    console.error(error);
                });
            /**/

            //store
            $(document).on('click', '#storeBtn', function (e) {
                e.preventDefault();
                $(this).text('جارى الحفظ');

                // Create a FormData object to handle the file upload
                var formData = new FormData();
                formData.append('name_ar', $('.name_ar').val());
                formData.append('name_en', $('.name_en').val());
                formData.append('details_ar', $('.details_ar').val());
                formData.append('details_en', $('.details_en').val());
                formData.append('address_ar', $('.address_ar').val());
                formData.append('address_en', $('.address_en').val());
                formData.append('phone', $('.phone').val());
                formData.append('mobile', $('.mobile').val());
                formData.append('whatsapp', $('.whatsapp').val());
                formData.append('email', $('.email').val());
                formData.append('facebook_url', $('.facebook_url').val());
                formData.append('youtube_url', $('.youtube_url').val());
                formData.append('linkedin_url', $('.linkedin_url').val());
                formData.append('twitter_url', $('.twitter_url').val());
                formData.append('instagram_url', $('.instagram_url').val());
                formData.append('photo', $('.photo')[0].files[0]);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "{{ route('company-information.store') }}",
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
                    url: "/admin/company-information/edit/" + id,
                    success: function (response) {
                        if (response.status == false) {
                            $('#edit_error_list').html("");
                            $('#edit_error_list').addClass('alert alert-danger');
                            $("#edit_error_list").append("<li>" + response.messages + "</li>");
                        } else {
                            $('#update_id').val(response.data.id);
                            $('#update_name_ar').val(response.data.name_ar);
                            $('#update_name_en').val(response.data.name_en);
                            $('#update_details_ar').val(response.data.details_ar);
                            $('#update_details_en').val(response.data.details_en);
                            $('#update_address_ar').val(response.data.address_ar);
                            $('#update_address_en').val(response.data.address_en);
                            $('#update_phone').val(response.data.phone);
                            $('#update_mobile').val(response.data.mobile);
                            $('#update_whatsapp').val(response.data.whatsapp);
                            $('#update_email').val(response.data.email);
                            $('#update_facebook_url').val(response.data.facebook_url);
                            $('#update_youtube_url').val(response.data.youtube_url);
                            $('#update_linkedin_url').val(response.data.linkedin_url);
                            $('#update_twitter_url').val(response.data.twitter_url);
                            $('#update_instagram_url').val(response.data.instagram_url);
                            $('#preview_image').attr('src', '/attachments/company-information/' + response.data.photo);
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
                /**/
                // Manually update the textarea value with the CKEditor content
                for (let key in editors) {
                    if (editors.hasOwnProperty(key)) {
                        editors[key].updateSourceElement();
                    }
                }
                /**/
                
                // update a FormData object to handle the file upload
                var formData = new FormData();
                formData.append('id', $('#update_id').val());
                formData.append('name_ar', $('#update_name_ar').val());
                formData.append('name_en', $('#update_name_en').val());
                formData.append('details_ar', $('#update_details_ar').val());
                formData.append('details_en', $('#update_details_en').val());
                formData.append('address_ar', $('#update_address_ar').val());
                formData.append('address_en', $('#update_address_en').val());
                formData.append('phone', $('#update_phone').val());
                formData.append('mobile', $('#update_mobile').val());
                formData.append('whatsapp', $('#update_whatsapp').val());
                formData.append('email', $('#update_email').val());
                formData.append('facebook_url', $('#update_facebook_url').val());
                formData.append('youtube_url', $('#update_youtube_url').val());
                formData.append('linkedin_url', $('#update_linkedin_url').val());
                formData.append('twitter_url', $('#update_twitter_url').val());
                formData.append('instagram_url', $('#update_instagram_url').val());
                formData.append('photo', $('#update_photo')[0].files[0]);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "{{ route('company-information.update') }}",
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
                    url: "/admin/company-information/destroy/" + id,
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
