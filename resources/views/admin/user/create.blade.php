@extends('layouts.admin.material')

@section('title', 'Users')
@section('subheader','Add user')

@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-avatar"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Info Personal
			</h3>
		</div>
	</div>
	<form class="kt-form kt-form--label-right" method="POST" action="{{route('user.store')}}">
		@csrf
		<div class="kt-portlet__body">
			
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Name</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="example-text-input" name="name" required="">
				</div>
			</div>
			
			<div class="form-group row">
				<label for="example-email-input" class="col-2 col-form-label">Email</label>
				<div class="col-10">
					<input class="form-control" type="email"  id="example-email-input" name="email" required="">
				</div>
			</div>

			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Password</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="example-text-input" name="password" required="">
				</div>
			</div>
			
			<div class="form-group row">
				<label  class="col-2 col-form-label">Role</label>
				<div class="col-10">
					<select class="custom-select form-control" id="example-text-input" name="role">
						@foreach($roles as $role)
						<option value="{{$role->name}}">{{$role->name}}</option>
						@endforeach
					</select>
				</div>
				
			</div>

		</div>
		<div class="kt-portlet__foot">
			<div class="row align-items-center">
				<div class="col-lg-6 m--valign-middle">

				</div>
				<div class="col-lg-6 kt-align-right">
					<button type="submit" class="btn btn-brand">Submit</button>
					<span class="kt-margin-left-10">or <a href="#" class="kt-link kt-font-bold">Cancel</a></span>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection