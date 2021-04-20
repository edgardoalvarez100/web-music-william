@extends('layouts.admin.material')

@section('title', 'Job')
@section('subheader','List jobs')

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
					<a href="{{ route('job.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						New Job
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
					<th>LOCATION</th>
					<th>STATE</th>

					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($jobs as $item)
				<tr>

					<td>{{ $item->id }}</td>
					<td>{{ $item->title }}</td>
					<td>{{ $item->slug }}</td>
					<td>{{ $item->location }}</td>

					<td> @if($item->status) ACTIVE @else INACTIVE @endif </td>
					
					<td nowrap>
                        <a href="{{ route('jobsubmit.index',$item->id) }}" class="" title="Submits">
							Submits
						</a>
						<span class="dropdown">
							<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
								<i class="la la-ellipsis-h"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="{{ route('job.edit',$item->id) }}">
									<i class="la la-edit"></i> Edit Details
								</a>
								
								<form action="{{ route('job.destroy',$item->id) }}" method="POST">
									{{ method_field('DELETE') }}
									{{ csrf_field() }}
									<button type='submit' class="btn dropdown-item" >
										<i class="la la-close"></i> Delete
									</button>
								</form>
							</div>
						</span>
						
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
 		    lengthMenu: [10, 15, 25, 50],
			pageLength: 20,
			language: {
				'lengthMenu': 'Display _MENU_',
			},

			// Order settings
			order: [[1, 'desc']],

			

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