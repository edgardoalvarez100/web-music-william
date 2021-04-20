@extends('layouts.admin.material')

@section('title', 'video')
@section('subheader','Edit video')

@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-avatar"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Edit video
			</h3>
		</div>
	</div>
	<form class="kt-form kt-form--label-right" action="{{ route('video.update', [$video->serie_id,$video->id])}}" method="POST" enctype="multipart/form-data">
		<div class="kt-portlet__body">
			@csrf

			<div class="form-group row">
				<label for="title" class="col-2 col-form-label">Title</label>
				<div class="col-lg-6 col-sm-10 col-xs-10 col-10">
					<input class="form-control" type="text"  id="title" name="title" required="" value="{{ $video->title}}">
				</div>
			</div>


			<div class="form-group row">
				<label for="date" class="col-2 col-form-label">Date</label>
				<div class="col-lg-3 col-sm-6 col-xs-6 col-6">
					<div class="input-group date">
						<input class="form-control kt_datepicker_3" type="text"  id="date" name="date" required="" autocomplete="off" value="{{$video->date}}">
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
					<input class="form-control" type="text"  id="week" name="week" required="" value="{{ $video->week}}">
				</div>
			</div>

			<div class="form-group row">
				<label for="cover" class="col-2 col-form-label">Cover</label>

				<div class="col-5">
					<img src="{{url('storage/videos/'.$video->cover)}}" style="width: 100%;max-width: 100px;height: 100px;" class="mb-2">
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
                    <input class="form-control" type="text"  id="video" name="video" value="{{ $video->video }}" required>
                </div>
            </div>

			<div class="form-group row">
				<label for="speaker" class="col-2 col-form-label">Speaker</label>
				<div class="col-lg-7 col-sm-10 col-xs-10 col-10">
					<div class="form-group row">
						<div class="col-lg-8 col-sm-8 col-xs-10 col-8">
							<select class="form-control kt-selectpicker" name="speaker_id" id="speaker_id">
								@foreach($speakers as $speaker)
								<option value="{{$speaker->id}}">{{$speaker->name}}</option>
								@endforeach
								@if(count($speakers) == 0)
								<option disabled="" selected="">Add speaker with button</option>
								@endif
							</select>
						</div>
						<div class="col-lg-4 col-sm-4 col-xs-2 col-4">
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
					<textarea class="form-control" type="text"  id="description" name="description">{{ $video->description}}</textarea>
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


	$("#speaker_id option[value='{{ $video->speaker_id}}']").attr("selected",true);
});
</script>

@endsection