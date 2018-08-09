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
		<a href="#">view order </a>
	</li>
</ul>
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span> Order Details </h2>

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
					  <th> Product Id </th>
					  <th> Product Name </th>
					  <th> Product Color </th>
					  <th> Product Size </th>
					  <th> Product Price </th>
					  <th> Product Sales Quantity </th>
					  <th> Product Sub Total </th>
					  
					  
				  </tr>
			  </thead>   
			  <tbody>
			 @foreach($all_data as $data)
				@if($cou=count($all_data))
				@endif
				<tr>
					<td class="center text-center"> {{ $data->order_id }} </td>
					<td class="center"> {{ $data->product_id}} </td>
					<td class="center"> {{ $data->product_name}} </td>
					<td class="center">  </td>
					<td class="center">  </td>
					<td class="center" > {{ $data->product_price }} </td>
					<td class="center" > {{ $data->product_sales_quantity }} </td>
					<td class="center" > {{ $data->product_sales_quantity*$data->product_price }} </td>	
				</tr>
				@endforeach
				<tr>
					<th colspan="6" style="text-align: right; padding-right: 20px;"> Product Total Price = </th>
					<th colspan="2"> {{ $data->order_total }} Tk </th>
				</tr>

				
			  </tbody>
		  </table>            
		</div>
	</div><!--/span-->

</div><!--/row-->


<div class="row-fluid sortable" style="margin-bottom: 100px;">
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span> Customer Details </h2>
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
									  <th>Customer Name</th>
									  <th>Mobile</th>                                          
								  </tr>
							  </thead>   
							  <tbody>
							  	@foreach($all_data as $data)
							  	@if($loop->first)
								<tr>
									<td> {{ $data->customer_name }} </td>
									<td class="center"> {{ $data->customer_mobile }} </td>                                    
								</tr>
								@endif
								@endforeach                           
							  </tbody>
						 </table>      
					</div>
				</div><!--/span-->
				
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span> Shipping Details </h2>
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
									  <th> Username </th>
									  <th> Email </th>
									  <th> Mobile </th>
									  <th> Address </th>
								  </tr>
							  </thead>   
							  <tbody>
							  	@foreach($all_data as $data)
							  	@if($loop->first)
								<tr>
									<td> {{ $data->shipping_first_name }} </td>
									<td> {{ $data->shipping_email }} </td>
									<td> {{ $data->shipping_mobile }} </td>
									<td> {{ $data->shipping_address }} </td>
								</tr> 
								@endif 
								@endforeach                                 
							  </tbody>
						 </table>     
					</div>
				</div><!--/span-->
			</div><!--/row-->
@endsection