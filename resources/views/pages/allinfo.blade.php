@extends('layouts.layout')
@section('content')
<div class="box span6">
	<div class="box-header">
		<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Striped Table</h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>
	</div>
	<p class="alert-success" style="font-size: 20px;"><?php
$message = Session::get('message');
if ($message) {
	echo $message;
	Session::put('message', null);
}
?>
	</p>
	<div class="box-content">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Contact Name</th>
					<th>Number</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($hasan as $val)
				<tr>
					<td>{{$val->id}}</td>
					<td class="center">{{$val->contact_name}}</td>
					<td class="center">{{$val->contact_number}}</td>
					<td class="center">
						<a href="{{URL::to('/edit_contact/'.$val->id)}}" class="btn btn-primary">Edit</a>
						<a onclick="return confirm('Are You Sure To Delete')" href="{{URL::to('/delete_contact/'.$val->id)}}" class="btn btn-danger" id="delete">Delete</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	</div><!--/span-->
	@endsection