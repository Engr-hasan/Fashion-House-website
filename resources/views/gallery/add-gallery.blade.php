@extends('layouts.master')
@section('contents')

@include('layouts.msg')
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Gallery</h2>
			<div class="box-icon">
				<a href="{{url('/list-galleries')}}" style="background-color: purple;text-decoration: none;padding: 5px 10px;color: white;">Back</a>
				<!-- <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a> -->
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" action="{{url('/store-gallery')}}" method="POST" enctype="multipart/form-data">
				@csrf
				  <fieldset>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Gallery Image Title : </label>
					  <div class="controls">
						<input type="text" class="span6 typeahead" id="gallery_image_title" name="gallery_image_title">
					  </div>
					</div>

					<div class="control-group">
					  <label class="control-label" for="fileInput">Gallery Image : </label>
					  <div class="controls">
						<input class="input-file uniform_on" id="gallery_image" name="gallery_image" type="file">
					  </div>
					</div>     

					<div class="form-actions">
					  <button type="submit" class="btn btn-primary">Save Gallery</button>
					  <button type="reset" class="btn btn-info">
						  <a href="{{url('/list-galleries')}}" style="color: white;text-decoration: none;">Cancel</a>
					  </button>
					</div>
				  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection