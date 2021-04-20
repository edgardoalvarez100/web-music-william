@extends('layouts.admin.material')

@section('title', 'Redirects')
@section('subheader','List redirects')

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
						
					</div>
					&nbsp;
					<a href="{{ route('redirect.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						New Redirect
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
					<th>URL FROM</th>
					<th>URL TO</th>
					<th>STATUS</th>
					<th>LAST UPDATED</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($redirects as $redirect)
				<tr>

					<td>{{ $redirect->id }}</td>
					<td><a href="{{ $redirect->url_from }}" target="_blank">{{ $redirect->url_from }}</a></td>
					<td>{{ $redirect->url_to }}</td>
					<td>
						@if($redirect->status == 1)
						<span class="kt-badge kt-badge--success kt-badge--inline">ACTIVE</span>
						@else
						<span class="kt-badge kt-badge--danger kt-badge--inline">INACTIVE</span>
						@endif
					</td>
					<td>{{ $redirect->updated_at->diffForHumans() }}</td>
					<td nowrap>
						
						<a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md" href="{{route('redirect.edit',$redirect->id)}}">
							<i class="la la-edit"></i>
						</a>
						<form action="{{ route('redirect.destroy',$redirect->id) }}" method="POST" class="d-inline">
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
@endsection

@section('script')
<script src="./assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
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
});
</script>
@endsection