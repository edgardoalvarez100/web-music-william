@extends('layouts.admin.material')

@section('title', 'Series')
@section('subheader','Add series')

@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-avatar"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Create series
			</h3>
		</div>
	</div>
	<form class="kt-form kt-form--label-right" method="POST" action="{{route('serie.store')}}" enctype="multipart/form-data">
		@csrf
		<div class="kt-portlet__body">
			
			<div class="form-group row">
				<label for="name" class="col-2 col-form-label">Name</label>
				<div class="col-lg-6 col-sm-10 col-xs-10 col-10">
					<input class="form-control" type="text"  id="name" name="name" required="">
				</div>
			</div>

			<div class="form-group row">
				<label for="date" class="col-2 col-form-label">Date</label>
				<div class="col-lg-3 col-sm-6 col-xs-6 col-6">
					<div class="input-group date">
						<input class="form-control kt_datepicker_3" type="text"  id="date" name="date" required="" autocomplete="off">
						<div class="input-group-append">
							<span class="input-group-text">
								<i class="la la-calendar"></i>
							</span>
						</div>
					</div>
					
				</div>
			</div>

			<div class="form-group row">
				<label for="homepage" class="col-2 col-form-label">Homepage Box</label>

				<div class="col-5">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="homepage" required="" name="homepage" accept="image/*">

						<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label for="topbanner" class="col-2 col-form-label">Top banner</label>

				<div class="col-5">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="topbanner" required="" name="topbanner" accept="image/*">

						<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label for="cover" class="col-2 col-form-label">Cover</label>

				<div class="col-5">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="cover" required="" name="cover" accept="image/*">

						<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label for="description" class="col-2 col-form-label">Description</label>
				<div class="col-10">
					<textarea class="form-control" type="text"  id="description" name="description"></textarea>
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
@section('script')

<script type="text/javascript">

	var KTBootstrapDatepicker = function () {

		var arrows;
		if (KTUtil.isRTL()) {
			arrows = {
				leftArrow: '<i class="la la-angle-right"></i>',
				rightArrow: '<i class="la la-angle-left"></i>'
			}
		} else {
			arrows = {
				leftArrow: '<i class="la la-angle-left"></i>',
				rightArrow: '<i class="la la-angle-right"></i>'
			}
		}

// Private functions
var demos = function () {

// enable clear button 
$('.kt_datepicker_3, .kt_datepicker_3_validate').datepicker({
	rtl: KTUtil.isRTL(),
	todayBtn: "linked",
	clearBtn: true,
	todayHighlight: true,
	templates: arrows,
	format: 'yyyy-mm-dd',
});

// enable clear button for modal demo
$('.kt_datepicker_3_modal').datepicker({
	rtl: KTUtil.isRTL(),
	todayBtn: "linked",
	clearBtn: true,
	todayHighlight: true,
	templates: arrows,
	format: 'yyyy-mm-dd',
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
	KTBootstrapDatepicker.init();

});

var KTSummernoteDemo = function () {    
// Private functions
var demos = function () {
	$('#description').summernote({
		height: 150
	});
}

return {
// public functions
init: function() {
	demos(); 
}
};
}();

// Initialization
jQuery(document).ready(function() {
	KTSummernoteDemo.init();
});
</script>

@endsection