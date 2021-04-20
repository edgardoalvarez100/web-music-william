@extends('layouts.admin.material')

@section('title', 'Post')
@section('subheader','Edit post')

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
						Edit post
					</h3>
				</div>
			</div>
			<form class="kt-form kt-form--label-right" action="{{ route('post.update', $post)}}" method="POST" enctype="multipart/form-data">
				{{ method_field('PUT') }}
				<div class="kt-portlet__body">
					@csrf
					<div class="form-group row {{ $errors->has('title') ? 'validated' : '' }}">
						<label for="title" class="col-2 col-form-label">Title</label>
						<div class="col-lg-7 col-sm-10 col-xs-10 col-10">
							<input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"  id="title" name="title" value="{{ old('title',$post->title) }}" >
							{!! $errors->first('title','<div class="invalid-feedback">:message</div>') !!}
							
						</div>
					</div>

					<div class="form-group row {{ $errors->has('slug') ? 'validated' : '' }}">
						<label for="slug" class="col-2 col-form-label">Slug</label>
						<div class="col-lg-7 col-sm-10 col-xs-10 col-10">
							<input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text"  id="slug" name="slug" required="" value="{{ old('slug',$post->slug) }}">
							{!! $errors->first('slug','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</div>
					<div class="form-group row {{ $errors->has('published_at') ? 'validated' : '' }}">
						<label for="date" class="col-2 col-form-label">Published At</label>
						<div class="col-lg-5 col-sm-10 col-xs-10 col-10">
							<div class="input-group date">
								<input class="form-control kt_datepicker_3" type="text"  id="date" name="published_at" autocomplete="off" value="{{ old('published_at',$post->published_at) }}">
								<div class="input-group-append">
									<span class="input-group-text">
										<i class="la la-calendar"></i>
									</span>
								</div>
							</div>
							<span class="form-text text-muted">If the field is empty, the post will not be shown on the blog.</span>
						</div>
					</div>
					
					<div class="form-group row {{ $errors->has('body') ? 'is-invalid' : '' }}">
						<label for="description" class="col-2 col-form-label">Description</label>
						<div class="col-10">
							<textarea class="form-control" type="text"  id="description" name="body">{{ old('body',$post->body) }}</textarea>
							{!! $errors->first('body','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</div>

					<div class="form-group row {{ $errors->has('iframe') ? 'validated' : '' }}">
						<label for="description" class="col-2 col-form-label">Iframe</label>
						<div class="col-10">
							<textarea class="form-control {{ $errors->has('iframe') ? 'is-invalid' : '' }}" type="text"  id="iframe" name="iframe">{{ old('iframe',$post->iframe) }}</textarea>
							{!! $errors->first('iframe','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</div>

					<div class="form-group row {{ $errors->has('tags') ? 'validated' : '' }}">
						<label for="has_comments" class="col-2 col-form-label">Tags</label>
						<div class="col-lg-7 col-sm-10 col-xs-10 col-10">
							<select id="kt_select2_3" multiple="multiple" class="w-100 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" >
								@foreach($tags as $tag)
								<option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected ' : '' }} value="{{ $tag->id }}" >{{ $tag->name }}</option>
								@endforeach
							</select>

							{!! $errors->first('tags','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</div>



					<div class="form-group row {{ $errors->has('has_comments') ? 'validated' : '' }}">
						<label for="has_comments" class="col-2 col-form-label">Allow comments</label>
						<div class="col-lg-7 col-sm-10 col-xs-10 col-10">
							<span class="kt-switch">
								<label>
									<input type="checkbox" name="has_comments" {{ old('has_comments', $post->has_comments)  ? ' checked' : '' }}>
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
							<button type="submit" class="btn btn-brand">Update</button> 
						</div>
					</div>
				</div>
			</form>
		</div>

		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head kt-portlet__head--lg">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">Images</h3>
				</div>
			</div>

			
			<div class="kt-portlet__body">
				<div class="row">
					<div class="col-md-12">
						<div class="kt-dropzone dropzone" action="{{ route('photo.store', $post) }}" id="kDropzoneOne">
							<div class="kt-dropzone__msg dz-message needsclick">
								<h3 class="kt-dropzone__msg-title">Drop files here or click to upload.</h3>
								<span class="kt-dropzone__msg-desc">Only format is allowed.
								</span>
							</div>
						</div>
					</div>

				</div>

				<div class="row py-2">
					@foreach($post->images as $imagen)
					<div class="col-sm">
						<form method="POST" action="{{route('photo.destroy', $imagen->id)}}">
							@csrf
							{{ method_field('DELETE') }}
							<button class="btn btn-danger btn-sm btn-icon btn-elevate" style="position: absolute;">
								<i class="la la-trash"></i>
							</button>
							<img class="img-fluid m-2" src="{{ $imagen->url }}" />
						</form>

					</div>
					@endforeach
				</div>
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