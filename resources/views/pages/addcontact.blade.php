@extends('layouts.app')
@section('content')
<div class="box-content">
	<p><?php 
	$message=Session::get('message');
	if($message)
	{
		echo $message;
		Session::put('message',null);
	}
	 ?>
	</p>
	
	<form class="form-horizontal" method="post" action="{{URL('save_contact')}}">
		{{ csrf_field() }}  <!-- form ta secured korar jonno  -->
		<fieldset>
			<div class="control-group">
				<label class="control-label" for="focusedInput">Contact name</label>
				<div class="controls">
					<input class="input-xlarge focused" id="focusedInput" type="text" name="contact_name" required="">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="focusedInput">Contact number</label>
				<div class="controls">
					<input class="input-xlarge focused" id="focusedInput" type="number" name="contact_number" required="">
				</div>
			</div>
			
			
			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Add contact</button>
			</div>
		</fieldset>
	</form>
	
</div>
@endsection