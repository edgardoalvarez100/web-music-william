@extends('layouts.admin.material')

@section('title', 'Countdown')
@section('subheader','Add countdown')

@section('content')
<div class="kt-portlet kt-portlet--mobile col-xl-8">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-avatar"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Create Countdown
			</h3>
		</div>
	</div>
	<form class="kt-form kt-form--label-right" method="POST" action="{{route('countdown.store')}}">
		@csrf
		<div class="kt-portlet__body">
			
			<div class="form-group row">
				<label for="url_from" class="col-2 col-form-label">Day</label>
				<div class="col-6">
					<select name="day" id="day" class="form-control" required>
                        <option value="monday">Monday</option>
                        <option value="tuesday">Tuesday</option>
                        <option value="wednesday">Wednesday</option>
                        <option value="thursday">Thursday</option>
                        <option value="friday">Friday</option>
                        <option value="saturday">Saturday</option>
                        <option value="sunday">Sunday</option>
                    </select>
				</div>
			</div>

			<div class="form-group row">
				<label for="url_to" class="col-2 col-form-label">Start</label>
				<div class="col-6">
					<div class="input-group date">
						<input type="text" class="form-control kt_datetimepicker_7" placeholder="Select time" name="start_service" required autocomplete="off">
						<div class="input-group-append">
							<span class="input-group-text">
							<i class="la la-calendar glyphicon-th"></i>
							</span>
						</div>
					</div>
				</div>
            </div>
            
            <div class="form-group row">
				<label for="url_to" class="col-2 col-form-label">End</label>
				<div class="col-6">
					<div class="input-group date">
						<input type="text" class="form-control kt_datetimepicker_7" placeholder="Select time" name="end_service" required autocomplete="off">
						<div class="input-group-append">
							<span class="input-group-text">
							<i class="la la-calendar glyphicon-th"></i>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group row">
			<label for="status" class="col-2 col-form-label">Status</label>
			<div class="col-10">
				<span class="kt-switch kt-switch--icon">
					<label>
						<input type="checkbox" name="status" id="status" checked>
						<span></span>
					</label>
				</span>
			</div>
		</div>

		</div>
		<div class="kt-portlet__foot">
			<div class="row align-items-center">
				<div class="col-lg-6 m--valign-middle">

				</div>
				<div class="col-lg-6 kt-align-right">
					<button type="submit" class="btn btn-brand">Submit</button>					
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
@section('script')
    <script>
        var KTBootstrapDatetimepicker={
            init:function(){
                $(".kt_datetimepicker_7").datetimepicker(
                    {format:"hh:ii",
                    showMeridian:!0,
                    todayHighlight:!0,
                    autoclose:!0,
                    startView:1,
                    minView:0,maxView:1,
                    forceParse:0,
                    pickerPosition:"bottom-left"}
                    )}
            };
        jQuery(document).ready(function(){KTBootstrapDatetimepicker.init()});
    </script>
@endsection