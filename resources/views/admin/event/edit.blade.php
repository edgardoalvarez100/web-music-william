@extends('layouts.admin.material')

@section('title', 'Event')
@section('subheader','Edit Event')

@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-avatar"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Edit Event
			</h3>
		</div>
	</div>
	<form class="kt-form kt-form--label-right" action="{{ route('event.update', $event->id)}}" method="POST" enctype="multipart/form-data">
		<div class="kt-portlet__body">
			@csrf
			<div class="form-group row">
				<label for="title" class="col-2 col-form-label">Title</label>
				<div class="col-lg-6 col-sm-10 col-xs-10 col-10">
					<input class="form-control" type="text"  id="title" name="title" value="{{ $event->title}}" >
				</div>
			</div>

			<div class="form-group row">
				<label for="slug" class="col-2 col-form-label">Slug</label>
				<div class="col-lg-6 col-sm-10 col-xs-10 col-10">
					<input class="form-control" type="text"  id="slug" name="slug" value="{{ $event->slug}}" >
				</div>
			</div>

			<div class="form-group row">
				<label for="start_date" class="col-2 col-form-label">Publication Start Date</label>
				<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
					<div class="input-group date">
						<input class="form-control kt_datepicker_3" type="text"  id="start_date" name="start_date" required=""  autocomplete="off" value="{{ $event->start_date}}">
						<div class="input-group-append">
							<span class="input-group-text">
								<i class="la la-calendar"></i>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label for="end_date" class="col-2 col-form-label">Publication End Date</label>
				<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
					<div class="input-group date">
						<input class="form-control kt_datepicker_3" type="text"  id="end_date" name="end_date" required=""  autocomplete="off" value="{{ $event->end_date}}">
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
					<input class="form-control kt_datepicker_3" type="text"  id="start_date_event" name="start_date_event" required=""  autocomplete="off" value="{{ $event->start_date_event }}">
					<div class="input-group-append">
						<span class="input-group-text">
							<i class="la la-calendar"></i>
						</span>
					</div>
				</div>
			</div>
			</div>

			<div class="form-group row">
				<label for="date_in_text" class="col-2 col-form-label">Date in Text</label>
				<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
					<input class="form-control" type="text"  id="dateintext" name="date_in_text" placeholder="ex. Feb 2 - 4" autocomplete="off" value="{{ $event->date_in_text}}">
				</div>
			</div>

			<div class="form-group row">
				<label  class="col-2 col-form-label" for="time">Time</label>
				<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
					<input class="form-control" type="text"  id="time" name="time" value="{{ $event->time}}"  >
				</div>
				
			</div>

			<div class="form-group row">
				<label for="location" class="col-2 col-form-label">Location</label>
				<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
					<select class="form-control kt-selectpicker" name="location" id="location">
						@foreach($locations as $location)
						<option value="{{$location->id}}">{{$location->name}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label for="short_description" class="col-2 col-form-label">Short Description</label>
				<div class="col-10">
					<textarea class="form-control" type="text"  id="short_description" name="short_description"  rows="3"  >{{ $event->short_description}}</textarea>
				</div>
			</div>

			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Description</label>
				<div class="col-10">
					<textarea class="form-control" type="text"  id="description" name="description"  rows="3"  >{{ $event->description}}</textarea>
				</div>
			</div>

			<div class="form-group row">
				<label for="image" class="col-2 col-form-label">Image</label>

				<div class="col-6">
					<img src="{{url('storage/events/'.$event->image)}}"  id="image" class="mb-2 img-fluid">
					<div class="custom-file">

						<input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
						<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
						<span class="text-unmted">if you upload a new image it will be replaced</span>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label for="featured" class="col-2 col-form-label">Featured</label>
				<div class="col-10">
					<span class="kt-switch kt-switch--icon">
						<label>
							<input type="checkbox" name="featured" id="featured" @if($event->featured) checked @endif >
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
					<input class="form-control" type="text"  id="currency" name="currency"  value="{{$event->currency}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="price" class="col-2 col-form-label">Price</label>
				<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
					<input class="form-control" type="text"  id="price" name="price"  value="{{$event->price}}">
				</div>
			</div>

			
			<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
			<h3 class="kt-section__title kt-section__title-lg">Organizers:</h3>


			<div class="form-group row">
				<label for="currency" class="col-2 col-form-label">Ministries</label>
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
});
@foreach($event->ministries as $ministry)
$("#ministries option[value='{{ $ministry->id}}']").attr("selected",true);
@endforeach

@foreach($event->campuses as $campus)
$("#campuses option[value='{{ $campus->id}}']").attr("selected",true);
@endforeach

$("#location option[value='{{ $event->location_id}}']").attr("selected",true);

</script>
@endsection