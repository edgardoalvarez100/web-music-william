@extends('layouts.admin.material')

@section('title', 'Users')
@section('subheader','View user')

@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-avatar"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Details User
			</h3>
		</div>
	</div>
	<form class="kt-form kt-form--label-right" action="javascript:void(0);">
		<div class="kt-portlet__body">

			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Name</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="example-text-input" name="name" value="{{ $user->name}}" disabled="">
				</div>
			</div>
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Email</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="example-text-input" name="name" value="{{ $user->email}}" disabled="">
				</div>
			</div>
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Rol</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="example-text-input" name="name" value="{{ $user->getRoleNames()[0]}}" disabled="">
				</div>
			</div>
			
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Created at</label>
				<div class="col-10">
					<input class="form-control" type="text"  id="example-text-input" name="name" value="{{ $user->created_at}}" disabled="">
				</div>
			</div>
			
			

		</div>
		<div class="kt-portlet__foot">
			<div class="row align-items-center">
				<div class="col-lg-6 m--valign-middle">

				</div>
				<div class="col-lg-6 kt-align-right">
					<a class="btn btn-primary" href="{{route('user.edit',$user->id)}}" role="button">Edit</a> <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-clean btn-icon-sm">
						<i class="la la-long-arrow-left"></i>
						Back
					</a>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection