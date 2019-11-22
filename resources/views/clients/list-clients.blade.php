@extends('home')
@section('contents')

@include('layouts.msg')
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>Clients List</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>SN</th>
					  <th>Client Name</th>
					  <th>Client Logo</th>
					  <th>Client Details</th>
					  <th>Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
			  	@if(isset($allClients))
				  	@foreach($allClients as $key=> $client)
					<tr>
						<td class="center">{{ $key + 1 }}</td>
						<td class="center">{{ $client->client_name }}</td>
						<td class="center">
							<img class="img-responsive img-thumbnail" src="{{ asset($client->client_company_logo) }}" style="height:100px;width:100px;">
						</td>
						<td class="center">{!! $client->client_details !!}</td>
						<td class="center">
							@if($client->client_status == 1)
								<span class="label label-success">Active</span>
							@else
								<span class="label label-warning">Inactive</span>
							@endif
						</td>
						<td class="center">
							<a class="btn btn-info" href="#">
								<i class="halflings-icon white edit"></i>  
							</a>
							<a class="btn btn-danger" href="#">
								<i class="halflings-icon white trash"></i> 
							</a>
						</td>
					</tr>
					@endforeach
				@endif
			  </tbody>
			</table>
		</div>
	</div>
</div>
@endsection