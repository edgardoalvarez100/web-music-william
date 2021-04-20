@extends('layouts.admin.material')

@section('title', 'Location')
@section('subheader','Edit location')

@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-avatar"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Edit Location
			</h3>
		</div>
	</div>
	<form class="kt-form kt-form--label-right" action="{{ route('location.update', $location->id)}}" method="POST">
		<div class="kt-portlet__body">
			@csrf
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Name</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="example-text-input" name="name" value="{{ $location->name}}" >
				</div>
			</div>
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Address</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="example-text-input" name="address" required="" placeholder="ex. 2635 Homestead Rd" value="{{ $location->address}}">
				</div>
			</div>

			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">City</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="example-text-input" name="city" required="" placeholder="ex. Miami" value="{{ $location->city}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">State</label>
				<div class="col-10">
					<input class="form-control kt_maxlength_1" type="text"  id="example-text-input" name="state" required="" placeholder="ex. FL" maxlength="2" onkeyup="this.value = this.value.toUpperCase();" value="{{ $location->state}}">
				</div>
			</div>

			<div class="form-group row">
				<label  class="col-2 col-form-label">Country</label>
				<div class="col-10">
					@include('admin.location.country')
				</div>
				
			</div>

			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Zip Code</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="example-text-input" name="zip" required="" placeholder="ex. 33166" maxlength="25" value="{{ $location->zip}}">
				</div>
			</div>

			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Google Map</label>
				<div class="col-10">
					<textarea class="form-control" type="text"  id="example-text-input" name="gmap"  rows="3">{{ trim($location->gmap)}}</textarea>
				</div>
			</div>

			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Url Gmap</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="example-text-input" name="gdir" value="{{ $location->gdir}}">
				</div>
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
@section('script')
<script type="text/javascript">
	$("#country option[value='{{ $location->country}}']").attr("selected",true);
</script>
<script type="text/javascript">
	var KTBootstrapMaxlength = function () {

    // Private functions
    var demos = function () {

// minimum setup
$('.kt_maxlength_1').maxlength({
	warningClass: "kt-badge kt-badge--warning kt-badge--rounded kt-badge--inline",
	limitReachedClass: "kt-badge kt-badge--success kt-badge--rounded kt-badge--inline"
});
}

return {
        // public functions
        init: function() {
        	demos();  
        }
    };
}();

jQuery(document).ready(function() {
	KTBootstrapMaxlength.init();
});
</script>
@endsection