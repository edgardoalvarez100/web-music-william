@extends('layouts.admin.material')

@section('title', 'Profile')
@section('subheader','My account')

@section('content')
<div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

	<!--Begin:: App Aside Mobile Toggle-->
	<button class="kt-app__aside-close" id="kt_user_profile_aside_close">
		<i class="la la-close"></i>
	</button>

	<!--End:: App Aside Mobile Toggle-->

	<!--Begin:: App Aside-->
	<div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside" style="opacity: 1;">

		<!--begin:: Widgets/Applications/User/Profile1-->
		<div class="kt-portlet kt-portlet--height-fluid-">
			<div class="kt-portlet__head  kt-portlet__head--noborder">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
					</h3>
				</div>
				<div class="kt-portlet__head-toolbar">

				</div>
			</div>
			<div class="kt-portlet__body kt-portlet__body--fit-y">

				<!--begin::Widget -->
				<div class="kt-widget kt-widget--user-profile-1">
					<div class="kt-widget__head">
						<div class="kt-widget__media">
							<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--xl kt-badge--rounded kt-badge--bold">{{Auth::user()->FirstLetter}}</span>
							<!-- <img src="./assets/media/users/100_1.jpg" alt="image"> -->
						</div>
						<div class="kt-widget__content">
							<div class="kt-widget__section">
								<a href="javascript:;" class="kt-widget__username">
									{{Auth::user()->name}}
									<i class="flaticon2-correct kt-font-success"></i>
								</a>
								<span class="kt-widget__subtitle">
									{{Auth::user()->created_at}}
								</span>
							</div>
							
						</div>
					</div>
					<div class="kt-widget__body">
						<div class="kt-widget__content">
							<div class="kt-widget__info">
								<span class="kt-widget__label">Email:</span>
								<a href="javascript:;" class="kt-widget__data">{{Auth::user()->email}}</a>
							</div>
							
						</div>
						
					</div>
				</div>

				<!--end::Widget -->
			</div>
		</div>

		<!--end:: Widgets/Applications/User/Profile1-->
	</div>

	<!--End:: App Aside-->

	<!--Begin:: App Content-->
	<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
		<div class="row">
			<div class="col-xl-12">
				<div class="kt-portlet kt-portlet--height-fluid">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">Change Password<small>change or reset your account password</small></h3>
						</div>
					</div>

					
					<form class="kt-form kt-form--label-right" method="POST" action="{{route('profile.changepassword')}}">
						@csrf
						<div class="kt-portlet__body">
							<div class="kt-section kt-section--first">
								<div class="kt-section__body">
									@if ($errors->any())
									<div class="alert alert-danger" role="alert">
										<div class="alert-text">
											<ul>
												@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
												@endforeach
											</ul>
										</div>
										<div class="alert-close">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true"><i class="la la-close"></i></span>
											</button>
										</div>
									</div>
									@endif
									<div class="row">
										<label class="col-xl-3"></label>
										<div class="col-lg-9 col-xl-6">
											<h3 class="kt-section__title kt-section__title-sm">Change Your Password:</h3>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">New Password</label>
										<div class="col-lg-9 col-xl-6">
											<input type="password" class="form-control"  placeholder="New password" name="password" required="">
											
										</div>
									</div>
									<div class="form-group form-group-last row">
										<label class="col-xl-3 col-lg-3 col-form-label">Verify Password</label>
										<div class="col-lg-9 col-xl-6">
											<input type="password" class="form-control"  placeholder="Verify password" name="password_confirmation" required="">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="kt-portlet__foot">
							<div class="kt-form__actions">
								<div class="row">
									<div class="col-lg-3 col-xl-3">
									</div>
									<div class="col-lg-9 col-xl-9">
										<button type="submit" class="btn btn-brand btn-bold">Change Password</button>&nbsp;
										<button type="reset" class="btn btn-secondary">Cancel</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!--End:: App Content-->
</div>
@endsection