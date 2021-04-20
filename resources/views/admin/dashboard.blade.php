@extends('layouts.admin.material')

@section('title', 'Dashboard')
@section('subheader','Manage content')

@section('content')
<div class="row">
	<div class="col-xl-3 col-lg-3 col-sm-6 col-xs-6">
		<div class="kt-portlet kt-portlet--height-fluid kt-iconbox--wave">
			<div class="kt-widget14">
				
				<div class="display-3">{{$series->count()}}</div>
				<div class="kt-widget14__header m-1 p-1">
					<h3 class="kt-widget14__title">
						Series
					</h3>
					
				</div>				
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-3 col-sm-6 col-xs-6">
		<div class="kt-portlet kt-portlet--height-fluid kt-iconbox--wave">
			<div class="kt-widget14">
				<div class="display-3">{{$events->count()}}</div>
				<div class="kt-widget14__header m-1 p-1">
					<h3 class="kt-widget14__title">
						Events
					</h3>
					
				</div>				
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-3 col-sm-6 col-xs-6 ">
		<div class="kt-portlet kt-portlet--height-fluid kt-iconbox--wave">
			<div class="kt-widget14">
				<div class="display-3">{{$videos->count()}}</div>
				<div class="kt-widget14__header m-1 p-1">
					<h3 class="kt-widget14__title">
						Videos
					</h3>
					
				</div>				
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-3 col-sm-6 col-xs-6">
		<div class="kt-portlet kt-portlet--height-fluid kt-iconbox--wave">
			<div class="kt-widget14">
				<div class="display-3">{{$speakers->count()}}</div>
				<div class="kt-widget14__header m-1 p-1">
					<h3 class="kt-widget14__title">
						Speaker
					</h3>
					
				</div>				
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-lg-6">
		<div class="kt-portlet kt-portlet--height-fluid">
			<div class="kt-portlet__head kt-ribbon kt-ribbon--right">
				<div class="kt-ribbon__target" style="top: 10px; right: -2px;">Current Series</div>
			</div>
			@if(isset($current_serie->cover))
			<img src="{{ url('storage/series/'.$current_serie->cover)}}" class="img-fluid">
			@else
			<div class="kt-portlet__body">
				Empty
			</div>
			@endif
		</div>
	</div>
	<div class="col-lg-6">
		<div class="kt-portlet kt-portlet--height-fluid">
			<div class="kt-portlet__head kt-ribbon kt-ribbon--right">
				<div class="kt-ribbon__target" style="top: 10px; right: -2px;">Latest Message</div>
			</div>
			@if($series->count() > 0)
			@if($current_serie->videos->count() > 0)
			<img src="{{ url('storage/videos/'.$current_serie->videos->last()->cover)}}" class="img-fluid">
			@endif
			@else
			<div class="kt-portlet__body">
				Empty
			</div>
			@endif
		</div>
	</div>
</div>
@endsection