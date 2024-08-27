<?php $page="subscriptions";?>

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
        {{ trans('main.Subscriptions') }}
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

            @if(session('error'))
                <script>
                    window.onload = function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: "{{ session('error') }}",
                        });
                    };
                </script>
            @endif

            @if(session('success'))
                <script>
                    window.onload = function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: "{{ session('success') }}",
                        });
                    };
                </script>
            @endif
            

            <!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">{{ trans('main.Subscriptions') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('main.Dashboard') }}</a></li>
                                    <li class="breadcrumb-item active">{{ trans('main.Subscriptions') }}</li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn filter-btn me-2" id="filter_search">
                                    <i class="fas fa-filter"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <!-- Search Filter -->
                    <div class="card filter-card" id="filter_inputs" @if($course_item_id|| $user_id ||$status || $from_date || $to_date) style="display:block" @endif>
                        <div class="card-body pb-0">
                            <form action="{{ route('subscription.index') }}" method="get">
                                <div class="row filter-row">
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
                                            <label>{{ trans('main.User') }}</label>
                                            <select class="form-control form-select" name="user_id">
                                                <option value="">{{ trans('main.All') }}</option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}" {{ $user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label>{{ trans('main.Status') }}</label>
                                            <select class="form-control form-select" name="status">
                                                <option value="">{{ trans('main.All') }}</option>
                                                <option value="0" {{ @$status == 0 ? 'selected' : '' }}>{{ trans('main.Pending') }}</option>
                                                <option value="1" {{ @$status == 1 ? 'selected' : '' }}>{{ trans('main.Approved') }}</option>
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
                                                    <th class="text-center">{{ trans('main.Mobile') }}</th>	
                                                    <th class="text-center">{{ trans('main.Email') }}</th>	
                                                    <th class="text-center">{{ trans('main.Course Item') }}</th>
                                                    <th class="text-center">{{ trans('main.Status') }}</th>	
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
                                                                {{ $i }}
                                                            </td>
                                                            <td class="text-center">{{ $item->user->name }}</td>
                                                            <td class="text-center">{{ $item->user->mobile }}</td>
                                                            <td class="text-center">{{ $item->user->email }}</td>
                                                            <td class="text-center">{{ $item->course_item->name }}</td>
                                                            <td class="text-center">
                                                                <a href="{{ route('subscription.changeStatus',@$item->id) }}">
                                                                    @if (@$item->status == 1)
                                                                        <div class="btn ripple btn-purple-gradient" id='swal-success'>
                                                                            <span class="label text-success text-center">
                                                                                {{ app()->getLocale() == 'ar' ? 'تمت الموافقة' : 'Approved' }}
                                                                            </span>
                                                                        </div>
                                                                    @else
                                                                        <div class="btn ripple btn-purple-gradient" id='swal-success'>
                                                                            <span class="label text-danger text-center">
                                                                                {{ app()->getLocale() == 'ar' ? 'قيد الإنتظار' : 'Pending' }}
                                                                            </span>
                                                                        </div>
                                                                    @endif
                                                                </a>
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="button" class="deleteBtn btn btn-sm btn-danger" value="{{ $item->id }}"><i class="far fa-trash-alt"></i></button>
                                                            </td>
                                                        </tr>
                                                        @include('dashboard.subscription.deleteModal')
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
                    url: "/admin/subscription/destroy/" + id,
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
