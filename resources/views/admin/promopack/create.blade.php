@extends('layouts.admin.material')

@section('title', 'Promopack')
@section('subheader','Add promopack')

@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-avatar"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Create promopack
			</h3>
		</div>
	</div>
	<form class="kt-form kt-form--label-right" method="POST" action="{{route('promopack.store')}}" enctype="multipart/form-data">
		@csrf
		<div class="kt-portlet__body">
			

			<div class="form-group row">
				<label for="pc" class="col-2 col-form-label">PC</label>

				<div class="col-5">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="pc"  name="pc" accept="image/*">

						<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label for="phone" class="col-2 col-form-label">Phone</label>

				<div class="col-5">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="phone"  name="phone" accept="image/*">

						<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label for="Facebook" class="col-2 col-form-label">Facebook</label>

				<div class="col-5">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="Facebook"  name="Facebook" accept="image/*">

						<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label for="Facebook" class="col-2 col-form-label">Instragram</label>

				<div class="col-5">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="Instragram"  name="instragram" accept="image/*">

						<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
					</div>
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
@section('script')
<script type="text/javascript">

</script>
@endsection