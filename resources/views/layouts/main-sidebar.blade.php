<!-- Sidebar -->
<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<!-- Dashboard -->
				<li class="menu-title"><span>{{ trans('main.Dashboard') }}</span></li>
				<li class="{{ Request::is('/home') ? 'active' : '' }}">
					<a href="{{ route('home') }}"><i data-feather="home"></i> <span>{{ trans('main.Dashboard') }}</span></a>
				</li>
				<li class="{{ Request::is('admin/company-information') ? 'active' : '' }}">
					<a href="{{ route('company-information.index') }}"><i data-feather="copy"></i> <span>{{ trans('main.Company Informations') }}</span></a>
				</li>
				<li class="{{ Request::is('admin/user','admin/role') ? 'active' : '' }} submenu">
					<a href="#"><i data-feather="user-check"></i> <span>{{ trans('main.Users') }}</span> <span class="menu-arrow"></span></a>
					<ul>
						<li class="ml-1"><a class=" {{ Request::is('admin/user') ? 'active' : '' }}" href="{{ route('user.index') }}">{{ trans('main.Users') }}</a></li>
						<li class="ml-1"><a class=" {{ Request::is(['admin/role', 'admin/role/create', 'admin/role/*/edit', 'admin/role/*']) ? 'active' : '' }}" href="{{ route('role.index') }}">{{ trans('main.Roles') }}</a></li>
					</ul>
				</li>



				<!-- Home -->
				<li class="menu-title"><span>{{ trans('main.Home') }}</span></li>
				<li class="{{ Request::is('admin/slider','admin/slider-footer') ? 'active' : '' }} submenu">
					<a href="#"><i data-feather="copy"></i> <span>{{ trans('main.Sliders') }}</span> <span class="menu-arrow"></span></a>
					<ul>
						<li class="ml-1"><a class=" {{ Request::is('admin/slider') ? 'active' : '' }}" href="{{ route('slider.index') }}">{{ trans('main.Sliders') }}</a></li>
						<li class="ml-1"><a class=" {{ Request::is('admin/slider-footer') ? 'active' : '' }}" href="{{ route('slider-footer.index') }}">{{ trans('main.Slider Footers') }}</a></li>
					</ul>
				</li>
				<li class="{{ Request::is('admin/who-we-are-side','admin/who-we-are-detail','admin/who-we-are-faq') ? 'active' : '' }} submenu">
					<a href="#"><i data-feather="copy"></i> <span>{{ trans('main.Who We Are') }}</span> <span class="menu-arrow"></span></a>
					<ul>
						<li class="ml-1"><a class=" {{ Request::is('admin/who-we-are-side') ? 'active' : '' }}" href="{{ route('who-we-are-side.index') }}">{{ trans('main.Who We Are Sides') }}</a></li>
						<li class="ml-1"><a class=" {{ Request::is('admin/who-we-are-detail') ? 'active' : '' }}" href="{{ route('who-we-are-detail.index') }}">{{ trans('main.Who We Are Details') }}</a></li>
						<li class="ml-1"><a class=" {{ Request::is('admin/who-we-are-faq') ? 'active' : '' }}" href="{{ route('who-we-are-faq.index') }}">{{ trans('main.Who We Are Faqs') }}</a></li>
					</ul>
				</li>
				<li class="{{ Request::is('admin/service-detail','admin/service-item') ? 'active' : '' }} submenu">
					<a href="#"><i data-feather="copy"></i> <span>{{ trans('main.Our Services') }}</span> <span class="menu-arrow"></span></a>
					<ul>
						<li class="ml-1"><a class=" {{ Request::is('admin/service-detail') ? 'active' : '' }}" href="{{ route('service-detail.index') }}">{{ trans('main.Service Details') }}</a></li>
						<li class="ml-1"><a class=" {{ Request::is('admin/service-item') ? 'active' : '' }}" href="{{ route('service-item.index') }}">{{ trans('main.Service Items') }}</a></li>
					</ul>
				</li>



				<!-- Projects -->
				<li class="menu-title"><span>{{ trans('main.Projects') }}</span></li>
				<li class="{{ Request::is('admin/project-detail','admin/project-item') ? 'active' : '' }} submenu">
					<a href="#"><i data-feather="copy"></i> <span>{{ trans('main.Our Projects') }}</span> <span class="menu-arrow"></span></a>
					<ul>
						<li class="ml-1"><a class=" {{ Request::is('admin/project-detail') ? 'active' : '' }}" href="{{ route('project-detail.index') }}">{{ trans('main.Project Details') }}</a></li>
						<li class="ml-1"><a class=" {{ Request::is('admin/project-item') ? 'active' : '' }}" href="{{ route('project-item.index') }}">{{ trans('main.Project Items') }}</a></li>
					</ul>
				</li>



				<!-- Courses -->
				<li class="menu-title"><span>{{ trans('main.Courses') }}</span></li>
				<li class="{{ Request::is('admin/course-item','admin/course-item-content') ? 'active' : '' }} submenu">
					<a href="#"><i data-feather="copy"></i> <span>{{ trans('main.Our Courses') }}</span> <span class="menu-arrow"></span></a>
					<ul>
						<li class="ml-1"><a class=" {{ Request::is('admin/course-item') ? 'active' : '' }}" href="{{ route('course-item.index') }}">{{ trans('main.Course Items') }}</a></li>
						<li class="ml-1"><a class=" {{ Request::is('admin/course-item-content') ? 'active' : '' }}" href="{{ route('course-item-content.index') }}">{{ trans('main.Course Item Contents') }}</a></li>
					</ul>
				</li>



				<!-- Parteners -->
				<li class="menu-title"><span>{{ trans('main.Parteners') }}</span></li>
				<li class="{{ Request::is('admin/partener') ? 'active' : '' }} submenu">
					<a href="#"><i data-feather="copy"></i> <span>{{ trans('main.Our Parteners') }}</span> <span class="menu-arrow"></span></a>
					<ul>
						<li class="ml-1"><a class=" {{ Request::is('admin/partener') ? 'active' : '' }}" href="{{ route('partener.index') }}">{{ trans('main.Parteners') }}</a></li>
					</ul>
				</li>



				<!-- Messages -->
				<li class="menu-title"><span>{{ trans('main.Messages') }}</span></li>
				<li class="{{ Request::is('/admin/message') ? 'active' : '' }}">
					<a href="{{ route('message.index') }}"><i data-feather="copy"></i> <span>{{ trans('main.Messages') }}</span></a>
				</li>
			
			</ul>
		</div>
	</div>
</div>
<!-- /Sidebar -->