<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Users Activites List</h2>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th width="5%">SN</th>
					  <th width="15%">Name</th>
					  <th width="20%">Email</th>
					  <th width="15%">Current Status</th>
				  </tr>
			  </thead>   
			  <tbody>
			  	@if(isset($users))
				  	@foreach($users as $key=> $user)
					<tr>
						<td class="center">{{ $key + 1 }}</td>
						<td class="center">{{ $user->name }}</td>
						<td class="center">{{ $user->email }}</td>
						<td class="center">
							@if($user->isOnline())
								<span class="label label-success">Online</span>
							@else
								<span class="label label-warning">Offline</span>
							@endif
						</td>
					</tr>
					@endforeach
				@endif
			  </tbody>
			</table>
		</div>
	</div><!--/span-->
</div><!--/row-->