@extends('layouts.admin.material')

@section('title', 'Ministries')
@section('subheader','List Ministries')

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
					<a href="{{ route('ministry.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						New Ministry
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
					<th>NAME</th>
					
					<th>CREATION DATE</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($ministries as $ministry)
				<tr>

					<td>{{ $ministry->id }}</td>
					<td>{{ $ministry->name }}</td>
					
					<td>{{ $ministry->created_at }}</td>
					<td nowrap>
						<span class="dropdown">
							<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
								<i class="la la-ellipsis-h"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="{{ route('ministry.edit',$ministry->id) }}">
									<i class="la la-edit"></i> Edit Details
								</a>
								
								<form action="{{ route('ministry.delete',$ministry->id) }}" method="POST">
									{{ method_field('DELETE') }}
									{{ csrf_field() }}
									<button type='submit' class="btn dropdown-item" >
										<i class="la la-close"></i> Delete
									</button>
								</form>
							</div>
						</span>
						<a href="{{ route('ministry.show',$ministry->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
							<i class="la la-file-text"></i>
						</a>
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

			// DOM Layout settings
			dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

			lengthMenu: [5, 10, 25, 50],

			pageLength: 10,

			language: {
				'lengthMenu': 'Display _MENU_',
			},

			// Order settings
			order: [[1, 'desc']],

			headerCallback: function(thead, data, start, end, display) {
				thead.getElementsByTagName('th')[0].innerHTML = `
				<label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
				<input type="checkbox" value="" class="m-group-checkable">
				<span></span>
				</label>`;
			},

			columnDefs: [
			{
				targets: 0,
				width: '30px',
				className: 'dt-right',
				orderable: false,
				render: function(data, type, full, meta) {
					return `
					<label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
					<input type="checkbox" value="" class="m-checkable">
					<span></span>
					</label>`;
				},
			},
			// {
			// 	targets: -1,
			// 	title: 'Actions',
			// 	orderable: false,
			// 	render: function(data, type, full, meta) {
			// 		return `
			// 		<span class="dropdown">
			// 		<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
			// 		<i class="la la-ellipsis-h"></i>
			// 		</a>
			// 		<div class="dropdown-menu dropdown-menu-right">
			// 		<a class="dropdown-item" href="{{ route('user') }}/edit/`+data+`"><i class="la la-edit"></i> Edit Details</a>

			// 		<a class="dropdown-item" href="{{ route('user') }}/delete/`+data+`"><i class="la la-close"></i> Delete</a>
			// 		</div>
			// 		</span>
			// 		<a href="{{ route('user') }}/`+data+`" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
			// 		<i class="la la-edit"></i>
			// 		</a>`;
			// 	},
			// },
			],
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