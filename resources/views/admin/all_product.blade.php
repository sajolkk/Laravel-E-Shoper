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
					$promsg=Session::get('promsg');
					if ($promsg) {
						echo $promsg;
						Session::put('promsg',null);
					}
				?>
			</span>
			<span style="margin-left: 30% !important; display: inline-block; background: #DC3545; color: white;">
				
				<?php
					$promsgf=Session::get('promsgf');
					if ($promsgf) {
						echo $promsgf;
						Session::put('promsgf',null);
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
					  <th> Product Id </th>
					  <th> Product Name </th>
					  <th> Product Image </th>
					  <th> Product Price </th>
					  <th> Category Name </th>
					  <th> Manufacture Name </th>
					  <th> Status </th>
					  <th> Action </th>
				  </tr>
			  </thead>   
			  <tbody>
			 @foreach($all_data as $data)

				<tr>
					<td class="center text-center"> {{ $data->product_id }} </td>
					<td class="center"> {{ $data->product_name}} </td>
					 <td class="center"> <img src="{{ $data->product_image}}" width="150px;" height="150px;" alt=""> </td>
					 <td class="center"> {{ $data->product_price}} </td>
					 <td class="center"> {{ $data->category_name }} </td>
					 <td class="center"> {{ $data->manufacture_name }} </td>
					
					<td class="center" >
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
							<a class="btn btn-danger" href="{{ URL::to('/product-unactive/'.$data->product_id) }}" title="Click on to Unactive">
								<i class="halflings-icon white thumbs-down " ></i>  
							</a>
						@else
							<a class="btn btn-success" href="{{ URL::to('/product-active/'.$data->product_id) }}" title="Click on to Active">
								<i class="halflings-icon white thumbs-up "></i>  
							</a>
						@endif
							
						<a class="btn btn-info" href="{{ URL::to('/product-update/'.$data->product_id) }}" title="Click for edit">
							<i class="halflings-icon white edit"></i>  
						</a>  
						<a class="btn btn-danger" href="{{ URL::to('/delete-product/'.$data->product_id) }}" id="delete" title="Click for delete">
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