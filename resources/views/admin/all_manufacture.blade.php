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
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span> All Category </h2>

			<span style="margin-left: 30% !important; display: inline-block; background: #28A745; color: white;">
				
				<?php
					$manumsg=Session::get('manumsg');
					if ($manumsg) {
						echo $manumsg;
						Session::put('manumsg',null);
					}
				?>
			</span>
			<span style="margin-left: 30% !important; display: inline-block; background: #DC3545; color: white;">
				
				<?php
					$manumsgf=Session::get('manumsgf');
					if ($manumsgf) {
						echo $manumsgf;
						Session::put('manumsgf',null);
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
					  <th> Manufacture Id </th>
					  <th> Manufacture Name </th>
					  <th> Manufacture Description </th>
					  <th> Manufacture Status </th>
					  <th> Actions </th>
				  </tr>
			  </thead>   
			  <tbody>
			 @foreach($all_data as $data)

				<tr>
					<td class="center text-center"> {{ $data->manufacture_id }} </td>
					<td class="center"> {{ $data->manufacture_name}} </td>
					<td class="center"> {{ $data->manufacture_description }} </td>
					
					<td class="center">
						@if( $data->publication_status==1)
							<span class="label label-success">{{-- {{ $data->publication_status}} --}}
						 	Active</span>
						@else
							<span class="label label-danger">{{-- {{ $data->publication_status}} --}}
						 	Unactive</span>
						
						@endif
					</td>
					<td class="center">
						@if($data->publication_status==1)
							<a class="btn btn-danger" href="{{ URL::to('/manufacture_unactive/'.$data->manufacture_id) }}" title="Click on to Unactive">
								<i class="halflings-icon white thumbs-down " ></i>  
							</a>
						@else
							<a class="btn btn-success" href="{{ URL::to('/manufacture_active/'.$data->manufacture_id) }}" title="Click on to Active">
								<i class="halflings-icon white thumbs-up "></i>  
							</a>
						@endif

						<a class="btn btn-info" href="{{ URL::to('/manufacture-update/'.$data->manufacture_id) }}">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" href="{{ URL::to('/delete-manufacture/'.$data->manufacture_id) }}" id="delete">
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