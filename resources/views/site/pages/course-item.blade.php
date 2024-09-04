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
            @foreach($courseItems as $courseItem)
                <div class="col-lg-4 col-md-6 sm-mb-35px my-lg-5 my-3">
                    <div class="blog-item">
                        <div class="blog-item img" >
                            <a class="blog-item img"  href="{{ route('site.courseItemContent', $courseItem->name) }}" target="_blank">
                                {{-- <video style="height:200px; object-fit:cover" class="blog-item img">
                                    <source class="mb-1" src="https://vz-1847437a-0c1.b-cdn.net/f8cc1a6a-7092-4316-9d16-0df72e25a7d7/playlist.m3u8" alt="{{ $courseItem->photo }}">
                                </video> --}}
                                {{-- <div style="position:relative;padding-top:56.25%;width:200px;height:200px">
                                    <iframe src="https://iframe.mediadelivery.net/embed/301841/{{ $courseItem->photo }}?autoplay=false&loop=false&muted=false&preload=true&responsive=true" loading="lazy" style="border:0;position:absolute;top:0;height:100%;width:100%;" allow="accelerometer;gyroscope;autoplay;encrypted-media;picture-in-picture;" allowfullscreen="true"></iframe>
                                </div> --}}
                                <img src="{{ $courseItem->thumbnail }}">
                            </a>
                            {{-- <a href="#" class="date">
                                <span class="day">{{ $courseItem->created_at->format('d') }}</span>
                                <span class="month">{{ $courseItem->created_at->format('M') }}</span>
                            </a> --}}
                        </div>
                        <a href="{{ route('site.courseItemContent', $courseItem->name) }}" class="title">
                            {{ $courseItem->name }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
