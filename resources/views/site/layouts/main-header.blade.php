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
								<div class="col-md-4">
									<i class="fa fa-map-marker margin-right-10px"></i>
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
											<a class="facebook" href="#">
												<i class="fa fa-facebook" aria-hidden="true"></i>
											</a>
										</li>
										@endif
										@if($companyInformation->youtube_url)
										<li class="list-inline-item">
											<a class="youtube" href="#">
												<i class="fa fa-youtube-play" aria-hidden="true"></i>
											</a>
										</li>
										@endif
										@if($companyInformation->linkedin_url)
										<li class="list-inline-item">
											<a class="linkedin" href="#">
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
											<a class="twitter" href="#">
												<i class="fa fa-twitter" aria-hidden="true"></i>
											</a>
										</li>
										@endif
										@if($companyInformation->instagram_url)
										<li class="list-inline-item">
											<a class="instagram" href="#">
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

				

				<div class="position-relative">
					<div class="row">
						<div class="col-lg-3 col-md-12">
							<a id="logo" href="/" class="d-inline-block margin-tb-15px">
							@if($companyInformation->photo)
							<img src="{{ asset('attachments/company-information/'.$companyInformation->photo) }}" class="navLogo" alt="">
							@else
							<img src="{{ asset('assets_front/assets/img/logo.png') }}" class="navLogo" alt="">
							@endif
							</a>
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
							<a href="tel:11" class="btn btn-sm border-radius-30 margin-tb-20px text-white background-main-color box-shadow float-right padding-lr-20px margin-left-30px d-block">
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
