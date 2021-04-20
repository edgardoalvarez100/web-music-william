@extends('layouts.admin.material')

@section('title', 'Stories')
@section('subheader','Edit story')

@section('content')

<div class="row">
	<div class="col-lg-12">
		

		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head kt-portlet__head--lg">
				<div class="kt-portlet__head-label">
					<span class="kt-portlet__head-icon">
						<i class="kt-font-brand flaticon2-avatar"></i>
					</span>
					<h3 class="kt-portlet__head-title">
						Edit story
					</h3>
				</div>
			</div>
			<form class="kt-form kt-form--label-right" action="{{ route('story.update', $story)}}" method="POST" enctype="multipart/form-data">
				{{ method_field('PUT') }}
				<div class="kt-portlet__body">
					@csrf
					<div class="form-group row {{ $errors->has('name') ? 'validated' : '' }}">
						<label for="name" class="col-2 col-form-label">Name</label>
						<div class="col-lg-7 col-sm-10 col-xs-10 col-10">
							<input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"  id="name" name="name" value="{{ old('name',$story->name) }}" >
							{!! $errors->first('name','<div class="invalid-feedback">:message</div>') !!}
							
						</div>
					</div>

					<div class="form-group row {{ $errors->has('email') ? 'validated' : '' }}">
						<label for="email" class="col-2 col-form-label">Email</label>
						<div class="col-lg-7 col-sm-10 col-xs-10 col-10">
							<input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"  id="email" name="email" required="" value="{{ old('email',$story->email) }}">
							{!! $errors->first('slug','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</div>
					
					
					<div class="form-group row {{ $errors->has('body') ? 'is-invalid' : '' }}">
						<label for="description" class="col-2 col-form-label">Message</label>
						<div class="col-10">
							<textarea class="form-control" type="text"  id="description" name="body">{{ old('body',$story->body) }}</textarea>
							{!! $errors->first('body','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</div>

					<div class="form-group row ">
						<label for="has_comments" class="col-2 col-form-label">Allow comments</label>
						<div class="col-lg-7 col-sm-10 col-xs-10 col-10">
							<select class="form-control kt-selectpicker" name="status_id">
								<option value="4" {{ old('status_id', $story->status_id) === 4 ? 'selected' : '' }}  >Public</option>
								<option value="5" {{ old('status_id', $story->status_id) === 5 ? 'selected': '' }}>Private</option>
							</select>
							
						</div>
					</div>

				</div>
				<div class="kt-portlet__foot">
					<div class="row align-items-center">
						<div class="col-lg-6 m--valign-middle">

						</div>
						<div class="col-lg-6 kt-align-right">
							<button type="submit" class="btn btn-brand">Update</button> 
						</div>
					</div>
				</div>
			</form>
		</div>

	
	</div>
	
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
	orientation: 'bottom',
	format: 'dd-mm-yyyy',
});

// enable clear button for modal demo
$('.kt_datepicker_3_modal').datepicker({
	rtl: KTUtil.isRTL(),
	todayBtn: "linked",
	clearBtn: true,
	todayHighlight: true,
	templates: arrows,
	orientation: 'bottom',
	format: 'dd-mm-yyyy',
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
	// multi select
	$('#kt_select2_3, #kt_select2_3_validate').select2({
		tags : true
	});
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

"use strict";
// Class definition

var KTDropzoneDemo = function () {    
    // Private functions
    var demos = function () {
        // single file upload
        var zone = new Dropzone ( '#kDropzoneOne',{
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 2, // MB
            addRemoveLinks: false,
            acceptedFiles : 'image/*',
            headers : {
            	'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }   
        });

        zone.on('error',function(file, res){
        	$('.dz-error-message:last > span').text(res.errors.file[0])
        });

        Dropzone.autoDiscover = false;

    }

    return {
        // public functions
        init: function() {
        	demos(); 
        }
    };
}();

KTDropzoneDemo.init();

</script>

@endsection