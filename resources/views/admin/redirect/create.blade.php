@extends('layouts.admin.material')

@section('title', 'Redirects')
@section('subheader','Add redirect')

@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-avatar"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Create Redirect
			</h3>
		</div>
	</div>
	<form class="kt-form kt-form--label-right" method="POST" action="{{route('redirect.store')}}">
		@csrf
		<div class="kt-portlet__body">
			
			<div class="form-group row">
				<label for="url_from" class="col-2 col-form-label">Url From</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="url_from" name="url_from" required="">
				</div>
			</div>

			<div class="form-group row">
				<label for="url_to" class="col-2 col-form-label">Url To</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="url_to" name="url_to" required="">
				</div>
			</div>

			<div class="form-group row">
			<label for="status" class="col-2 col-form-label">Status</label>
			<div class="col-10">
				<span class="kt-switch kt-switch--icon">
					<label>
						<input type="checkbox" name="status" id="status" checked>
						<span></span>
					</label>
				</span>
			</div>
		</div>

		</div>
		<div class="kt-portlet__foot">
			<div class="row align-items-center">
				<div class="col-lg-6 m--valign-middle">

				</div>
				<div class="col-lg-6 kt-align-right">
					<button type="submit" class="btn btn-brand">Submit</button>
					<span class="kt-margin-left-10">or <a href="#" class="kt-link kt-font-bold">Cancel</a></span>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection