@extends('layouts.admin.material')

@section('title', 'Events')
@section('subheader','View Event')

@section('content')

<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-avatar"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Details Event
			</h3>
		</div>
	</div>

	<div class="kt-portlet__body kt-form kt-form--label-right">

		<div class="form-group row">
			<label for="example-text-input" class="col-2 col-form-label">Title</label>
			<div class="col-lg-6 col-sm-10 col-xs-10 col-10">
				<input class="form-control" type="text"  id="example-text-input" name="name" value="{{ $event->title}}" disabled="">
			</div>
		</div>

		<div class="form-group row">
			<label for="example-text-input" class="col-2 col-form-label">Slug</label>
			<div class="col-lg-6 col-sm-10 col-xs-10 col-10">
				<input class="form-control" type="text"  id="example-text-input" name="name" value="{{ $event->slug}}" disabled="">
			</div>
		</div>

		<div class="form-group row">
			<label for="example-text-input" class="col-2 col-form-label">Publication Start Date</label>
			<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
				<input class="form-control" type="text"  id="example-text-input" name="address" value="{{ $event->start_date}}" disabled="">
			</div>
		</div>

		<div class="form-group row">
			<label for="example-text-input" class="col-2 col-form-label">Publication End Date</label>
			<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
				<input class="form-control" type="text"  id="example-text-input" name="city"  value="{{ $event->end_date}}" disabled="">
			</div>
		</div>

		<div class="form-group row">
			<label for="example-text-input" class="col-2 col-form-label">Event Start Date</label>
			<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
				<input class="form-control" type="text"  id="example-text-input" name="city"  value="{{ $event->end_date}}" disabled="">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="example-text-input" class="col-2 col-form-label">Date in Text</label>
			<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
				<input class="form-control" type="text"  id="example-text-input" name="state" value="{{ $event->date_in_text}}" disabled="">
			</div>
		</div>

		<div class="form-group row">
			<label  class="col-2 col-form-label">Time</label>
			<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
				<input class="form-control" type="text"  id="example-text-input" name="country" value="{{ $event->time}}" disabled="" >
			</div>

		</div>

		<div class="form-group row">
			<label for="example-text-input" class="col-2 col-form-label">Location</label>
			<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
				<input class="form-control" type="text"  id="example-text-input" name="zip" value="{{ $event->location->name}}" disabled="">
			</div>
		</div>

		<div class="form-group row">
			<label for="example-text-input" class="col-2 col-form-label">Short Description</label>
			<div class="col-10">
				<textarea class="form-control" type="text"  id="short_description" name="gmap"  rows="3"  disabled="">{{ $event->short_description}}</textarea>
			</div>
		</div>

		<div class="form-group row">
			<label for="example-text-input" class="col-2 col-form-label">Description</label>
			<div class="col-10">
				<textarea class="form-control" type="text"  id="description" name="gmap"  rows="3"  disabled="">{{ $event->description}}</textarea>
			</div>
		</div>

		<div class="form-group row">
			<label for="image" class="col-2 col-form-label">Image</label>

			<div class="col-8">
				<img src="{{url('storage/events/'.$event->image)}}" class="img-thumbnail img-fluid" >
			</div>
		</div>

		<div class="form-group row">
			<label for="featured" class="col-2 col-form-label">Featured</label>
			<div class="col-10">
				<span class="kt-switch kt-switch--icon">
					<label>
						<input type="checkbox" name="featured" id="featured" @if($event->featured) checked @endif disabled="">
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
				<input class="form-control" type="text"  id="currency" name="currency" disabled="" value="{{$event->currency}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="price" class="col-2 col-form-label">Price</label>
			<div class="col-lg-4 col-sm-10 col-xs-10 col-10">
				<input class="form-control" type="text"  id="price" name="price" disabled="" value="{{$event->price}}">
			</div>
		</div>

		<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
		<h3 class="kt-section__title kt-section__title-lg">Links:</h3>
		<div class="form-group row">
			<label for="" class="col-2 col-form-label"></label>

			<div  class="col-lg-10" id="list-button">
				@foreach($event->buttons as $button)
				<form class="item-button" >

					<div  class="form-group row align-items-center">
						<div class="col-md-2">
							<div class="kt-form__group--inline">
								<div class="kt-form__label">
									<label>Text:</label>
								</div>
								<div class="kt-form__control">
									<input type="text" class="form-control" autocomplete="off" required="" name="text" value="{{$button->text}}" disabled="">
								</div>
							</div>
							<div class="d-md-none kt-margin-b-10"></div>
						</div>
						<div class="col-md-5">
							<div class="kt-form__group--inline">
								<div class="kt-form__label">
									<label>Link:</label>
								</div>
								<div class="kt-form__control">
									<input type="text" class="form-control" autocomplete="off" required="" name="link" value="{{$button->link}}" disabled="">
								</div>
							</div>
							<div class="d-md-none kt-margin-b-10"></div>
						</div>
						<div class="col-md-2">
							<div class="kt-form__group--inline">
								<div class="kt-form__label">
									<label>Target:</label>
								</div>
								<div class="kt-form__control">
									<select class="form-control"  name="target" id="target" disabled="">
										<option value="" @if($button->target == null) selected @endif>Empty</option>
										<option value="_blank" @if($button->target == "_blank") selected @endif>Blank</option>
									</select>
								</div>
							</div>
							<div class="d-md-none kt-margin-b-10"></div>
						</div>

						<div class="col-md-3 pt-4">
							<a href="javascript:;"  class="btn-sm btn btn-label-info btn-bold btn-edit">
								<i class="la la-edit"></i>
								Edit
							</a>
							<a href="javascript:;"  class="btn-sm btn btn-label-success btn-bold btn-update d-none">
								<i class="la la-edit"></i>
								Update
							</a>
							<a href="javascript:;"  class="btn-sm btn btn-label-danger btn-bold btn-delete">
								<i class="la la-trash-o"></i>
								Delete
							</a>
						</div>
					</div>
					@csrf
					<input type="hidden" name="id" value="{{$button->id}}" />
					<input type="hidden" name="event_id" value="{{$event->id}}" />
				</form>
				@endforeach

				<form class="item-button clone-item d-none">

					<div  class="form-group row align-items-center">
						<div class="col-md-2">
							<div class="kt-form__group--inline">
								<div class="kt-form__label">
									<label>Text:</label>
								</div>
								<div class="kt-form__control">
									<input type="text" class="form-control" autocomplete="off" required="" name="text" placeholder="ex. More info">
								</div>
							</div>
							<div class="d-md-none kt-margin-b-10"></div>
						</div>
						<div class="col-md-5">
							<div class="kt-form__group--inline">
								<div class="kt-form__label">
									<label>Link:</label>
								</div>
								<div class="kt-form__control">
									<input type="text" class="form-control" autocomplete="off" required="" name="link" placeholder="ex. http://google.com">
								</div>
							</div>
							<div class="d-md-none kt-margin-b-10"></div>
						</div>
						<div class="col-md-2">
							<div class="kt-form__group--inline">
								<div class="kt-form__label">
									<label>Target:</label>
								</div>
								<div class="kt-form__control">
									<select class="form-control"  name="target" id="target">
										<option value="" >Empty</option>
										<option value="_blank" >Blank</option>
									</select>
								</div>
							</div>
							<div class="d-md-none kt-margin-b-10"></div>
						</div>

						<div class="col-md-3 pt-4">
							<a href="javascript:;"  class="btn-sm btn btn-label-success btn-bold btn-add">
								<i class="la la-edit"></i>
								Save
							</a>
							<a href="javascript:;"  class="btn-sm btn btn-label-danger btn-bold btn-destroy">
								<i class="la la-trash-o"></i>
								Delete
							</a>
							<a href="javascript:;"  class="btn-sm btn btn-label-info btn-bold btn-edit d-none">
								<i class="la la-edit"></i>
								Edit
							</a>
							<a href="javascript:;"  class="btn-sm btn btn-label-success btn-bold btn-update d-none">
								<i class="la la-edit"></i>
								Update
							</a>
							<a href="javascript:;"  class="btn-sm btn btn-label-danger btn-bold btn-delete d-none">
								<i class="la la-trash-o"></i>
								Delete
							</a>
						</div>
					</div>
					@csrf
					<input type="hidden" name="id" value="" />
					<input type="hidden" name="event_id" value="{{$event->id}}" />				
				</form>

			</div>
		</div>

		<div class="form-group form-group-last row">
			<label class="col-lg-2 col-form-label"></label>
			<div class="col-lg-4">
				<a href="javascript:;"  class="btn btn-bold btn-sm btn-label-brand button-add">
					<i class="la la-plus"></i> Add
				</a>
			</div>
		</div>

		<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
		<h3 class="kt-section__title kt-section__title-lg">Organizers:</h3>


		<div class="form-group row">
			<label for="currency" class="col-2 col-form-label">Ministries</label>
			<div class="col-lg-6 col-sm-10 col-xs-10 col-10">
				@foreach($event->ministries as $ministry)
				<div class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill kt-badge--lg kt-badge--rounded">{{$ministry->name}}</div>
				@endforeach
			</div>
		</div>
		<div class="form-group row">
			<label for="price" class="col-2 col-form-label">Campus</label>
			<div class="col-lg-6 col-sm-10 col-xs-10 col-10">
				@foreach($event->campuses as $campus)
				<div class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill kt-badge--lg kt-badge--rounded">{{$campus->name}}</div>
				@endforeach
			</div>
		</div>

		<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
		<div class="form-group row">
			<label for="example-text-input" class="col-2 col-form-label">Created by</label>
			<div class="col-10">
				<input class="form-control" type="text"  id="example-text-input" name="created" value="{{ $event->creator->name}}" disabled="">
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-2 col-form-label">Created at</label>
			<div class="col-10">
				<input class="form-control" type="text"  id="example-text-input" name="created" value="{{ $event->created_at}}" disabled="">
			</div>
		</div>



	</div>
	<div class="kt-portlet__foot">
		<div class="row align-items-center">
			<div class="col-lg-6 m--valign-middle">

			</div>
			<div class="col-lg-6 kt-align-right">
				<a class="btn btn-primary" href="{{route('event.edit',$event->id)}}" role="button">Edit</a> <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-clean btn-icon-sm">
					<i class="la la-long-arrow-left"></i>
					Back
				</a>
			</div>
		</div>
	</div>
</div>

@endsection
@section('script')
<script type="text/javascript">
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


//clone button form
$(document).on('click','.button-add',function(){
	var clone = $('.clone-item').clone();
	clone.removeClass('clone-item');
	clone.removeClass('d-none');
	clone.appendTo( "#list-button" );
});

$(document).on('click','.btn-destroy',function(){
	var form = $(this).parent().parent().parent();
	form.remove();
});

$(document).on('click','.btn-add',function(){
	
	var form = $(this).parent().parent().parent();
	var btAdd = $(this);
	var btEdit = $(this).siblings('.btn-edit');
	var btDelete = $(this).siblings('.btn-delete');
	var btDestroy = $(this).siblings('.btn-destroy');

	var text = form.find("input[name='text']");
	var link = form.find("input[name='link']");
	var id = form.find("input[name='id']");

	if(text.val() === ''){
		swal.fire({
			"title": "", 
			"text": "There are some errors in your submission. Please correct them.", 
			"type": "error",
			"confirmButtonClass": "btn btn-secondary",
			"onClose": function(e) {
				console.log('on close event fired!');
			}
		});
	}else if(link.val() === ''){
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
		var jqxhr = $.post( "{{ route('button.store') }}", form.serialize())
		.done(function(data) {
			swal.fire({
				"title": "", 
				"text": data.success, 
				"type": "success",
				"confirmButtonClass": "btn btn-secondary"
			});
			id.val(data.button);
			form.find('input, textarea, button, select').attr('disabled', true);
			btDelete.removeClass('d-none');		
			btEdit.removeClass('d-none');
			btAdd.addClass('d-none');
			btDestroy.addClass('d-none');
		})
		.fail(function() {
			alert( "error" );
		})
		.always(function() {
			
		});
	}

});


$(document).on('click','.btn-edit',function(){
	var btUpdate = $(this).siblings('.btn-update');
	var btDelete = $(this).siblings('.btn-delete');
	btUpdate.removeClass('d-none');
	btDelete.addClass('d-none');
	$(this).addClass('d-none');
	var form = $(this).parent().parent().parent();
	form.find('input, textarea, button, select').attr('disabled', false);
});


$(document).on('click','.btn-update',function(){
	$(this).attr('disabled',true);
	var btUpdate = $(this);
	var btDelete = $(this).siblings('.btn-delete');
	var btEdit = $(this).siblings('.btn-edit');

	var form = $(this).parent().parent().parent();

	var text = form.find("input[name='text']");
	var link = form.find("input[name='link']");
	var _token = form.find("input[name='_token']");
	
	if(text.val() === ''){
		swal.fire({
			"title": "", 
			"text": "There are some errors in your submission. Please correct them.", 
			"type": "error",
			"confirmButtonClass": "btn btn-secondary",
			"onClose": function(e) {
				console.log('on close event fired!');
			}
		});
	}else if(link.val() === ''){
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
		var jqxhr = $.post( "{{ route('button.update') }}", form.serialize())
		.done(function(data) {
			swal.fire({
				"title": "", 
				"text": data.success, 
				"type": "success",
				"confirmButtonClass": "btn btn-secondary"
			});

			form.find('input, textarea, button, select').attr('disabled', true);
			btDelete.removeClass('d-none');
			btUpdate.addClass('d-none');
			btEdit.removeClass('d-none');
		})
		.fail(function() {
			alert( "error" );
		})
		.always(function() {
			
		});
	}
});


$(document).on('click','.btn-delete',function(){
	
	var form = $(this).parent().parent().parent();
	
	var jqxhr = $.post( "{{ route('button.destroy') }}", form.serialize())
	.done(function(data) {
		swal.fire({
			"title": "", 
			"text": data.success, 
			"type": "success",
			"confirmButtonClass": "btn btn-secondary"
		});

		form.remove();

	})
	.fail(function() {
		alert( "error" );
	})
	.always(function() {

	});
});

</script>
@endsection