@extends('layouts.admin.material')

@section('title', 'Locations')
@section('subheader','View location')

@section('content')

<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-avatar"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Details Location
			</h3>
		</div>
	</div>
	<form class="kt-form kt-form--label-right" action="javascript:void(0);">
		<div class="kt-portlet__body">

			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Name</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="example-text-input" name="name" value="{{ $location->name}}" disabled="">
				</div>
			</div>

			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Address</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="example-text-input" name="address" value="{{ $location->address}}" disabled="">
				</div>
			</div>

			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">City</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="example-text-input" name="city"  value="{{ $location->city}}" disabled="">
				</div>
			</div>
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">State</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="example-text-input" name="state" value="{{ $location->state}}" disabled="">
				</div>
			</div>

			<div class="form-group row">
				<label  class="col-2 col-form-label">Country</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="example-text-input" name="country" value="{{ $location->country}}" disabled="" >
				</div>
				
			</div>

			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Zip Code</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="example-text-input" name="zip" value="{{ $location->zip}}" disabled="">
				</div>
			</div>

			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Google Map</label>
				<div class="col-10">
					<textarea class="form-control" type="text"  id="example-text-input" name="gmap"  rows="3"  disabled="">{{ $location->gmap}}</textarea>
				</div>
			</div>

			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Url Gmap</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="example-text-input" name="gdir" value="{{ $location->gdir}}" disabled="">
				</div>
			</div>
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Created at</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="example-text-input" name="created" value="{{ $location->created_at}}" disabled="">
				</div>
			</div>
			
			

		</div>
		<div class="kt-portlet__foot">
			<div class="row align-items-center">
				<div class="col-lg-6 m--valign-middle">

				</div>
				<div class="col-lg-6 kt-align-right">
					<a class="btn btn-primary" href="{{route('location.edit',$location->id)}}" role="button">Edit</a> <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-clean btn-icon-sm">
						<i class="la la-long-arrow-left"></i>
						Back
					</a>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
