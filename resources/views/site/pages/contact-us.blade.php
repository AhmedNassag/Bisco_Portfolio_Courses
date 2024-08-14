@extends('site.layouts.master')
@section('content')
<div class="page-title pt-5">
    <div class="container">
        <div class="padding-tb-120px">
            <h1>{{ trans('main.Contact Us') }}</h1>
            <ol class="breadcrumb">
                <li><a href="#">{{ trans('main.Home') }}</a></li>
                <li class="active">{{ trans('main.Contact Us') }}</li>
            </ol>
        </div>
    </div>
</div>



<div class="padding-tb-100px" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 sm-mb-45px">
                <p> 
                    {!! $companyInformation->details !!}
                </p>
                <h5>{{ trans('main.Phone') }} :</h5>
                <span class="d-block">
                    <i class="fa fa-phone text-main-color margin-right-10px" aria-hidden="true"></i>
                    {{ $companyInformation->phone }}
                </span>
                <span class="d-block sm-mb-30px">
                    <i class="fa fa-mobile text-main-color margin-right-10px" aria-hidden="true"></i>
                    {{ $companyInformation->mobile }}
                </span>
                <h5 class="margin-top-20px">{{ trans('main.Address') }} :</h5>
                <span class="d-block sm-mb-30px">
                    <i class="fa fa-map text-main-color margin-right-10px" aria-hidden="true"></i>
                    {{ $companyInformation->address }} 
                </span>
                <h5 class="margin-top-20px">{{ trans('main.Email') }} :</h5>
                <span class="d-block sm-mb-30px">
                    <i class="fa fa-envelope-open text-main-color margin-right-10px" aria-hidden="true"></i> 
                    {{ $companyInformation->email }}
                </span>
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
        </div>
    </div>
</div>



<div class="map-layout">
    <div class="map-embed">
        <iframe src="https://www.google.com/maps/embed/v1/place?q=mansoura&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8" width="100%" height="390" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8"></div>
            <div class="col-lg-4">
                <div class="padding-tb-50px padding-lr-30px background-main-color pull-top-309px">
                    <div class="contact-info-map">
                        <div class="margin-bottom-30px">
                            <h2 class="title">{{ trans('main.Location') }}</h2>
                            <div class="contact-info opacity-9">
                                <div class="icon margin-top-5px"><span class="icon_pin_alt"></span></div>
                                <div class="text">
                                    <!-- <span class="title-in">{{ trans('main.Location') }} :</span> 
                                    <br> -->
                                    <span class="font-weight-500 text-uppercase">{{ $companyInformation->address }}</span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="call_center margin-top-30px">
                            <h2 class="title">{{ trans('main.Contact Us') }}</h2>
                            <div class="contact-info opacity-9">
                                <div class="icon  margin-top-5px"><span class="icon_phone"></span></div>
                                <div class="text">
                                    <span class="title-in">{{ $companyInformation->mobile }} :</span>
                                    <br>
                                    <span class="font-weight-500 text-uppercase">{{ $companyInformation->phone }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection