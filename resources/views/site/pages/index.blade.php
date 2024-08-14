<!DOCTYPE html>
<html lang="en-US">


<!-- home-100:13-->

<head>
    @if (App::getLocale() == 'ar')
    <title>BIOHEALUX</title>
    <meta name="author" content="BIOHEALUX">
    <meta name="robots" content="index follow">
    <meta name="googlebot" content="index follow">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="keywords" content="BIOHEALUX">
    <meta name="description" content="BIOHEALUX">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800%7CMontserrat:300i,300,400,500,600,700,400i,500%7CDancing+Script:700%7CDancing+Script:700%7CGreat+Vibes:400%7CMontserrat:400%7CDosis:800%7CRaleway:400,700,800&amp;subset=latin-ext"
        rel="stylesheet">
    <!-- animate -->
    <link rel="stylesheet" href="{{ asset('assets_front/assets/css/animate.css') }}" />
    <link rel="icon" href="{{ asset('assets_front/assets/img/logo.png') }}" type="image/png">

    <!-- owl Carousel assets -->
    <link href="{{ asset('assets_front/assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_front/assets/css/owl.theme.css') }}" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets_front/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_front/assets/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_front/assets/css/bootstrap.rtl.css') }}">
    <link href="{{ asset('assets_front/assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_front/assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <!-- hover anmation -->
    <link rel="stylesheet" href="{{ asset('assets_front/assets/css/hover-min.css') }}">
    <!-- flag icon -->
    <link rel="stylesheet" href="{{ asset('assets_front/assets/css/flag-icon.min.css') }}">
    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('assets_front/assets/css/styleRTL.css') }}">
    <!-- elegant icon -->
    <link rel="stylesheet" href="{{ asset('assets_front/assets/css/elegant_icon.css') }}">
    <!-- fontawesome  -->
    <link rel="stylesheet" href="{{ asset('assets_front/assets/fonts/font-awesome/css/font-awesome.min.css') }}">
    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_front/assets/rslider/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_front/assets/rslider/fonts/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_front/assets/rslider/css/settings.css') }}">
    <!-- Include SweetAlert CSS -->
<!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    @else

    <title>BIOHEALUX</title>
    <meta name="author" content="BIOHEALUX">
    <meta name="robots" content="index follow">
    <meta name="googlebot" content="index follow">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="keywords" content="BIOHEALUX">
    <meta name="description" content="BIOHEALUX">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800%7CMontserrat:300i,300,400,500,600,700,400i,500%7CDancing+Script:700%7CDancing+Script:700%7CGreat+Vibes:400%7CMontserrat:400%7CDosis:800%7CRaleway:400,700,800&amp;subset=latin-ext"
        rel="stylesheet">
    <!-- animate -->
    <link rel="stylesheet" href="{{ asset('assets_front/assets/css/animate.css') }}" />
    <link rel="icon" href="{{ asset('assets_front/assets/img/logo.png') }}" type="image/png">

    <!-- owl Carousel assets -->
    <link href="{{ asset('assets_front/assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_front/assets/css/owl.theme.css') }}" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets_front/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_front/assets/css/bootstrap.min copy.css') }}">
    <link href="{{ asset('assets_front/assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_front/assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <!-- hover anmation -->
    <link rel="stylesheet" href="{{ asset('assets_front/assets/css/hover-min.css') }}">
    <!-- flag icon -->
    <link rel="stylesheet" href="{{ asset('assets_front/assets/css/flag-icon.min.css') }}">
    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('assets_front/assets/css/style.css') }}">
    <!-- elegant icon -->
    <link rel="stylesheet" href="{{ asset('assets_front/assets/css/elegant_icon.css') }}">
    <!-- fontawesome  -->
    <link rel="stylesheet" href="{{ asset('assets_front/assets/fonts/font-awesome/css/font-awesome.min.css') }}">
    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_front/assets/rslider/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_front/assets/rslider/fonts/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_front/assets/rslider/css/settings.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    @endif
</head>

<body>
    <!--&-------------------- Header -->
    <header>
        <div id="fixed-header-dark" class="header-output fixed-header">
            <div class="header-output">
                <div class="container-xxl header-in">

                    <!-- Up Head -->
                    <div class="up-head d-none d-lg-block">
                        <div class="row">
                            <div class="col-xl-8 col-lg-12">
                                <div class="row">
                                    @if($companyInformation->phone)
                                    <div class="col-md-4">
                                        <i class="fa fa-phone margin-right-10px"></i> 
                                        {{ $companyInformation->phone }}    
                                    </div>
                                    @endif
                                    @if($companyInformation->email)
                                    <div class="col-md-4">
                                        <i class="fa fa-envelope-o margin-right-10px"></i>
                                        {{ $companyInformation->email }}
                                    </div>
                                    @endif
                                    @if($companyInformation->address)
                                    <div class="col-md-4"><i class="fa fa-map-marker margin-right-10px"></i> 1105
                                        {{ $companyInformation->address }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-4 d-none d-xl-block">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!-- lang dropdown -->
                                        <div class="dropdown show">
                                            @if (App::getLocale() == 'ar')
                                            <a class="dropdown-toggle text-white text-uppercase" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="flag-icon flag-icon-mr margin-right-8px"></span> 
                                                {{ trans('main.Arabic') }}
                                            </a>
                                            <div class="dropdown-menu text-small text-uppercase" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{ route('lang.en') }}">
                                                    <span class="flag-icon flag-icon-us margin-right-8px"></span>
                                                    {{ trans('main.English') }}
                                                </a>
                                            </div>
                                            @else
                                            <a class="dropdown-toggle text-white text-uppercase" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="flag-icon flag-icon-us margin-right-8px"></span> 
                                                {{ trans('main.English') }}
                                            </a>
                                            <div class="dropdown-menu text-small text-uppercase" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{ route('lang.ar') }}">
                                                    <span class="flag-icon flag-icon-mr margin-right-8px"></span>
                                                    {{ trans('main.Arabic') }}
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                        <!-- // lang dropdown -->
                                    </div>

                                    <div class="col-lg-6">
                                        <!--  Social -->
                                        <ul class="social-media list-inline text-right margin-0px text-white">
                                            @if($companyInformation->facebook_url)
                                            <li class="list-inline-item">
                                                <a class="facebook" href="{{$companyInformation->facebook_url}}">
                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            @endif
                                            @if($companyInformation->youtube_url)
                                            <li class="list-inline-item">
                                                <a class="youtube" href="{{$companyInformation->youtube_url}}">
                                                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            @endif
                                            @if($companyInformation->linkedin_url)
                                            <li class="list-inline-item">
                                                <a class="linkedin" href="{{$companyInformation->linkedin_url}}">
                                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            @endif
                                            @if($companyInformation->whatsapp)
                                            <li class="list-inline-item">
                                                <a class="whatsapp" href="https://wa.me/+2{{ $companyInformation->whatsapp }}" target="_blank">
                                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            @endif
                                            @if($companyInformation->twitter_url)
                                            <li class="list-inline-item">
                                                <a class="twitter" href="{{$companyInformation->twitter_url}}">
                                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            @endif
                                            @if($companyInformation->instagram_url)
                                            <li class="list-inline-item">
                                                <a class="instagram" href="{{$companyInformation->instagram_url}}">
                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            @endif
                                        </ul>
                                        <!-- // Social -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // Up Head -->

                    <div class="position-relative">
                        <div class="row">
                            <div class="col-lg-3 col-md-12">
                                @if($companyInformation->photo)
                                <img src="{{ asset('attachments/company-information/'.$companyInformation->photo) }}" class="navLogo" alt="">
                                @else
                                <img src="{{ asset('assets_front/assets/img/logo.png') }}" class="navLogo" alt="">
                                @endif    
                                <a class="mobile-toggle padding-15px background-second-color border-radius-3" href="#">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </div>
                            <div class="col-lg-7 col-md-12 position-inherit text-lg-center">
                                <ul id="menu-main" class="nav-menu float-xl-left text-lg-center link-padding-tb-25px white-link dropdown-dark">
                                    <li class=""><a href="{{ route('site.index') }}">{{ trans('main.Home') }}</a></li>
                                    <li class=""><a href="{{ route('site.index') }}#about">{{ trans('main.About') }}</a></li>
                                    <li class=""><a href="{{ route('site.index') }}#services">{{ trans('main.Our Services') }}</a></li>
                                    <li class=""><a href="{{ route('site.projects') }}">{{ trans('main.Our Projects') }}</a></li>
                                    <li class=""><a href="{{ route('site.courses') }}">{{ trans('main.Courses') }}</a>
                                    <li class=""><a href="{{ route('site.contactUs') }}">{{ trans('main.Contact Us') }}</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-md-12  d-none d-lg-block">
                                <a href="tel:{{ $companyInformation->mobile }}" class="btn btn-sm border-radius-30 margin-tb-20px text-white background-main-color box-shadow float-right padding-lr-20px margin-left-30px d-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                    </svg> 
                                    {{ trans('main.Get A Call') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--&//-------------- Header -->

    <!--~============= //Slider=============-->
    <div id="rev_slider_3_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="nile-logistics-1"
        data-source="gallery"
        style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
        <!-- START REVOLUTION SLIDER 5.4.8 fullwidth mode -->
        <div id="rev_slider_3_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.8">
            <ul>
                <!-- SLIDE  -->
                @if($sliders->count() > 0)
                    @foreach($sliders as $index=>$slider)
                    <li data-index="rs-{{$index+1}}" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                        data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2=""
                        data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                        data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{ asset('attachments/slider/'.$slider->photo) }}" alt="" data-bgposition="center center"
                            data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption text-center  tp-resizeme" id="slide-{{$index+1}}-layer-1"
                            data-x="['middle','middle','middle','center']" data-hoffset="['0','41','45','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['-10','-143','-186','-36']"
                            data-width="461" data-height="173" data-whitespace="nowrap" data-type="text"
                            data-responsive_offset="on"
                            data-frames='[{"delay":10,"speed":1140,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','center']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 5; min-width: 461px; max-width: 461px; max-width: 173px;line-height: 13px; max-width: 173px; white-space: nowrap; font-size: 50px;  font-weight: 700; color: #ffffff; letter-spacing: 0.7px;font-family:Montserrat;">
                            <h1 style="font-size: 60px;  font-weight: 500; color: #ffffff; letter-spacing: 0.7px;font-family:Montserrat;">
                                {{ $slider->name }}
                            </h1>
                            <br>
                             <div style="text-align: center; overflow:inherit; text-wrap:wrap; ">
                                   <span class="pt-1" style="line-height: 37px;font-weight: 300;">
                                {{ $slider->details }}
                            </span>
                             </div>
                          
                        </div>
                    </li>
                    @endforeach
                @endif
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div>
    <!--//============= //Slider=============-->

    <!--^============= //Slider Footers=============-->
    <div class="service-section-1 container">
        <div class="row">
            @if($sliderFooters->count() > 0)
                @foreach($sliderFooters as $sliderFooter)
                <div class="col-md-4">
                    <div class="service layout-1">
                        <div class="clearfix d-flex flex-column">
                            <div class="icon"><img class="sliderIcon" src="{{ asset('attachments/slider-footer/'.$sliderFooter->photo) }}" alt=""></div>
                            <a href="#" class="title">{{ $sliderFooter->name }}</a>
                        </div>
                        <div class="dis clearfix">
                            {{ $sliderFooter->details }}
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
    <!--//======== //Slider Footers=============-->


    <!--!============= Who We Are =============-->
    <div class="nile-about-section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    @if($whoWeAreDetail)
                    <div class="section-title-right text-main-color clearfix">
                        <div class="icon"><img src="{{ asset('assets_front/assets/icons/title-icon-1.png') }}" alt=""></div>
                        <h2 class="title-text">{{ trans('main.Who We Are ?') }}</h2>
                    </div>
                    <div class="about-text margin-tb-25px">
                        {{ $whoWeAreDetail->details }}
                    </div>
                    @endif
                    @if($whoWeAreFaqs->count() > 0)
                    <div id="accordion" class="nile-accordion margin-top-80px sm-mb-45px">
                        @foreach($whoWeAreFaqs as $whoWeAreFaq)
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-block btn-link active" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fa fa-info-circle"></i> 
                                        {{ $whoWeAreFaq->name }}
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    {{ $whoWeAreFaq->details }} 
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    @if($whoWeAreSides->count() > 0)
                    <div class="row">
                        @foreach($whoWeAreSides as $whoWeAreSide)
                        <div class="col-sm-6">
                            <a href="#">
                                <img src="{{ asset('attachments/who-we-are-side/'.$whoWeAreSide->photo) }}" alt="">
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <div class="cart-service background-main-color">
                                <h2>{{ $whoWeAreSide->name }}</h2>
                                <hr>
                                <div class="text">
                                    {{ $whoWeAreSide->details }} 
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!--//===== //Who We Are =============-->

    <!--*============= //Services=============-->
    <div class="section padding-tb-100px section-ba-1" id="services">
        <div class="container">
            <!-- Title -->
            <div class="section-title margin-bottom-40px">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        @if($serviceDetail)
                        <div class="icon text-main-color"><i class="fa fa-gear"></i></div>
                        <div class="h2">{{ trans('main.Our Service') }}</div>
                        <div class="des">
                            {{ $serviceDetail->details }} 
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- // End Title -->

            <div class="row">
                @if($serviceItems->count() > 0)
                    @foreach($serviceItems as $serviceItem)
                    <div class="col-lg-4 col-md-6">
                        <div class="service-icon-box">
                            <div class="icon">
                                <img class="sliderIcon" src="{{ asset('attachments/service-item/'.$serviceItem->photo) }}" alt="">
                            </div>
                            <a href="#" class="title h2">{{ $serviceItem->name }}</a>
                            <div class="des">
                                {{ $serviceItem->details }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!--//--============= //Services=============-->


    <!--&============= //Projects=============-->
    <div class="section padding-tb-100px section-ba-3" id="portfolio">
        <div class="container">
            <!-- Title -->
            <div class="section-title margin-bottom-40px">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        @if($projectDetail)
                        <div class="icon text-main-color"><i class="fa fa-bookmark-o"></i></div>
                        <div class="h2">{{ trans('main.Our Projects') }}</div>
                        <div class="des">
                            {{ $projectDetail->details }} 
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- // End Title -->

            <div class="row">
                @if($projectItems->count() > 0)
                    @foreach($projectItems as $projectItem)
                    <div class="col-lg-4 col-md-6 sm-mb-35px">
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
                @endif
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('site.projects') }}" class="nile-bottom md">
                {{ trans('main.Show More') }} 
                <i class="fa fa-arrow-right"></i> 
            </a>
        </div>
    </div>
    <!--//===== //Projects=============-->

    <!-- Partener Start -->
    @if($parteners->count() > 0)
    <div class="logoes container-fluid py-5 wow fadeInUp" id="sponsers" data-wow-delay="0.1s">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">{{ trans('main.Our Parteners') }}</h5>
        </div>
        <div class="container-fluid py-5 mb-5">
            <div class="bg-transparent">
                <div class="owl-carousel vendor-carousel">
                    @foreach($parteners as $partener)
                    <a href="{{ @$partener->url }}" target="_blank">
                        <img src="{{ asset('attachments/partener/'.$partener->photo) }}" alt="">
                        <p>{{ $partener->name }}</p>
                    </a>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- Vendor End -->

    <!--~-------------------- Get A Quote  -->
    <div class="padding-tb-100px" id="contact">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 sm-mb-45px">
                    @if($companyInformation->details)
                    <p> 
                        {!! $companyInformation->details !!}
                    </p>
                    @endif
                    @if($companyInformation->phone)
                    <h5>{{ trans('main.Phone') }} :</h5>
                    <span class="d-block">
                        <i class="fa fa-phone text-main-color margin-right-10px" aria-hidden="true"></i>
                        {{ $companyInformation->phone }}
                    </span>
                    @endif
                    @if($companyInformation->mobile)
                    <span class="d-block sm-mb-30px">
                        <i class="fa fa-mobile text-main-color margin-right-10px" aria-hidden="true"></i> 
                        {{ $companyInformation->mobile }}
                    </span>
                    @endif
                    @if($companyInformation->address)
                    <h5 class="margin-top-20px">{{ trans('main.Address') }} :</h5>
                    <span class="d-block sm-mb-30px"><i class="fa fa-map text-main-color margin-right-10px" aria-hidden="true"></i> 
                        {{ $companyInformation->address }} 
                    </span>
                    @endif
                    @if($companyInformation->email)
                    <h5 class="margin-top-20px">{{ trans('main.Email') }} :</h5>
                    <span class="d-block sm-mb-30px"><i class="fa fa-envelope-open text-main-color margin-right-10px" aria-hidden="true"></i> 
                        {{ $companyInformation->email }} 
                    </span>
                    @endif
                </div>

                <div class="col-lg-6">
                    <div class="contact-modal">
                        <div class="background-main-color">
                            <div class="padding-30px">
                                <h3 class="padding-bottom-15px">{{ trans('main.Contact Us') }}</h3>
                                <!-- start contact form -->
                                <form id="contactForm" action="{{ route('site.send-message') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>{{ trans('main.Name') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ trans('main.Name') }}" name="name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>{{ trans('main.Phone') }}</label>
                                            <input type="tel" class="form-control" placeholder="{{ trans('main.Phone') }}" name="phone" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>{{ trans('main.Email') }}</label>
                                            <input type="email" class="form-control" placeholder="{{ trans('main.Email') }}" name="email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>{{ trans('main.Message') }}</label>
                                        <textarea class="form-control" rows="3" name="message" required></textarea>
                                    </div>
                                    <button type="submit" class="btn-sm btn-lg btn-block background-dark text-white text-center text-uppercase rounded-0 padding-15px">
                                        {{ trans('main.SEND MESSAGE') }}
                                    </button>
                                </form>
                                                                
                                <script>
                                    document.getElementById('contactForm').addEventListener('submit', function(event) {
                                        event.preventDefault(); // Prevent the form from submitting the traditional way

                                        let formData = new FormData(this);
                                        
                                        fetch('{{ route('site.send-message') }}', {
                                            method: 'POST',
                                            headers: {
                                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                            },
                                            body: formData
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.status) {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: '{{ trans('main.Success') }}',
                                                    text: '{{ trans('main.MessageSent') }}',
                                                });
                                            } else {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: '{{ trans('main.Error') }}',
                                                    text: '{{ trans('main.ValidationError') }}',
                                                    footer: data.messages ? Object.values(data.messages).join('<br>') : ''
                                                });
                                            }
                                        })
                                        .catch(error => {
                                            Swal.fire({
                                                icon: 'error',
                                                title: '{{ trans('main.Error') }}',
                                                text: '{{ trans('main.ServerError') }}',
                                            });
                                            console.error('Error:', error);
                                        });
                                    });
                                </script>
                                <!-- end contact form -->

                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function validateForm() {
                        // Perform any validation here if needed
                        return true; // Allow the form submission
                    }
                </script>
            </div>
        </div>

    </div>
    <!-- //-------- Get A Quote  -->


    <footer class="layout-dark">
        <div class="copy-right">
            <div class="container-fluid  padding-tb-20px">
                <div class="">
                    <div class="row justify-content-center ">
                        <div class="col-lg-6">
                            <!--  Social -->
                            <ul class="social-media list-inline text-lg-right text-center margin-0px text-white">
                                <li class="list-inline-item"><a class="facebook" href="{{$companyInformation->facebook_url}}"><i class="fa fa-facebook"
                                            aria-hidden="true"></i></a></li>
                                <li class="list-inline-item"><a class="youtube" href="{{$companyInformation->youtube_url}}"><i class="fa fa-youtube-play"
                                            aria-hidden="true"></i></a></li>
                                <li class="list-inline-item"><a class="linkedin" href="{{$companyInformation->linkedin_url}}"><i class="fa fa-linkedin"
                                            aria-hidden="true"></i></a></li>
                                <li class="list-inline-item"><a class="whatsapp"
                                        href="https://wa.me/+2{{ $companyInformation->whatsapp }}" target="_blank"><i class="fa fa-whatsapp"
                                            aria-hidden="true"></i></a></li>
                                <li class="list-inline-item"><a class="twitter" href="{{$companyInformation->twitter_url}}"><i class="fa fa-twitter"
                                            aria-hidden="true"></i></a></li>
                                <li class="list-inline-item"><a class="instagram" href="{{$companyInformation->instagram_url}}"><i class="fa fa-instagram"
                                            aria-hidden="true"></i></a></li>
                            </ul>
                            <!-- // Social -->

                        </div>
                        <div class="col-lg-6">
                            <div class="copy-right-text text-lg-center text-center sm-mb-15px">
                                All rights reserved.©BIOHEALUX
                                powered by<a target="_blank" href="https://loopscopesolutions.com/">
                                    LOOP SCOPE SOLUTIONS</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    @if (App::getLocale() == 'ar')
    <!-- jquery library  -->
    <script src="{{ asset('assets_front/assets/js/nile-slider.js') }}"></script>
    <script src="{{ asset('assets_front/assets/js/jquery-3.2.1.min.js') }}"></script>
    <!-- REVOLUTION JS FILES -->
    <script src="{{ asset('assets_front/assets/rslider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/rslider/js/jquery.themepunch.revolution.min.js') }}"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
    <script src="{{ asset('assets_front/assets/rslider/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/rslider/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/rslider/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/rslider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/rslider/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/rslider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/rslider/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/rslider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/rslider/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/js/YouTubePopUp.jquery.js') }}"></script>
    <script src="{{ asset('assets_front/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/js/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets_front/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0" nonce="7nX5Z6K3"></script>
    <script src="{{ asset('assets_front/assets/js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @else
    
    <!-- jquery library  -->
    <script src="{{ asset('assets_front/assets/js/nile-slider.js') }}"></script>
    <script src="{{ asset('assets_front/assets/js/jquery-3.2.1.min.js') }}"></script>
    <!-- REVOLUTION JS FILES -->
    <script src="{{ asset('assets_front/assets/rslider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/rslider/js/jquery.themepunch.revolution.min.js') }}"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
    <script src="{{ asset('assets_front/assets/rslider/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/rslider/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/rslider/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/rslider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/rslider/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/rslider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/rslider/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/rslider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/rslider/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/js/YouTubePopUp.jquery.js') }}"></script>
    <script src="{{ asset('assets_front/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/js/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets_front/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets_front/assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0" nonce="7nX5Z6K3"></script>
    <script src="{{ asset('assets_front/assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @endif
    
</body>


<!-- home-100:30-->

</html>