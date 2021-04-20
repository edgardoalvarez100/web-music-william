@extends('layouts.admin.material')

@section('title', 'Job')
@section('subheader','Add job')

@section('content')
<div class="kt-portlet kt-portlet--mobile col-xl-8">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-avatar"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Create Job
			</h3>
		</div>
	</div>
	<form class="kt-form kt-form--label-right" method="POST" action="{{route('job.store')}}" enctype="multipart/form-data">
		@csrf
		<div class="kt-portlet__body">
			
			<div class="form-group row">
				<label for="title" class="col-2 col-form-label">Title</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="title" name="title" required="" >
				</div>
            </div>
            
            <div class="form-group row">
                <label for="type" class="col-2 col-form-label">Type</label>
                <div class="col-lg-4 col-sm-10 col-xs-10 col-10">
                    <select class="form-control kt-selectpicker"  name="type" id="type" >
                        <option value="full-time">Full-time</option>
                        <option value="part-time">Part-time</option>
                        <option value="temporary">Temporary</option>
                        <option value="freelance">Freelance</option>
                      
                    </select>
                </div>
            </div>

            <div class="form-group row">
				<label for="description" class="col-2 col-form-label">Description</label>
				<div class="col-10">
					<textarea class="form-control" type="text"  id="description" name="description"  rows="3"></textarea>
				</div>
			</div>

			<div class="form-group row">
                <label for="publication_startdate" class="col-form-label col-2">Publication Start Date</label>
                <div class="col-lg-4 col-sm-10 col-xs-10 col-10">
                    <div class="input-group date">
                        <input class="form-control kt_datepicker_3" type="text"  id="publication_startdate" name="publication_startdate" required=""  autocomplete="off">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="la la-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="form-group row">
                <label for="publication_enddate" class="col-form-label col-2">Publication End Date</label>
                <div class="col-lg-4 col-sm-10 col-xs-10 col-10">
                    <div class="input-group date">
                        <input class="form-control kt_datepicker_3" type="text"  id="publication_enddate" name="publication_enddate" required=""  autocomplete="off">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="la la-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
			<div class="form-group row">
				<label for="location" class="col-2 col-form-label">Location</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="location" name="location" required="" placeholder="ex. Chandler, AZ" >
				</div>
			</div>

			<div class="form-group row">
				<label for="email_notification" class="col-2 col-form-label">Email Notification</label>
				<div class="col-10">
					<input class="form-control" type="email"  id="email_notification" name="email_notification" required="" placeholder="">
				</div>
            </div>

			<div class="form-group row">
                <label for="image" class="col-2 col-form-label">Image</label>
    
                <div class="col-5">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image"  name="image" accept="image/*">
    
                        <label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="file" class="col-2 col-form-label">File</label>
    
                <div class="col-5">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file"  name="file" accept="application/pdf,application/msword,.docx">
    
                        <label class="custom-file-label" for="file" style="text-align: left;">Choose file</label>
                    </div>
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
					
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
@section('script')
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


"use strict";
// Class definition

var KTSummernoteDemo = function () {    
    // Private functions
    var demos = function () {
    
    	$('#description').summernote({
    		height: 300
    	});
    }

    return {
        // public functions
        init: function() {
        	demos(); 
        }
    };
}();

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
$('.kt_datepicker_3, .kt_datepicker_3_validate').datetimepicker({
rtl: KTUtil.isRTL(),
autoclose:!0,
todayBtn: "linked",
pickerPosition: 'bottom-left',
clearBtn: true,
todayHighlight: true,
templates: arrows,
format: 'yyyy-mm-dd hh:ii',
});

// enable clear button for modal demo
$('.kt_datepicker_3_modal').datetimepicker({
rtl: KTUtil.isRTL(),
pickerPosition: 'bottom-left',
todayBtn: "linked",
autoclose:!0,
clearBtn: true,
todayHighlight: true,
templates: arrows,
format: 'yyyy-mm-dd hh:ii',
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
    KTBootstrapDatepicker.init();
    KTSummernoteDemo.init();

});





</script>
@endsection