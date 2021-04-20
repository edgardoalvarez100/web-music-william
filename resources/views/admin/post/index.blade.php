@extends('layouts.admin.material')

@section('title', 'Posts')
@section('subheader','List posts')

@section('content')


<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand fa fa-list"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				List Posts
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
						New Post
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
					<th>TITLE</th>
					<th>SLUG</th>
					<th>TAGS</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>

				@foreach($posts as $post)
				<tr>
					
					<td>{{ $post->id }}</td>
					<td>{{ $post->title }}</td>
					<td>{{ $post->slug}}</td>
					<td>
						@foreach($post->tags as $tag)
							<span class="kt-badge  kt-badge--info kt-badge--inline kt-badge--pill">#{{ $tag->name}}</span>
						@endforeach
						
					</td>
					<td nowrap>
											
						<a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md" href="{{route('post.edit',$post->slug)}}">
							<i class="la la-edit"></i>
						</a>
						<form action="{{ route('post.destroy',$post) }}" method="POST" class="d-inline">
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

<form class="kt-form kt-form--label-right" method="POST" action="{{route('post.store')}}">
<div class="modal modal-stick-to-bottom fade" id="kt_modal_1" role="dialog" data-backdrop="false" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                
                
		@csrf
		
			
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Title</label>
				<div class="col-10">
					<input class="form-control" type="text" name="title" required="" placeholder="Enter the title of the post" id="title">
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