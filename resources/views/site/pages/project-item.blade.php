@extends('site.layouts.master')
@section('content')
<div class="page-title pt-5">
    <div class="container">
        <div class="padding-tb-120px">
            <h1>{{ trans('main.Our Projects') }}</h1>
            <ol class="breadcrumb">
                <li><a href="#">{{ trans('main.Home') }}</a></li>
                <li class="active">{{ trans('main.Our Projects') }}</li>
            </ol>
        </div>
    </div>
</div>



<div class="padding-tb-100px">
    <div class="container-xxl">
        <div class="">
            <div class="">
                <div class="post-standard">
                    <div class="meta-out margin-bottom-20px">
                        <ul class="meta">
                            <li>
                                <span class="icon icon_clock_alt"></span>
                                {{ $projectItem->created_at->format('M-d-Y') }}
                            </li>
                        </ul>
                    </div>
                    <div class="thum-img">
                        <a href="#">
                            <img src="{{ asset('attachments/project-item/'.$projectItem->photo) }}" class="projectDetails" alt="" style=" height: 500px;object-fit: cover;">
                        </a>
                    </div>
                    <a href="#" class="title">{{ $projectItem->name }}</a>
                    <div class="entry-content my-3">
                        <p>
                            {!! $projectItem->details !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection