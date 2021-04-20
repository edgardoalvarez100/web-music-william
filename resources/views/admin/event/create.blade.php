@extends('layouts.admin.material')

@section('title', 'Event')
@section('subheader','Add Event')

@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-avatar"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Create Event
			</h3>
		</div>
	</div>
	<form class="kt-form kt-form--label-right" method="POST" action="{{route('event.store')}}" enctype="multipart/form-data" 
	id="myForm">
	@csrf
	<div class="kt-portlet__body">

		<div class="form-group row">
			<label for="title" class="col-2 col-form-label">Title</label>
			<div class="col-lg-6 col-sm-10 col-xs-10 col-10">
				<input class="form-control" type="text"  id="title" name="title" autocomplete="off" required="">
			</div>
		</div>

		<div class="form-group row">
			<label for="start_date" class="col-form-label col-2">Publication Start Date</label>
			<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
				<div class="input-group date">
					<input class="form-control kt_datepicker_3" type="text"  id="start_date" name="start_date" required=""  autocomplete="off">
					<div class="input-group-append">
						<span class="input-group-text">
							<i class="la la-calendar"></i>
						</span>
					</div>
				</div>
			</div>
		</div>

		<div class="form-group row">
			<label for="end_date" class="col-form-label col-2">Publication End Date</label>
			<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
				<div class="input-group date">
					<input class="form-control kt_datepicker_3" type="text"  id="end_date" name="end_date" required=""  autocomplete="off">
					<div class="input-group-append">
						<span class="input-group-text">
							<i class="la la-calendar"></i>
						</span>
					</div>
				</div>
			</div>
		</div>

		<div class="form-group row">
			<label for="start_date_event" class="col-form-label col-2">Event Start Date</label>
			<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
				<div class="input-group date">
					<input class="form-control kt_datepicker_3" type="text"  id="start_date_event" name="start_date_event" required=""  autocomplete="off">
					<div class="input-group-append">
						<span class="input-group-text">
							<i class="la la-calendar"></i>
						</span>
					</div>
				</div>
			</div>
		</div>

		<div class="form-group row">
			<label for="dateintext" class="col-2 col-form-label">Date in Text</label>
			<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
				<input class="form-control" type="text"  id="dateintext" name="date_in_text" placeholder="ex. Feb 2 - 4" autocomplete="off">
			</div>
		</div>
		<div class="form-group row">
			<label for="dateintext" class="col-2 col-form-label">Time</label>
			<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
				<input class="form-control" type="text"  id="dateintext" name="time" placeholder="ex. 8AM - 10AM" autocomplete="off">
			</div>
		</div>
		<div class="form-group row">
			<label for="location" class="col-2 col-form-label">Location</label>
			<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
				<select class="form-control kt-selectpicker" name="location">
					@foreach($locations as $location)
					<option value="{{$location->id}}">{{$location->name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="short_description" class="col-2 col-form-label">Short Description</label>
			<div class="col-10">
				<textarea class="form-control " type="text"  id="short_description" name="short_description"  ></textarea>
			</div>
		</div>

		<div class="form-group row">
			<label for="description" class="col-2 col-form-label">Description</label>
			<div class="col-10">
				<textarea class="form-control" type="text"  id="description" name="description"></textarea>
			</div>
		</div>


		<div class="form-group row">
			<label for="image" class="col-2 col-form-label">Image</label>

			<div class="col-5">
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="image" required="" name="image" accept="image/*">

					<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
				</div>
			</div>
		</div>


		<div class="form-group row">
			<label for="featured" class="col-2 col-form-label">Featured</label>
			<div class="col-10">
				<span class="kt-switch kt-switch--icon">
					<label>
						<input type="checkbox" name="featured" id="featured">
						<span></span>
					</label>
				</span>
			</div>
		</div>
		<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
		<h3 class="kt-section__title kt-section__title-lg">Price:</h3>
		<div class="form-group row">
			<label for="currency" class="col-2 col-form-label">Currency</label>
			<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
				<input class="form-control" type="text"  id="currency" name="currency" placeholder="ex. USD" autocomplete="off">
			</div>
		</div>
		<div class="form-group row">
			<label for="price" class="col-2 col-form-label">Price</label>
			<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
				<input class="form-control" type="text"  id="price" name="price" placeholder="ex. 10" autocomplete="off">
			</div>
		</div>

		<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
		<h3 class="kt-section__title kt-section__title-lg">Buttons:</h3>
		<div id="kt_repeater_2">
			<div class="form-group form-group-last row" id="kt_repeater_2">
				<label class="col-lg-2 col-form-label"></label>
				<div data-repeater-list="button" class="col-lg-10">
					<div data-repeater-item class="form-group row align-items-center">
						<div class="col-md-2">
							<div class="kt-form__group--inline">
								<div class="kt-form__label">
									<label>Text:</label>
								</div>
								<div class="kt-form__control">
									<input type="text" class="form-control" placeholder="Ex. Read More" autocomplete="off" required="" name="[text-input][text]">
								</div>
							</div>
							<div class="d-md-none kt-margin-b-10"></div>
						</div>
						<div class="col-md-5">
							<div class="kt-form__group--inline">
								<div class="kt-form__label">
									<label class="kt-label m-label--single">Link:</label>
								</div>
								<div class="kt-form__control">
									<input type="text" class="form-control" placeholder="ex. http://www.google.com" required="" name="[text-input][link]">
								</div>
							</div>
							<div class="d-md-none kt-margin-b-10"></div>
						</div>
						<div class="col-md-3">
							<div class="kt-form__group--inline">
								<div class="kt-form__label">
									<label>Target:</label>
								</div>
								<div class="kt-form__control">
									<select class="form-control"  name="[text-input][target]" id="target">
										<option value="">Empty</option>
										<option value="_blank">Blank</option>
									</select>
								</div>
							</div>
							<div class="d-md-none kt-margin-b-10"></div>
						</div>
						<div class="col-md-2">
							
							<a href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold">
								<i class="la la-trash-o"></i>
								Delete
							</a>

						</div>
					</div>
				</div>
			</div>
			<div class="form-group form-group-last row">
				<label class="col-lg-2 col-form-label"></label>
				<div class="col-lg-4">
					<a href="javascript:;" data-repeater-create="" class="btn btn-bold btn-sm btn-label-brand">
						<i class="la la-plus"></i> Add
					</a>
				</div>
			</div>
		</div>
		<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
		<h3 class="kt-section__title kt-section__title-lg">Organizers:</h3>

		<div class="form-group row">
			<label for="ministries" class="col-2 col-form-label">Ministries</label>
			<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
				<select class="form-control kt-selectpicker" multiple name="ministries[]" id="ministries">
					@foreach($ministries as $ministry)
					<option value="{{$ministry->id}}">{{$ministry->name}}</option>
					@endforeach


				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="campuses" class="col-2 col-form-label">Campus</label>
			<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
				<select class="form-control kt-selectpicker" multiple name="campus[]" id="campuses">
					@foreach($campuses as $campus)
					<option value="{{$campus->id}}">{{$campus->name}}</option>
					@endforeach
				</select>
			</div>
		</div>



	</div>
	<div class="kt-portlet__foot">
		<div class="row align-items-center">
			<div class="col-lg-6 m--valign-middle">

			</div>
			<div class="col-lg-6 kt-align-right">
				<button type="submit" class="btn btn-brand">Submit</button>

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

"use strict";
// Class definition

var KTSummernoteDemo = function () {    
    // Private functions
    var demos = function () {
    	$('#short_description').summernote({
    		height: 100
    	});
    	$('#description').summernote({
    		height: 200
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


var KTFormRepeater = function() {
	var demo = function() {
		$('#kt_repeater_2').repeater({
			initEmpty: true,

			defaultValues: {
				'text-input': 'button'
			},
			isFirstItemUndeletable: true,
			show: function() {
				$(this).slideDown();                               
			},

			hide: function(deleteElement) {                 
				if(confirm('Are you sure you want to delete this element?')) {
					$(this).slideUp(deleteElement);
				}                                
			}      
		});
	}


	return {
        // public functions
        init: function() {
        	demo();

        }
    };
}();


var KTBootstrapSelect = function () {

    // Private functions
    var demos = function () {
        // minimum setup
        $('.kt-selectpicker').selectpicker();
    }

    return {
        // public functions
        init: function() {
        	demos(); 
        }
    };
}();

jQuery(document).ready(function() {
	KTBootstrapSelect.init();
	KTFormRepeater.init();
});

$('#myForm').on('submit', function(e) {

	if($('#description').summernote('isEmpty'))
	{
		console.log('contents is empty, fill it!');
		e.preventDefault();
	}
});
</script>
@endsection