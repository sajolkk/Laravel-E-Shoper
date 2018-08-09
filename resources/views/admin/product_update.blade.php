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
	<i class="halflings-icon edit"></i><span class="break">&nbsp; Update Product </span>&nbsp;
		<div class="box-icon" style="display: inline;">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>
	</div>
	<div class="box-content">

	<form class="form-horizontal" action="{{ URL('/product-update-process/'.$all_data->product_id) }}" method="post" enctype="multipart/form-data">
	  
		{{ csrf_field() }}

	  <fieldset>
		
		<div class="control-group">
		  <label class="control-label" for="date01">Product Name </label>
		  <div class="controls">
			<input type="text" class="input-xlarge" id="" name="product_name" value=" {{ $all_data->product_name }} " required autofocus>
			
		  </div>
		</div>

		          
		<div class="control-group hidden-phone">
		  <label class="control-label" for="textarea2"> Product Category  </label>
		  <div class="controls">
			<select name="category_id" class="input-xlarge"  id="" required autofocus>
				<option value=" {{ $all_data->category_id }} "> {{ $all_data->category_name }} </option>

				@if($result=DB::table('add_category')->where('publication_status', 1)->get())
					@foreach($result as $data)
						<option value="{{ $data->category_id }}"> {{ $data->category_name}} </option>
					@endforeach
				@endif
				
			</select>
		  </div>
		</div>


		<div class="control-group hidden-phone">
		  <label class="control-label" for="textarea2"> Manufacture Name </label>
		  <div class="controls">
			<select name="manufacture_id" class="input-xlarge"  id="" required autofocus>
				<option value=" {{ $all_data->manufacture_id }} "> {{ $all_data->manufacture_name }} </option>

				@if($result=DB::table('manufacture')->where('publication_status', 1)->get())
					@foreach($result as $data)
						<option value="{{ $data->manufacture_id }}"> {{ $data->manufacture_name }} </option>
					@endforeach
				@endif 
				
			</select>
		  </div>
		</div>


		<div class="control-group">
		  <label class="control-label" for=""> Product Image </label>
		  <div class="controls">
		  	<img src="{{ URL::to($all_data->product_image )}}" alt="" style="padding: 2px; border: 1px solid #d1d1d1;">			
		  </div>
		</div>


		<div class="control-group hidden-phone">
		  <label class="control-label" for="textarea2">Product Short Description</label>
		  <div class="controls">
			<textarea class="" id="textarea2" rows="3" name="product_short_description" required autofocus>
				{{ $all_data->product_short_description }}
			</textarea>
		  </div>
		</div>


		<div class="control-group hidden-phone">
		  <label class="control-label" for="textarea2">Product Long Description</label>
		  <div class="controls">
			<textarea class="" id="textarea2" rows="3" name="product_long_description" required autofocus>
				{{ $all_data->product_long_description }}
			</textarea>
		  </div>
		</div>


		<div class="control-group">
		  <label class="control-label" for=""> Product Price </label>
		  <div class="controls">
			<input type="text" class="input-xlarge" id="" name="product_price" value=" {{ $all_data->product_price }} " required autofocus>			
		  </div>
		</div>



		<div class="control-group">
		  <label class="control-label" for=""> Product Size </label>
		  <div class="controls">
			<input type="text" class="input-xlarge" id="" name="product_size" value=" {{ $all_data->product_size }} " required autofocus>			
		  </div>
		</div>



		<div class="control-group">
		  <label class="control-label" for=""> Product Color </label>
		  <div class="controls">
			<input type="text" class="input-xlarge" id="" name="product_color" value=" {{ $all_data->product_color }} " required autofocus>			
		  </div>
		</div>

		<div class="form-actions">
		  <button type="submit" class="btn btn-primary"> Update Product </button>
		  <button type="reset" class="btn">Cancel</button>
		</div>
	  </fieldset>
	</form>
</div>
</div>

@endsection