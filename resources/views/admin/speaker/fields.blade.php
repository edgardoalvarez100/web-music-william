<div class="form-group row">
	<label for="name" class="col-2 col-form-label">Name</label>
	<div class="col-lg-6 col-sm-10 col-xs-10 col-10">
		<input class="form-control" type="text"  id="name" name="name" required="" value="@if(isset($speaker)){{$speaker->name}}@endif">
	</div>
</div>
@if(isset($speaker))
<div class="form-group row">
	<label for="slug" class="col-2 col-form-label">Slug</label>
	<div class="col-lg-6 col-sm-10 col-xs-10 col-10">
		<input class="form-control" type="text"  id="slug" name="slug" required="" value="@if(isset($speaker)){{$speaker->slug}}@endif">
	</div>
</div>
@endif
<div class="form-group row">
	<label for="featured" class="col-2 col-form-label">Featured</label>
	<div class="col-10">
		<span class="kt-switch kt-switch--icon">
			<label>
				<input type="checkbox" name="featured" id="featured" @if(isset($speaker))
				@if($speaker->featured) checked @endif
				@endif>
				<span></span>
			</label>
		</span>
	</div>
</div>