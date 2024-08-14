@extends('site.layouts.master')
@section('content')
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
            <h1>{{ trans('main.Our Projects') }}</h1>
            <ol class="breadcrumb">
                <li><a href="#">{{ trans('main.Home') }}</a></li>
                <li class="active">{{ trans('main.Our Projects') }}</li>
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
                    <div class="h2">{{ trans('main.Our Projects') }}</div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($projectItems as $projectItem)
            <div class="col-lg-4 col-md-6 sm-mb-35px my-lg-5 my-3">
                <div class="blog-item">
                    <div class="img">
                        <a href="{{ route('site.projectItem', $projectItem->name) }}"><img src="{{ asset('attachments/project-item/'.$projectItem->photo) }}" alt=""></a>
                        <a href="#" class="date">
                            <span class="day">{{ $projectItem->created_at->format('d') }}</span>
                            <span class="month">{{ $projectItem->created_at->format('M') }}</span>
                        </a>
                    </div>
                    <a href="{{ route('site.projectItem', $projectItem->name) }}" class="title">
                        {{ $projectItem->name }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection