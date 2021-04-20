@extends('layouts.admin.material')

@section('title', 'Submit')
@section('subheader','List submit')

@section('content')


<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand fa fa-list"></i>
			</span>
			<h3 class="kt-portlet__head-title">
            List submit - <b>{{ $job->title}}</b>
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
					<div class="dropdown dropdown-inline">
						
					</div>
					&nbsp;
					{{-- <a href="{{ route('job.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						New Job
					</a> --}}
				</div>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body">

		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
			<thead>
				<tr>
					
					<th>FIRST NAME</th>
					<th>LAST NAME</th>
					<th>EMAIL</th>
					<th>FILE</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($submits as $item)
				<tr>

					<td>{{ $item->first_name }}</td>
					<td>{{ $item->last_name }}</td>
					<td>{{ $item->email }}</td>
                <td>@if(isset($item->file)) <a href="{{ url('/storage/jobs/'.$item->file) }}" target="_blank">{{ $item->file }}</a>  @endif</td>
	
					
					<td nowrap>
                       
						<span class="dropdown">
							<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
								<i class="la la-ellipsis-h"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								
								
								<form action="{{ route('jobsubmit.destroy',$item->id) }}" method="POST">
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