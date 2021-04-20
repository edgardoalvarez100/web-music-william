@include('layouts.admin.partials.head')
<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	@if ($message = Session::get('success'))
	<div class="alert alert-success" role="alert">
		<div class="alert-text">{{ $message }}</div>
	</div>
	@endif
	@if ($message = Session::get('danger'))
	<div class="alert alert-danger" role="alert">
		<div class="alert-text">{{ $message }}</div>
	</div>
	@endif
	@yield('content')
</div>
<!-- end:: Content -->
</div>
@include('layouts.admin.partials.footer')