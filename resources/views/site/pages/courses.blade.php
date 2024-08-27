@extends('site.layouts.master')
@section('content')
    @if (session('error'))
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
    @if (session('success'))
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



    <div class="modal contact-modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog container mx-auto modal-lg">
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
        <div class="container">
            <div class="padding-tb-120px">
                <h1>{{ trans('main.Our Courses') }}</h1>
                <ol class="breadcrumb">
                    <li><a href="#">{{ trans('main.Home') }}</a></li>
                    <li class="active">{{ trans('main.Our Courses') }}</li>
                </ol>
            </div>
        </div>
    </div>



    <div class="nile-about-section">
        <div class="container">
            <div class="section-title margin-bottom-40px">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="h2">{{ trans('main.Our Courses') }}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($courseItems as $courseItem)
                    <div class="col-lg-6 mt-4 sm-mb-45px ">
                        <div
                            class="background-white course-carrd courseContainer  thum-hover box-shadow hvr-float full-width wow fadeInUp">
                            <div class="float-md-left margin-right-30px thum-xs">
                                <img src="{{ asset('attachments/course-item/' . $courseItem->photo) }}" alt="" class="courseImg">
                            </div>
                            <div class="pt-0 ps-5 ">
                                {{-- <p href="#" class="text-main-color">{{ trans('main.Course Title') }}</p> --}}
                                <h3>
                                    <a href="{{ route('site.courseItem', $courseItem->name) }}" class="d-block text-dark text-capitalize text-medium margin-tb-15px mb-0">
                                        {{ $courseItem->name }}
                                    </a>
                                </h3>
                                <div class="row">
                                    <div class="col-6 ps-0">
                                        <span class="margin-right-0px text-extra-small">
                                            <i class="fa fa-user text-grey-2"></i>
                                            {{ trans('main.By') }} : 
                                            <a href="#">{{ $courseItem->author }}</a>
                                        </span>
                                    </div>
                                    <div class="col-6 ps-0">
                                        <span class="margin-right-0px text-extra-small">
                                            <i class="fa fa-clock-o text-grey-2"></i>
                                            {{ trans('main.Hours Count') }} : 
                                            <a href="#">{{ $courseItem->hours_count }}</a>
                                        </span>
                                    </div>
                                    <div class="col-6 ps-0">
                                        <span class="margin-right-0px text-extra-small">
                                            <i class="fa fa-star-half-o text-grey-2"></i>
                                            {{ trans('main.Rate') }} :
                                            @for ($i = 0; $i < 5; $i++)
                                                @if ($i < $courseItem->rate)
                                                    <i class="fa fa-star" aria-hidden="true" style="color: gold"></i>
                                                @else
                                                    <i class="fa fa-star" aria-hidden="true" style="color: darkgray"></i>
                                                @endif
                                            @endfor
                                        </span>
                                    </div>
                                    <div class="col-6 ps-0">
                                        <span class="margin-right-0px text-extra-small">
                                            <i class="fa fa-file-video-o text-grey-2"></i>
                                            {{ trans('main.Videos Count') }} : <a
                                                href="#">{{ $courseItem->course_item_contents->count() }}</a>
                                        </span>
                                    </div>
                                    {{-- <div class="col-6 ps-0">
                                        <span class="margin-right-0px text-extra-small">
                                            <i class="fa fa-file-video-o text-grey-2"></i>
                                            {{ trans('main.Inside Subscriptions Count') }} : <a
                                                href="#">{{ $courseItem->inside_subscriptions_count }}</a>
                                        </span>
                                    </div>
                                    <div class="col-6 ps-0">
                                        <span class="margin-right-0px text-extra-small">
                                            <i class="fa fa-file-video-o text-grey-2"></i>
                                            {{ trans('main.Outside Subscriptions Count') }} : <a
                                                href="#">{{ $courseItem->outside_subscriptions_count }}</a>
                                        </span>
                                    </div> --}}
                                    @auth
                                        @if (auth()->user()->isSubscribedToCourse($courseItem))
                                            <div class="col-3" style="position: absolute; bottom: 0; right: 0; padding: 0;">
                                                <a class="btn btn-primary btn-block btn-sm" href="{{ route('site.courseItem', $courseItem->name) }} ">
                                                    <i class="fa fa-eye text-grey-2"></i>
                                                    {{ trans('main.Show') }}
                                                </a>
                                            </div>
                                        @elseif(auth()->user()->pendingSubscribedToCourse($courseItem))
                                            <div class="col-12">
                                                <a class="btn btn-success btn-block btn-sm" href="">
                                                    {{ trans('main.Pending Approved') }}
                                                </a>
                                            </div>
                                        @else
                                            <div class="col-3" style="position: absolute; bottom: 0; right: 0; padding: 0;">
                                                <a class="btn btn-danger btn-block btn-sm" style="color: #fff" onclick="event.preventDefault(); document.getElementById('subscription-form-{{ $courseItem->id }}').submit();">
                                                    <i class="fa fa-bell text-grey-2"></i>
                                                    {{ trans('main.Subscribe') }}
                                                </a>
                                                <form id="subscription-form-{{ $courseItem->id }}" action="{{ route('subscription.store') }}" method="POST" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" name="course_item_id" value="{{ $courseItem->id }}">
                                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                </form>
                                            </div>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
