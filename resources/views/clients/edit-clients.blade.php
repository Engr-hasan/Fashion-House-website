@extends('layouts.master')
@section('contents')

@include('layouts.msg')
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Client</h2>
			<div class="box-icon">
				<a href="{{url('/list-clients')}}" style="background-color: purple;text-decoration: none;padding: 5px 10px;color: white;">Back</a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" action="{{url('/update-client',$editClient->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				  <fieldset>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Client Name : </label>
					  <div class="controls">
						<input type="text" class="span6 typeahead" id="client_name" name="client_name" value="{{ $editClient->client_name }}">
					  </div>
					</div>

					<div class="control-group">
					  <label class="control-label" for="fileInput">Client Logo : </label>
					  <div class="controls">
						<input class="input-file uniform_on" id="client_company_logo" name="client_company_logo" type="file">
						<img class="img-responsive img-thumbnail" src="{{ asset('uploads/clientLogo/'.$editClient->client_company_logo) }}" style="height:70px;width:70px;">
					  </div>
					</div>     

					<div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Client Details : </label>
					  <div class="controls">
						<textarea class="cleditor" id="client_details" name="client_details" rows="3">{!! $editClient->client_details !!}</textarea>
					  </div>
					</div>

					<div class="control-group">
						<label class="control-label" for="client_status">Client Status : </label>
						<div class="controls">
						  <label class="radio inline">
							<input type="radio" id="inlineRadio1" name="client_status" value="1" {{$editClient->client_status == 1 ? 'checked' : ''}}> Active
						  </label>
						  <label class="radio inline">
							<input type="radio" id="inlineRadio2" name="client_status" value="0" {{$editClient->client_status == 0 ? 'checked' : ''}}> InActive
						  </label>
						</div>
					  </div>

					<div class="form-actions">
					  <button type="submit" class="btn btn-primary">Update Client</button>
					  <button type="reset" class="btn btn-info">
						  <a href="{{url('/list-clients')}}" style="color: white;text-decoration: none;">Cancel</a>
					  </button>
					</div>
				  </fieldset>
			</form>   
		</div>
	</div><!--/span-->
</div><!--/row-->
@endsection