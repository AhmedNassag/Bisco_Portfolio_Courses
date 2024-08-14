<footer class="layout-dark">
	<div class="copy-right">
		<div class="container-fluid  padding-tb-20px">
			<div class="">
				<div class="row justify-content-center ">
					<div class="col-lg-6">
						<!--  Social -->
						<ul class="social-media list-inline text-lg-right text-center margin-0px text-white">
							@if($companyInformation->facebook_url)
							<li class="list-inline-item">
								<a class="facebook" href="{{ $companyInformation->facebook_url }}">
									<i class="fa fa-facebook" aria-hidden="true"></i>
								</a>
							</li>
							@endif
							@if($companyInformation->youtube_url)
							<li class="list-inline-item">
								<a class="youtube" href="{{ $companyInformation->youtube_url }}">
									<i class="fa fa-youtube-play" aria-hidden="true"></i>
								</a>
							</li>
							@endif
							@if($companyInformation->linkedin_url)
							<li class="list-inline-item">
								<a class="linkedin" href="{{ $companyInformation->linkedin_url }}">
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
								<a class="twitter" href="{{ $companyInformation->twitter_url }}">
									<i class="fa fa-twitter" aria-hidden="true"></i>
								</a>
							</li>
							@endif
							@if($companyInformation->instagram_url)
							<li class="list-inline-item">
								<a class="instagram" href="{{ $companyInformation->instagram_url }}">
									<i class="fa fa-instagram"aria-hidden="true"></i>
								</a>
							</li>
							@endif
						</ul>
						<!-- // Social -->
					</div>
					<div class="col-lg-6">
						<div class="copy-right-text text-lg-center text-center sm-mb-15px">
							All rights reserved.©BIOHEALUX powered by
							<a target="_blank" href="https://loopscopesolutions.com/">LOOP SCOPE SOLUTIONS</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>