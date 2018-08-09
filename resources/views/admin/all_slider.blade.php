@extends('admin_layout')
@section('admin_content')


<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Add Category</a>
	</li>
</ul>
<div class="row-fluid sortable ">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span> All Category </h2>

			<span style="margin-left: 30% !important; display: inline-block; background: #28A745; color: white;">
				
				<?php
					$slidermsg=Session::get('slidermsg');
					if ($slidermsg) {
						echo $slidermsg;
						Session::put('slidermsg',null);
					}
				?>
				
			</span>
			<span style="margin-left: 30% !important; display: inline-block; background: #DC3545; color: white;">
				
				<?php
					$slidermsgf=Session::get('slidermsgf');
					if ($slidermsgf) {
						echo $slidermsgf;
						Session::put('slidermsgf',null);
					}
				?>
			</span>

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
					  <th> Slider Id </th>
					  <th> Slider Image </th>
					  <th> Status </th>
					  <th> Actions </th>
				  </tr>
			  </thead>   
			  <tbody>
			 
			@foreach($all_data as $data)
				<tr>
					<td class="center text-center"> {{ $data->slider_id }} </td>
					<td class="center"> 
						<img src=" {{ URL::to( $data->slider_image )}} " height="300px;" width="300px;" alt="">
					</td>
					
					<td class="center" style="width: 50px;">

						@if( $data->publication_status==1 )
							<span class="label label-success">Active</span>
						@else
							<span class="label label-danger">Unactive</span>
						@endif						
						
					</td>
					<td class="center">

						@if( $data->publication_status==1 )
							<a class="btn btn-danger" href=" {{ URL::to('/slider-unactive/'.$data->slider_id ) }} " title="Click for Unactive">
								<i class="halflings-icon white thumbs-down " ></i>  
							</a>
						@else
							<a class="btn btn-success" href=" {{ URL::to('/slider-active/'.$data->slider_id ) }} " title="Click for Active">
								<i class="halflings-icon white thumbs-up " ></i>  
							</a>
						@endif

						<a class="btn btn-danger" href=" {{ URL::to('/delete-slider/'.$data->slider_id ) }} " id="delete" title="Click for Delete">
							<i class="halflings-icon white trash"></i> 
						</a>
					</td>
				</tr>
			@endforeach	
				
			  </tbody>
		  </table>            
		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection