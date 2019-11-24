@extends('home')
@section('contents')

@include('layouts.msg')
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>Galleries List</h2>
			<div class="box-icon">
				<a href="{{url('/add-slider')}}" style="background-color: lightgreen;text-decoration: none;padding: 5px 10px;color: white;">Add Gallery</a>
				<!-- <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a> -->
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th width="5%">SN</th>
					  <th width="15%">Home Slider Title</th>
					  <th width="20%">Home Slider Image</th>
					  <th width="15%">Home Slider Title Topics</th>
					  <th width="20%">Slider Title Image</th>
					  <th width="10%">Slider Status</th>
					  <th width="15%">Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
			  	@if(isset($allSlider))
				  	@foreach($allSlider as $key=> $slider)
					<tr>
						<td class="center">{{ $key + 1 }}</td>
						<td class="center">{{ $slider->home_slider_title }}</td>
						<td class="center">
							<img class="img-responsive img-thumbnail" src="{{ asset('uploads/SliderImage/'.$slider->home_slider_image) }}" style="height:100px;width:100px;">
						</td>
						<td class="center">{{ $slider->home_slider_title_topics }}</td>
						<td class="center">
							<img class="img-responsive img-thumbnail" src="{{ asset('uploads/SliderTitleImage/'.$slider->slider_title_image) }}" style="height:100px;width:100px;">
						</td>
						<td class="center">
							@if($slider->slider_status == 1)
								<span class="label label-success">Active</span>
							@else
								<span class="label label-warning">Inactive</span>
							@endif
						</td>
						<td class="center">
							<a class="btn btn-info" href="{{url('/edit-slider/'.$slider->id)}}">
								<i class="halflings-icon white edit"></i>  
							</a>
							<a class="btn btn-danger" href="{{url('/delete-slider/'.$slider->id)}}" onclick="return confirm('Are you sure to Delete?')">
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