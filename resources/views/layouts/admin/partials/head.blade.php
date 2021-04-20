<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>

	<!--begin::Base Path (base relative path for assets of this page) -->
	<base href="/">

	<!--end::Base Path -->
	<meta charset="utf-8" />
	<title> {{ config('app.name', 'Laravel') }} | @yield('title')</title>
	<meta name="description" content="Updates and statistics">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--begin::Fonts -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!--end::Fonts -->

	<!--begin::Page Vendors Styles(used by this page) -->
	<link href="./assets_admin/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

	<!--end::Page Vendors Styles -->

	<!--begin:: Global Mandatory Vendors -->
	<link href="./assets_admin/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

	<!--end:: Global Mandatory Vendors -->

	<!--begin:: Global Optional Vendors -->
	<link href="./assets_admin/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

	<!--end:: Global Optional Vendors -->

	<!--begin::Global Theme Styles(used by all pages) -->
	<link href="./assets_admin/css/demo1/style.bundle.css" rel="stylesheet" type="text/css" />

	<!--end::Global Theme Styles -->

	<!--begin::Layout Skins(used by all pages) -->
	<link href="./assets_admin/css/demo1/skins/header/base/light.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/css/demo1/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/css/demo1/skins/brand/dark.css" rel="stylesheet" type="text/css" />
	<link href="./assets_admin/css/demo1/skins/aside/dark.css" rel="stylesheet" type="text/css" />

	<!--end::Layout Skins -->
	<link rel="shortcut icon" href="./assets_admin/media/logos/livepanel-fav.png" />
</head>


<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

	<!-- begin:: Page -->

	<!-- begin:: Header Mobile -->
	<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
		<div class="kt-header-mobile__logo">
			<a href="{{route('home')}}">
				<img alt="Logo" src="./assets_admin/media/logos/livepanel.svg" style="height: 18px;" />
			</a>
		</div>
		<div class="kt-header-mobile__toolbar">
			<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
			<!-- <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button> -->
			<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
		</div>
	</div>
	<!-- end:: Header Mobile -->
	<div class="kt-grid kt-grid--hor kt-grid--root">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

			<!-- begin:: Aside -->
			<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
			<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

				<!-- begin:: Aside -->
				<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
					<div class="kt-aside__brand-logo">
						<a href="{{route('home')}}">
							<img alt="Logo" src="./assets_admin/media/logos/livepanel.svg" style="height: 18px;" />
						</a>
					</div>
					<div class="kt-aside__brand-tools">
						<button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
							<span>
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
										<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
										<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
									</g>
								</svg>
							</span>
							<span>
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
										<path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" />
										<path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
									</g>
								</svg>
							</span>
						</button>

							<!--
			<button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
		-->
	</div>
</div>

<!-- end:: Aside -->
@include('layouts.admin.partials.nav')

</div>

<!-- end:: Aside -->
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

	<!-- begin:: Header -->
	<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

		<!-- begin:: Header Menu -->
		<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
		<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
			<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
				<ul class="kt-menu__nav ">
					

				</ul>
			</div>
		</div>

		<!-- end:: Header Menu -->

		<!-- begin:: Header Topbar -->
		<div class="kt-header__topbar">

			<!--begin: Search -->

			<!--begin: Search -->
			<!-- <div class="kt-header__topbar-item kt-header__topbar-item--search dropdown" id="kt_quick_search_toggle">
				<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
					<span class="kt-header__topbar-icon">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect id="bound" x="0" y="0" width="24" height="24" />
								<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" id="Path-2" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" id="Path" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg> </span>
					</div>
					<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
						<div class="kt-quick-search kt-quick-search--inline" id="kt_quick_search_inline">
							<form method="get" class="kt-quick-search__form">
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
									<input type="text" class="form-control kt-quick-search__input" placeholder="Search...">
									<div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
								</div>
							</form>
							<div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
							</div>
						</div>
					</div>
				</div>
			-->
			<!--end: Search -->

			<!--end: Search -->



			<!--begin: User Bar -->
			<div class="kt-header__topbar-item kt-header__topbar-item--user">
				<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
					<div class="kt-header__topbar-user">
						<span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
						<span class="kt-header__topbar-username kt-hidden-mobile">{{ Auth::user()->name }}</span>
						<img class="kt-hidden" alt="Pic" src="{{ Auth::user()->gravatar }}" />

						<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
						<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">{{Auth::user()->FirstLetter}}</span>
					</div>
				</div>
				<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

					<!--begin: Head -->
					<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(./assets_admin/media/misc/bg-1.jpg)">
						<div class="kt-user-card__avatar">
							<img class="kt-hidden" alt="Pic" src="./assets_admin/media/users/300_25.jpg" />

							<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
							<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">{{Auth::user()->FirstLetter}}</span>
						</div>
						<div class="kt-user-card__name">
							{{ Auth::user()->name }}
						</div>
							<!-- <div class="kt-user-card__badge">
								<span class="btn btn-success btn-sm btn-bold btn-font-md">23 messages</span>
							</div> -->
						</div>

						<!--end: Head -->

						<!--begin: Navigation -->
						<div class="kt-notification">
							<a href="{{route('admin.profile')}}" class="kt-notification__item">
								<div class="kt-notification__item-icon">
									<i class="flaticon2-calendar-3 kt-font-success"></i>
								</div>
								<div class="kt-notification__item-details">
									<div class="kt-notification__item-title kt-font-bold">
										My Profile
									</div>
									<div class="kt-notification__item-time">
										Account settings and more
									</div>
								</div>
							</a>
							
							<div class="kt-notification__custom kt-space-between">
								<a href="{{ route('logout') }}" class="btn btn-label btn-label-brand btn-sm btn-bold"  onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">Sign Out</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
								<!-- <a href="demo1/custom/user/login-v2.html" target="_blank" class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a> -->
							</div>
						</div>

						<!--end: Navigation -->
					</div>
				</div>

				<!--end: User Bar -->
			</div>

			<!-- end:: Header Topbar -->
		</div>

		<!-- end:: Header -->
		<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

			<!-- begin:: Content Head -->
			<div class="kt-subheader  kt-grid__item" id="kt_subheader">
				<div class="kt-container  kt-container--fluid ">
					<div class="kt-subheader__main">
						<h3 class="kt-subheader__title">@yield('title')</h3>
						<span class="kt-subheader__separator kt-subheader__separator--v"></span>
						<span class="kt-subheader__desc">@yield('subheader')</span>

						<div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
							<input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
							<span class="kt-input-icon__icon kt-input-icon__icon--right">
								<span><i class="flaticon2-search-1"></i></span>
							</span>
						</div>
					</div>


					<div class="kt-subheader__toolbar">
						<div class="kt-subheader__wrapper">

							<div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="" data-placement="left" data-original-title="Quick actions">
								<a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
											<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
											<path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" id="Combined-Shape" fill="#000000"></path>
										</g>
									</svg>

									<!--<i class="flaticon2-plus"></i>-->
								</a>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right">

									<!--begin::Nav-->
									<ul class="kt-nav">
										<li class="kt-nav__head">
											Add anything or jump to:
											<i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
										</li>
										<li class="kt-nav__separator"></li>
										<li class="kt-nav__item">
											<a href="{{route('event.create')}}" class="kt-nav__link">
												<i class="kt-nav__link-icon flaticon2-calendar"></i>
												<span class="kt-nav__link-text">Event</span>
											</a>
										</li>
										<li class="kt-nav__item">
											<a href="{{route('serie.create')}}" class="kt-nav__link">
												<i class="kt-nav__link-icon flaticon2-add-1"></i>
												<span class="kt-nav__link-text">Series</span>
											</a>
										</li>
										<li class="kt-nav__item">
											<a href="{{route('location.create')}}" class="kt-nav__link">
												<i class="kt-nav__link-icon flaticon-map-location"></i>
												<span class="kt-nav__link-text">Location</span>
											</a>
										</li>
										
										<li class="kt-nav__separator"></li>
										
									</ul>

									<!--end::Nav-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- end:: Content Head -->
			
			
			