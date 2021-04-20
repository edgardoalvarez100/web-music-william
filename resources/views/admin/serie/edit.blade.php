@extends('layouts.admin.material')

@section('title', 'Series')
@section('subheader','Edit Series')

@section('content')
<div class="row">
	<div class="col-lg-7">
		

		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head kt-portlet__head--lg">
				<div class="kt-portlet__head-label">
					<span class="kt-portlet__head-icon">
						<i class="kt-font-brand flaticon2-avatar"></i>
					</span>
					<h3 class="kt-portlet__head-title">
						Edit Series
					</h3>
				</div>
			</div>
			<form class="kt-form kt-form--label-right" action="{{ route('serie.update', $serie->id)}}" method="POST" enctype="multipart/form-data">
				<div class="kt-portlet__body">
					@csrf
					<div class="form-group row">
						<label for="name" class="col-2 col-form-label">Name</label>
						<div class="col-lg-10 col-sm-10 col-xs-10 col-10">
							<input class="form-control" type="text"  id="name" name="name" value="{{ $serie->name}}" >
						</div>
					</div>

					<div class="form-group row">
						<label for="slug" class="col-2 col-form-label">Slug</label>
						<div class="col-lg-7 col-sm-10 col-xs-10 col-10">
							<input class="form-control" type="text"  id="slug" name="slug" required="" value="{{ $serie->slug}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="date" class="col-2 col-form-label">Date</label>
						<div class="col-lg-7 col-sm-10 col-xs-10 col-10">
							<div class="input-group date">
								<input class="form-control kt_datepicker_3" type="text"  id="date" name="date" required="" autocomplete="off" value="{{ $serie->date}}">
								<div class="input-group-append">
									<span class="input-group-text">
										<i class="la la-calendar"></i>
									</span>
								</div>
							</div>

						</div>
					</div>

					<div class="form-group row">
						<label for="homepage" class="col-2 col-form-label">Homepage Box</label>

						<div class="col-8">
							
							<img src="{{url('storage/series/'.$serie->homepage)}}" style="width: 100%;max-width: 100px;height: 100px;" class="mb-2">
							
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="homepage"  name="homepage" accept="image/*"  value="{{$serie->homepage}}">

								<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
								<span class="text-unmted">if you upload a new image it will be replaced</span>
							</div>
						</div>
					</div>

					@if ($serie->homepage)
					<input type="hidden" name="homepage_" value="{{$serie->homepage}}" />
					@endif

					<div class="form-group row">
						<label for="topbanner" class="col-2 col-form-label">Top banner</label>

						<div class="col-8">
							
							<img src="{{url('storage/series/'.$serie->topbanner)}}" style="width: 100%;max-width: 100px;height: 100px;" class="mb-2">
							
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="topbanner"  name="topbanner" accept="image/*"  value="{{$serie->topbanner}}">

								<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
								<span class="text-unmted">if you upload a new image it will be replaced</span>
							</div>
						</div>
					</div>

					@if ($serie->topbanner)
					<input type="hidden" name="topbanner_" value="{{$serie->topbanner}}" />
					@endif

					<div class="form-group row">
						<label for="cover" class="col-2 col-form-label">Cover</label>

						<div class="col-8">
							
							<img src="{{url('storage/series/'.$serie->cover)}}" style="width: 100%;max-width: 100px;height: 100px;" class="mb-2">
							
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="cover"  name="cover" accept="image/*" value="{{$serie->cover}}">

								<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
								<span class="text-unmted">if you upload a new image it will be replaced</span>
							</div>
						</div>
					</div>

					@if ($serie->cover)
					<input type="hidden" name="cover_" value="{{$serie->cover}}" />
					@endif

					<div class="form-group row">
						<label for="description" class="col-2 col-form-label">Description</label>
						<div class="col-10">
							<textarea class="form-control" type="text"  id="description" name="description">{{$serie->description}}</textarea>
						</div>
					</div>


				</div>
				<div class="kt-portlet__foot">
					<div class="row align-items-center">
						<div class="col-lg-6 m--valign-middle">

						</div>
						<div class="col-lg-6 kt-align-right">
							<button type="submit" class="btn btn-brand">Update</button> <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-clean btn-icon-sm">
								<i class="la la-long-arrow-left"></i>
								Back
							</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-lg-5">
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head kt-portlet__head--lg">
				<div class="kt-portlet__head-label">
					<span class="kt-portlet__head-icon">
						<i class="kt-font-brand flaticon2-avatar"></i>
					</span>
					<h3 class="kt-portlet__head-title">
						Promopack
					</h3>
				</div>
			</div>
			<style type="text/css">
				#form-promo .row{
					margin-bottom: 2px;
				}
			</style>

			<form class="kt-form kt-form--label-right"  method="POST" enctype="multipart/form-data" id="form-promo" action="{{route('serie.addpromo',$serie->id)}}">
				<div class="kt-portlet__body">
					<div class="form-group row">
						<label for="pc" class="col-2 col-form-label">PC</label>

						<div class="col-8" id="pc">
							@if($serie->promopack->pc)
							<img src="{{url('storage/promopacks/'.$serie->promopack->pc)}}" style="width: 70%;max-width: 70px;height: 70px;" class="mb-2 img-preview">
							<div class="btn-delete">
								<a class="btn btn-danger" href="javascript:;">Delete</a>
							</div>
							<div class="custom-file" style="display: none">
								<input type="file" class="custom-file-input"   name="pc" accept="image/*"  >
								<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
								<span class="text-unmted">if you upload a new image it will be replaced</span>
							</div>
							@else
							<img src="https://www.placehold.it/100x100/EFEFEF/AAAAAA&amp;text=no+image" style="width: 70%;max-width: 70px;height: 70px;" class="mb-2 img-preview">
							<div class="btn-delete" style="display: none;">
								<a class="btn btn-danger" href="javascript:;">Delete</a>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input"   name="pc" accept="image/*"  >
								<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
								<span class="text-unmted">if you upload a new image it will be replaced</span>
							</div>
							@endif
						</div>

					</div>
					<div class="kt-separator kt-separator--border-dashed kt-separator--space-xs"></div>

					<div class="form-group row">
						<label for="pc_png" class="col-2 col-form-label">PC png</label>

						<div class="col-8" id="pc_png">
							@if($serie->promopack->pc_png)
							<img src="{{url('storage/promopacks/'.$serie->promopack->pc_png)}}" style="width: 70%;max-width: 70px;height: 70px;" class="mb-2 img-preview">
							<div class="btn-delete">
								<a class="btn btn-danger" href="javascript:;">Delete</a>
							</div>
							<div class="custom-file" style="display: none">
								<input type="file" class="custom-file-input"   name="pc_png" accept="image/*"  >
								<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
								<span class="text-unmted">if you upload a new image it will be replaced</span>
							</div>
							@else
							<img src="https://www.placehold.it/100x100/EFEFEF/AAAAAA&amp;text=no+image" style="width: 70%;max-width: 70px;height: 70px;" class="mb-2 img-preview">
							<div class="btn-delete" style="display: none;">
								<a class="btn btn-danger" href="javascript:;">Delete</a>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input"   name="pc_png" accept="image/*"  >
								<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
								<span class="text-unmted">if you upload a new image it will be replaced</span>
							</div>
							@endif
						</div>

					</div>
					<div class="kt-separator kt-separator--border-dashed kt-separator--space-xs"></div>
					<div class="form-group row">
						<label for="phone" class="col-2 col-form-label">Phone</label>

						<div class="col-8" id="phone">
							@if($serie->promopack->phone)
							<img src="{{url('storage/promopacks/'.$serie->promopack->phone)}}" style="width: 70%;max-width: 70px;height: 70px;" class="mb-2 img-preview">
							<div class="btn-delete">
								<a class="btn btn-danger" href="javascript:;">Delete</a>
							</div>
							<div class="custom-file" style="display: none">
								<input type="file" class="custom-file-input"   name="phone" accept="image/*"  >
								<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
								<span class="text-unmted">if you upload a new image it will be replaced</span>
							</div>
							@else
							<img src="https://www.placehold.it/100x100/EFEFEF/AAAAAA&amp;text=no+image" style="width: 70%;max-width: 70px;height: 70px;" class="mb-2 img-preview">
							<div class="btn-delete" style="display: none;">
								<a class="btn btn-danger" href="javascript:;">Delete</a>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input"   name="phone" accept="image/*"  >
								<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
								<span class="text-unmted">if you upload a new image it will be replaced</span>
							</div>
							@endif
						</div>

					</div>

					<div class="kt-separator kt-separator--border-dashed kt-separator--space-xs"></div>
					<div class="form-group row">
						<label for="phone_png" class="col-2 col-form-label">Phone png</label>

						<div class="col-8" id="phone_png">
							@if($serie->promopack->phone_png)
							<img src="{{url('storage/promopacks/'.$serie->promopack->phone_png)}}" style="width: 70%;max-width: 70px;height: 70px;" class="mb-2 img-preview">
							<div class="btn-delete">
								<a class="btn btn-danger" href="javascript:;">Delete</a>
							</div>
							<div class="custom-file" style="display: none">
								<input type="file" class="custom-file-input"   name="phone_png" accept="image/*"  >
								<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
								<span class="text-unmted">if you upload a new image it will be replaced</span>
							</div>
							@else
							<img src="https://www.placehold.it/100x100/EFEFEF/AAAAAA&amp;text=no+image" style="width: 70%;max-width: 70px;height: 70px;" class="mb-2 img-preview">
							<div class="btn-delete" style="display: none;">
								<a class="btn btn-danger" href="javascript:;">Delete</a>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input"   name="phone_png" accept="image/*"  >
								<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
								<span class="text-unmted">if you upload a new image it will be replaced</span>
							</div>
							@endif
						</div>

					</div>
					<div class="kt-separator kt-separator--border-dashed kt-separator--space-xs"></div>

					<div class="form-group row">
						<label for="facebook" class="col-2 col-form-label">Facebook</label>

						<div class="col-8" id="facebook">
							@if($serie->promopack->facebook)
							<img src="{{url('storage/promopacks/'.$serie->promopack->facebook)}}" style="width: 70%;max-width: 70px;height: 70px;" class="mb-2 img-preview">
							<div class="btn-delete">
								<a class="btn btn-danger" href="javascript:;">Delete</a>
							</div>
							<div class="custom-file" style="display: none">
								<input type="file" class="custom-file-input"   name="facebook" accept="image/*"  >
								<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
								<span class="text-unmted">if you upload a new image it will be replaced</span>
							</div>
							@else
							<img src="https://www.placehold.it/100x100/EFEFEF/AAAAAA&amp;text=no+image" style="width: 70%;max-width: 70px;height: 70px;" class="mb-2 img-preview">
							<div class="btn-delete" style="display: none;">
								<a class="btn btn-danger" href="javascript:;">Delete</a>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input"   name="facebook" accept="image/*"  >
								<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
								<span class="text-unmted">if you upload a new image it will be replaced</span>
							</div>
							@endif
						</div>

					</div>

					<div class="kt-separator kt-separator--border-dashed kt-separator--space-xs"></div>
					<div class="form-group row">
						<label for="facebook_png" class="col-2 col-form-label">Facebook png</label>

						<div class="col-8" id="facebook_png">
							@if($serie->promopack->facebook_png)
							<img src="{{url('storage/promopacks/'.$serie->promopack->facebook_png)}}" style="width: 70%;max-width: 70px;height: 70px;" class="mb-2 img-preview">
							<div class="btn-delete">
								<a class="btn btn-danger" href="javascript:;">Delete</a>
							</div>
							<div class="custom-file" style="display: none">
								<input type="file" class="custom-file-input"   name="facebook_png" accept="image/*"  >
								<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
								<span class="text-unmted">if you upload a new image it will be replaced</span>
							</div>
							@else
							<img src="https://www.placehold.it/100x100/EFEFEF/AAAAAA&amp;text=no+image" style="width: 70%;max-width: 70px;height: 70px;" class="mb-2 img-preview">
							<div class="btn-delete" style="display: none;">
								<a class="btn btn-danger" href="javascript:;">Delete</a>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input"   name="facebook_png" accept="image/*"  >
								<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
								<span class="text-unmted">if you upload a new image it will be replaced</span>
							</div>
							@endif
						</div>

					</div>
					<div class="kt-separator kt-separator--border-dashed kt-separator--space-xs"></div>

					<div class="form-group row">
						<label for="instagram" class="col-2 col-form-label">Instagram</label>

						<div class="col-8" id="instagram">
							@if($serie->promopack->instagram)
							<img src="{{url('storage/promopacks/'.$serie->promopack->instagram)}}" style="width: 70%;max-width: 70px;height: 70px;" class="mb-2 img-preview">
							<div class="btn-delete">
								<a class="btn btn-danger" href="javascript:;">Delete</a>
							</div>
							<div class="custom-file" style="display: none">
								<input type="file" class="custom-file-input"   name="instagram" accept="image/*"  >
								<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
								<span class="text-unmted">if you upload a new image it will be replaced</span>
							</div>
							@else
							<img src="https://www.placehold.it/100x100/EFEFEF/AAAAAA&amp;text=no+image" style="width: 70%;max-width: 70px;height: 70px;" class="mb-2 img-preview">
							<div class="btn-delete" style="display: none;">
								<a class="btn btn-danger" href="javascript:;">Delete</a>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input"   name="instagram" accept="image/*"  >
								<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
								<span class="text-unmted">if you upload a new image it will be replaced</span>
							</div>
							@endif
						</div>

					</div>

					<div class="kt-separator kt-separator--border-dashed kt-separator--space-xs"></div>
					<div class="form-group row">
						<label for="intagram_png" class="col-2 col-form-label">Instagram png</label>

						<div class="col-8" id="instagram_png">
							@if($serie->promopack->instagram_png)
							<img src="{{url('storage/promopacks/'.$serie->promopack->instagram_png)}}" style="width: 70%;max-width: 70px;height: 70px;" class="mb-2 img-preview">
							<div class="btn-delete">
								<a class="btn btn-danger" href="javascript:;">Delete</a>
							</div>
							<div class="custom-file" style="display: none">
								<input type="file" class="custom-file-input"   name="instagram_png" accept="image/*"  >
								<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
								<span class="text-unmted">if you upload a new image it will be replaced</span>
							</div>
							@else
							<img src="https://www.placehold.it/100x100/EFEFEF/AAAAAA&amp;text=no+image" style="width: 70%;max-width: 70px;height: 70px;" class="mb-2 img-preview">
							<div class="btn-delete" style="display: none;">
								<a class="btn btn-danger" href="javascript:;">Delete</a>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input"   name="instagram_png" accept="image/*"  >
								<label class="custom-file-label" for="image" style="text-align: left;">Choose file</label>
								<span class="text-unmted">if you upload a new image it will be replaced</span>
							</div>
							@endif
						</div>

					</div>
				</div>
			</form>

			<!-- <div class="kt-portlet__foot">
				<div class="row align-items-center">
					<div class="col-lg-6 m--valign-middle">

					</div>
					<div class="col-lg-12 kt-align-right">
						<button type="submit" class="btn btn-brand">Update</button> 

					</div>
				</div>
			</div> -->
		</div>
	</div>
</div>
@endsection
@section('script')

<script type="text/javascript">
	var KTBootstrapDatepicker = function () {

		var arrows;
		if (KTUtil.isRTL()) {
			arrows = {
				leftArrow: '<i class="la la-angle-right"></i>',
				rightArrow: '<i class="la la-angle-left"></i>'
			}
		} else {
			arrows = {
				leftArrow: '<i class="la la-angle-left"></i>',
				rightArrow: '<i class="la la-angle-right"></i>'
			}
		}

// Private functions
var demos = function () {

// enable clear button 
$('.kt_datepicker_3, .kt_datepicker_3_validate').datepicker({
	rtl: KTUtil.isRTL(),
	todayBtn: "linked",
	clearBtn: true,
	todayHighlight: true,
	templates: arrows,
	format: 'yyyy-mm-dd',
});

// enable clear button for modal demo
$('.kt_datepicker_3_modal').datepicker({
	rtl: KTUtil.isRTL(),
	todayBtn: "linked",
	clearBtn: true,
	todayHighlight: true,
	templates: arrows,
	format: 'yyyy-mm-dd',
});


}

return {
// public functions
init: function() {
	demos(); 
}
};
}();


jQuery(document).ready(function() {    
	KTBootstrapDatepicker.init();

});


var KTSummernoteDemo = function () {    
// Private functions
var demos = function () {
	$('#description').summernote({
		height: 150
	});
}

return {
// public functions
init: function() {
	demos(); 
}
};
}();

// Initialization
jQuery(document).ready(function() {
	KTSummernoteDemo.init();



	$(document).on('change','#form-promo input',function(){
		if ($(this).val() != '') {
			KTApp.block('body', {
				overlayColor: '#000000',
				type: 'v2',
				state: 'primary',
				message: 'Processing...'
			});

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': "{{ csrf_token() }}"
				}
			});

			var form_data = new FormData();
			form_data.append($(this).attr("name"), this.files[0]);
			$.ajax({
				type:'POST',
				url: "{{route('serie.addpromo',$serie->id)}}",
				data:form_data,
				cache:false,
				contentType: false,
				processData: false,
				success:function(data){

					$("#"+data.campo+" img.img-preview").attr("src", '{{url('storage/promopacks/')}}/'+data.promopack);
					$("#"+data.campo+" .custom-file").hide();
					$("#"+data.campo+" .btn-delete").show();
				},

				error: function(data){
					console.log(data);
				}

			}).always(function(){
				KTApp.unblock('body');
			});
		}
});//end change input upload


	$(document).on('click','#form-promo .btn-delete',function(){

		KTApp.block('body', {
			overlayColor: '#000000',
			type: 'v2',
			state: 'primary',
			message: 'Processing...'
		});

		var id = $(this).parent().attr("id");		
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': "{{ csrf_token() }}"
			}
		});

		var form_data = new FormData();
		form_data.append(id, 1);

		$.ajax({
			type:'POST',
			url: "{{route('serie.deletepromo',$serie->id)}}",
			data:form_data,
			cache:false,
			contentType: false,
			processData: false,
			success:function(data){
				
				$("#"+id+" img.img-preview").attr("src", 'https://www.placehold.it/100x100/EFEFEF/AAAAAA&text=no+image');
				$("#"+id+" .custom-file").show();
				$("#"+id+" .btn-delete").hide();
			},

			error: function(data){
				console.log(data);
			}

		}).always(function(){
			KTApp.unblock('body');
		});

	});

});
</script>

@endsection