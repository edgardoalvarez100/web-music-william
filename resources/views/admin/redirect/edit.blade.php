@extends('layouts.admin.material')

@section('title', 'Redirects')
@section('subheader','Edit redirect')

@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-avatar"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Edit redirect
			</h3>
		</div>

		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
					<div class="dropdown dropdown-inline">
						
					</div>
					&nbsp;
					<a href="{{ route('redirect.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						New Redirect
					</a>
				</div>
			</div>
		</div>
	</div>
	<form class="kt-form kt-form--label-right" action="{{ route('redirect.update', $redirect->id)}}" method="POST">
		<div class="kt-portlet__body">
			@csrf
			<input name="_method" type="hidden" value="PUT">
			<div class="form-group row">
				<label for="url_from" class="col-2 col-form-label">Url From</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="url_from" name="url_from" required="" value="{{$redirect->url_from}}">
				</div>
			</div>

			<div class="form-group row">
				<label for="url_to" class="col-2 col-form-label">Url To</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="url_to" name="url_to" required="" value="{{$redirect->url_to}}">
				</div>
			</div>

			<div class="form-group row">
			<label for="status" class="col-2 col-form-label">Status</label>
			<div class="col-10">
				<span class="kt-switch kt-switch--icon">
					<label>
						<input type="checkbox" name="status" id="status" @if($redirect->status) checked @endif>
						<span></span>
					</label>
				</span>
			</div>
			

		</div>
		<div class="kt-portlet__foot">
			<div class="row align-items-center">
				<div class="col-lg-6 m--valign-middle">

				</div>
				<div class="col-lg-6 kt-align-right">
					<button type="submit" class="btn btn-brand">Update</button> <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-clean btn-icon-sm">
						<i class="la la-long-arrow-left"></i>
						Back
					</a>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection