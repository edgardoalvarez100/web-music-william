@extends('layouts.admin.material')

@section('title', 'Video')
@section('subheader','Add video')

@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-avatar"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Create video
			</h3>
		</div>
	</div>
	<form class="kt-form kt-form--label-right" method="POST" action="{{route('video.store', $serie->id)}}" enctype="multipart/form-data">
		@csrf
		<div class="kt-portlet__body">

			<div class="form-group row">
				<label for="title" class="col-2 col-form-label">Title</label>
				<div class="col-lg-6 col-sm-10 col-xs-10 col-10">
					<input class="form-control" type="text"  id="title" name="title" required="">
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
				<label for="week" class="col-2 col-form-label">Week</label>
				<div class="col-lg-5 col-sm-10 col-xs-10 col-10">
					<input class="form-control" type="text"  id="week" name="week" required="">
				</div>
			</div>

			<div class="form-group row">
				<label for="cover" class="col-2 col-form-label">Cover</label>

				<div class="col-5">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="cover" name="cover" accept="image/*">

						<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
					</div>
				</div>
			</div>




			<div class="form-group row">
				<label for="notes" class="col-2 col-form-label">Notes</label>

				<div class="col-5">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="notes"  name="notes" accept="application/*">

						<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
					</div>
				</div>
			</div>

			<div class="form-group row">
                <label for="audio" class="col-2 col-form-label">Teaching Audio</label>

                <div class="col-5">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="audio"  name="audio" accept="audio/*">

                        <label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="video" class="col-2 col-form-label">Teaching Video (Url)</label>
                <div class="col-lg-5 col-sm-10 col-xs-10 col-10">
                    <input class="form-control" type="text"  id="video" name="video" required>
                </div>
            </div>


			<div class="form-group row">
				<label for="speaker" class="col-2 col-form-label">Speaker</label>
				<div class="col-lg-8 col-sm-10 col-xs-10 col-10">
					<div class="form-group row">
						<div class="col-lg-7 col-sm-8 col-xs-10 col-8">
							<select class="form-control kt-selectpicker" name="speaker_id" id="speaker_id">
								@foreach($speakers as $speaker)
								<option value="{{$speaker->id}}">{{$speaker->name}}</option>
								@endforeach
								@if(count($speakers) == 0)
								<option disabled="" selected="">Add speaker with button</option>
								@endif
							</select>
						</div>
						<div class="col-lg-5 col-sm-4 col-xs-2 col-4">
							<a class="btn btn-info btn-sm " href="javascript:;" data-toggle="modal" data-target="#kt_modal_4">
								New Speaker
							</a>
						</div>
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




<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">New speaker</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<div class="modal-body">
				<form class="kt-form kt-form--label-right" id="form-speaker">
					@csrf
					<div class="form-group row">
						<label for="name" class="col-2 col-form-label">Name</label>
						<div class="col-lg-10">
							<input class="form-control" type="text"  id="name" name="name" required="">
						</div>
					</div>

					<div class="form-group row">
						<label for="featured" class="col-2 col-form-label">Featured</label>
						<div class="col-10">
							<span class="kt-switch kt-switch--icon">
								<label>
									<input type="checkbox" name="featured" id="featured" >
									<span></span>
								</label>
							</span>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="btn-speaker">Save</button>
			</div>
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

	$(document).on('click','#btn-speaker',function(){
		var form = $('#form-speaker');
		var name = form.find("input[name='name']");

		if(name.val() === ''){
			swal.fire({
				"title": "",
				"text": "There are some errors in your submission. Please correct them.",
				"type": "error",
				"confirmButtonClass": "btn btn-secondary",
				"onClose": function(e) {
					console.log('on close event fired!');
				}
			});
		}else{
			var jqxhr = $.post( "{{ route('speaker.addform') }}", form.serialize())
			.done(function(data) {
				console.log(data.success);
				$("#speaker_id").html(data.html);
				$("#kt_modal_4").modal('hide');
				form.trigger("reset");
			})
			.fail(function(err) {
				alert( "error:"+ err);
			})
			.always(function() {

			});
		}


	});

});


</script>

@endsection