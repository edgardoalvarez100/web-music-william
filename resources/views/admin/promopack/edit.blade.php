@extends('layouts.admin.material')

@section('title', 'Serie')
@section('subheader','Edit Serie')

@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-avatar"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Edit Serie
			</h3>
		</div>
	</div>
	<form class="kt-form kt-form--label-right" action="{{ route('serie.update', $serie->id)}}" method="POST" enctype="multipart/form-data">
		<div class="kt-portlet__body">
			@csrf
			<div class="form-group row">
				<label for="name" class="col-2 col-form-label">Name</label>
				<div class="col-lg-6 col-sm-10 col-xs-10 col-10">
					<input class="form-control" type="text"  id="name" name="name" value="{{ $serie->name}}" >
				</div>
			</div>
			
			<div class="form-group row">
				<label for="homepage" class="col-2 col-form-label">Homepage Box</label>

				<div class="col-5">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="homepage"  name="homepage" accept="image/*"  value="{{$serie->homepage}}">

						<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
						<span class="text-unmted">if you upload a new image it will be replaced</span>
					</div>
				</div>
			</div>

			@if ($serie->homepage)
			<input type="hidden" name="homepage_" value="{{$serie->homepage}}" />
			@endif

			<div class="form-group row">
				<label for="topbanner" class="col-2 col-form-label">Top banner</label>

				<div class="col-5">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="topbanner"  name="topbanner" accept="image/*"  value="{{$serie->topbanner}}">

						<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
						<span class="text-unmted">if you upload a new image it will be replaced</span>
					</div>
				</div>
			</div>

			@if ($serie->topbanner)
			<input type="hidden" name="topbanner_" value="{{$serie->topbanner}}" />
			@endif

			<div class="form-group row">
				<label for="cover" class="col-2 col-form-label">Cover</label>

				<div class="col-5">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="cover"  name="cover" accept="image/*" value="{{$serie->cover}}">

						<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
						<span class="text-unmted">if you upload a new image it will be replaced</span>
					</div>
				</div>
			</div>

			@if ($serie->cover)
			<input type="hidden" name="cover_" value="{{$serie->cover}}" />
			@endif

			<div class="form-group row">
				<label for="description" class="col-2 col-form-label">Description</label>
				<div class="col-10">
					<textarea class="form-control" type="text"  id="description" name="description">{{$serie->description}}</textarea>
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
	</div>
</form>
@endsection
@section('script')

<script type="text/javascript">
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