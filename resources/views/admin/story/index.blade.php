@extends('layouts.admin.material')

@section('title', 'Stories')
@section('subheader','List Stories')

@section('content')


<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand fa fa-list"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				List Stories
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
					<div class="dropdown dropdown-inline">
						
					</div>
					&nbsp;
					<a href="#" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#kt_modal_1">
						<i class="la la-plus"></i>
						New Story
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body">

		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
			<thead>
				<tr>
					<th>ID</th>
					<th>AUTOR</th>
					<th>MESSAGE</th>
					<th>VISIBILITY</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>

				@foreach($stories as $story)
				<tr>
					
					<td>{{ $story->id }}</td>
					<td><strong>{{ $story->name }}</strong> <br> {{$story->email}} <br> {{$story->ip}}</td>
					<td>{!! $story->body !!}</td>
					<td>
						{{ $story->status->name }}
					</td>
					<td nowrap>

						<a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md" href="{{route('story.edit',$story)}}">
							<i class="la la-edit"></i>
						</a>
						<form action="{{ route('story.destroy',$story->id) }}" method="POST" class="d-inline">
							{{ method_field('DELETE') }}
							{{ csrf_field() }}
							<button title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">
								<i class="la la-trash"></i>
							</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		<!--end: Datatable -->
	</div>
</div>

<form class="kt-form kt-form--label-right" method="POST" action="{{route('story.store')}}">
	<div class="modal modal-stick-to-bottom fade" id="kt_modal_1" role="dialog" data-backdrop="false" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Story</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div class="modal-body">   
					@csrf
					<div class="form-group row">
						<label for="example-text-input" class="col-2 col-form-label">Name</label>
						<div class="col-10">
							<input class="form-control" type="text" name="name" required="" placeholder="Name" id="name">
						</div>
					</div>

					<div class="form-group row">
						<label for="example-text-input" class="col-2 col-form-label">Email</label>
						<div class="col-10">
							<input class="form-control" type="email" name="email" required="" placeholder="Email" id="email">
						</div>
					</div>

					<div class="form-group row">
						<label for="example-text-input" class="col-2 col-form-label">Message</label>
						<div class="col-10">
							<textarea class="form-control" type="text"  id="description" name="body" required=""></textarea>
						</div>
					</div>

					<div class="form-group row">
						<label for="example-text-input" class="col-2 col-form-label">Visibility</label>
						<div class="col-10">
							<select class="form-control kt-selectpicker" name="status_id">
								<option value="4">Public</option>
								<option value="5">Private</option>
							</select>
						</div>
					</div>


				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection

@section('script')
<script src="./assets_admin/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
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


"use strict";
var KTDatatablesBasicBasic = function() {

	var initTable1 = function() {
		var table = $('#kt_table_1');

		// begin first table
		table.DataTable({
			responsive: true,



			lengthMenu: [5, 10, 25, 50],

			pageLength: 10,

			language: {
				'lengthMenu': 'Display _MENU_',
			},

			// Order settings
			order: [[0, 'desc']],


		});

		table.on('change', '.kt-group-checkable', function() {
			var set = $(this).closest('table').find('td:first-child .kt-checkable');
			var checked = $(this).is(':checked');

			$(set).each(function() {
				if (checked) {
					$(this).prop('checked', true);
					$(this).closest('tr').addClass('active');
				}
				else {
					$(this).prop('checked', false);
					$(this).closest('tr').removeClass('active');
				}
			});
		});

		table.on('change', 'tbody tr .kt-checkbox', function() {
			$(this).parents('tr').toggleClass('active');
		});
	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesBasicBasic.init();


	$('#kt_modal_1').on('shown.bs.modal',function(){
		$('#title').focus();
	});
});
</script>
@endsection