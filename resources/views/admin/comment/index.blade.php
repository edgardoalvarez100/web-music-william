@extends('layouts.admin.material')

@section('title', 'Comments')
@section('subheader','List comments')

@section('content')


<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand fa fa-list"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				List
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
					<div class="dropdown dropdown-inline">
						<a href="{{ url('/livepanel/comment/') }}">All ({{ $commentsAll }})</a> |
						<a href="{{ url('/livepanel/comment/unapproved') }}">Unapproved ({{ $commentUnApproved }})</a> |
						<a href="{{ url('/livepanel/comment/approved') }}">Approved ({{ $commentApproved }})</a> |
						<a href="{{ url('/livepanel/comment/noapproved') }}">Not approved ({{ $commentNoApproved }})</a>
					</div>
					&nbsp;
					
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
					<th>COMMENT</th>
					<th>POST</th>
					<th>STATUS</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($comments as $comment)
				<tr>

					<td>{{ $comment->id }}</td>
					<td><strong>{{ $comment->name }}</strong> <br> {{$comment->email}} <br> {{$comment->ip}}</td>
					<td>{!! $comment->body !!}</td>
					<td><a href="{{ route('post.edit', $comment->post) }}">{{ $comment->post->title }}</a></td>
					<td><a href="javascript:;">{{ $comment->status->name }}</a></td>
					<td nowrap>
						<div class="d-inline">
						@switch($comment->status->id)
						@case(1)
						
							<form class="d-inline-block" action="{{ route('comment.changestatus', $comment) }}" method="POST">
							@csrf
							<input type="hidden" name="status_id" value="2">
							<button class="btn btn-sm btn-icon btn-info">
								<i class="la la-thumbs-o-up"></i>
							</button>
						</form>

						<form class="d-inline-block" action="{{ route('comment.changestatus', $comment) }}" method="POST">
							@csrf
							<input type="hidden" name="status_id" value="3">
							<button class="btn btn-sm btn-icon btn-secondary">
								<i class="la la-thumbs-o-down"></i>
							</button>
						</form>
						
						

						@break
						@case(2)
						<form class="d-inline-block" action="{{ route('comment.changestatus', $comment) }}" method="POST">
							@csrf
							<input type="hidden" name="status_id" value="3">
						<button class="btn btn-sm btn-icon btn-secondary">
							<i class="la la-thumbs-o-down"></i>
						</button>
						</form>
						@break
						@case(3)
						<form class="d-inline-block" action="{{ route('comment.changestatus', $comment) }}" method="POST">
							@csrf
							<input type="hidden" name="status_id" value="2">
						<button class="btn btn-sm btn-icon btn-info"><i class="la la-thumbs-o-up"></i></button>
						</form>
						@break
						@default
						@endswitch
						<form class="d-inline-block" action="{{ route('comment.destroy', $comment) }}" method="POST">
							@csrf
							{{ method_field('DELETE') }}
						<button class="btn btn-sm btn-icon btn-danger btn-ico btn-elevate"><i class="la la-trash"></i></button>
						</form>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		<!--end: Datatable -->
	</div>
</div>
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
			paging: true,

			// DOM Layout settings
			//dom: `<'row'<'col-sm-12'tr>>
			//<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

			//lengthMenu: [5, 10, 25, 50],

			//pageLength: 10,
			language: {
				'lengthMenu': 'Display _MENU_',
			},

			// Order settings
			order: [[0, 'desc']],
			searching: true

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
});
</script>
@endsection