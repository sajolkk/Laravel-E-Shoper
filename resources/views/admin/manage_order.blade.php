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
					$catmsg=Session::get('catmsg');
					if ($catmsg) {
						echo $catmsg;
						Session::put('catmsg',null);
					}
				?>
			</span>
			<span style="margin-left: 30% !important; display: inline-block; background: #DC3545; color: white;">
				
				<?php
					$catmsgf=Session::get('catmsgf');
					if ($catmsgf) {
						echo $catmsgf;
						Session::put('catmsgf',null);
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
					  <th> Order Id </th>
					  <th> Customer Name </th>
					  <th> Order Total </th>
					  <th> Order Status </th>
					  <th> Order Date </th>
					  <th> Actions </th>
				  </tr>
			  </thead>   
			  <tbody>
			 @foreach($all_data as $data)

				<tr>
					<td class="center text-center"> {{ $data->order_id }} </td>
					<td class="center"> {{ $data->customer_name}} </td>
					<td class="center" > {{ $data->order_total }} </td>
					<td class="center" > {{ $data->order_status }} </td>
					<td class="center" > {{ $data->created_at }} </td>
					
					{{--<td class="center" style="width: 50px;">
						@if( $data->order_status==1)
							<span class="label label-success">{{{{ $data->publication_status}} }}
						 	Active</span>
						@else
							<span class="label label-danger">{{ {{ $data->publication_status}} }}
						 	Unactive</span>
						
						@endif --}}
					</td>
					<td class="center">
						@if($data->order_status==1)
							<a class="btn btn-danger" href="{{ URL::to('/category_unactive/') }}" title="Click on to Unactive">
								<i class="halflings-icon white thumbs-down " ></i>  
							</a>
						@else
							<a class="btn btn-success" href="{{ URL::to('/category_active/') }}" title="Click on to Active">
								<i class="halflings-icon white thumbs-up "></i>  
							</a>
						@endif

						<a class="btn btn-info" href="{{ URL::to('/view-order/'.$data->order_id) }}">
							<i class="icon-eye-open white edit"></i>  
						</a>
						<a class="btn btn-danger" href="{{ URL::to('/delete-order/') }}" id="delete">
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