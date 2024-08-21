@extends('site.layouts.master')
@section('content')



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



<!-- Soon pop-up  -->
<div class="modal contact-modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content margin-top-150px ">
            <div class=" no-gutters">
                <div class="container mx-auto text-center">
                    <div class="padding-30px">
                        <img src="{{ asset('assets_front/assets/img/hello.jpg') }}" alt="">
                        <h3 class="padding-bottom-15px text-main-color mt-4">{{ trans('main.Coming Soon') }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="page-title pt-5">
    <div class="container ">
        <div class="padding-tb-120px">
            <h1>{{ trans('main.Course Items') }}</h1>
            <ol class="breadcrumb">
                <li><a href="#">{{ trans('main.Home') }}</a></li>
                <li class="active">{{ trans('main.Course Item Content') }}</li>
            </ol>
        </div>
    </div>
</div>



<div class="section padding-tb-100px section-ba-3">
    <div class="container">
        <div class="section-title margin-bottom-40px">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="icon text-main-color"></div>
                    <div class="h2">{{ trans('main.Course Item Content') }}</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 sm-mb-35px my-lg-5 my-3">
                <div class="blog-item">
                    <div class="img">
                        <video controls width="420" height="420">
                            <source class="mb-1" src="{{ asset('attachments/course-item-content/'.$courseItemContent->photo) }}" alt="{{ $courseItemContent->photo }}">
                        </video>
                        {{-- <a href="#" class="date">
                            <span class="day">{{ $courseItemContent->created_at->format('d') }}</span>
                            <span class="month">{{ $courseItemContent->created_at->format('M') }}</span>
                        </a> --}}
                    </div>
                    {{-- <a href="#" class="title">
                        {{ $courseItemContent->name }}
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection