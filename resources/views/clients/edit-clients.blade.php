@extends('home')
@section('contents')

@include('layouts.msg')
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Client</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" action="{{url('/update-client',$category->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				  <fieldset>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Client Name : </label>
					  <div class="controls">
						<input type="text" class="span6 typeahead" id="client_name" name="client_name" value="{{ $editClient->client_name }">
					  </div>
					</div>

					<div class="control-group">
					  <label class="control-label" for="fileInput">Client Logo : </label>
					  <div class="controls">
						<input class="input-file uniform_on" id="client_company_logo" name="client_company_logo" type="file">
						<input class="input-file uniform_on" id="client_company_logo_hidden" name="client_company_logo_hidden" type="hidden" value="{{ $editClient->client_company_logo }}">
					  </div>
					</div>     

					<div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Client Details : </label>
					  <div class="controls">
						<textarea class="cleditor" id="client_details" name="client_details" rows="3">{!! $editClient->client_details !!}</textarea>
					  </div>
					</div>

					<div class="form-actions">
					  <button type="submit" class="btn btn-primary">Save Client</button>
					  <button type="reset" class="btn">Cancel</button>
					</div>
				  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection