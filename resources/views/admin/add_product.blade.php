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
	<i class="halflings-icon edit"></i><span class="break">&nbsp; Add Product </span>&nbsp;
	<span style="margin-left: 30% !important;  background: #28A745; color: white; display: inline;">
		<?php
			$promsg=Session::get('promsg');
			if ($promsg) {
				echo $promsg;
				Session::put('promsg',null);
			}
		?>
	</span>
	<span style="margin-left: 30% !important; display: inline; background: #DC3545; color: white;">
			<?php
				$promsgf=Session::get('promsgf');
				if ($promsgf) {
					echo $promsgf;
					Session::put('promsgf',null);
				}
			?>
			@if(count($errors)>0)
				@foreach($errors->all() as $error)
					{{ $error }}
				@endforeach
			@endif
		</span>

		<div class="box-icon" style="display: inline;">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>
	</div>
	<div class="box-content">

	<form class="form-horizontal" action="{{ URL('save-product')}}" method="post" enctype="multipart/form-data">
	  
		{{ csrf_field() }}

	  <fieldset>
		
		<div class="control-group">
		  <label class="control-label" for="date01">Product Name </label>
		  <div class="controls">
			<input type="text" class="input-xlarge" id="" name="product_name" value="" required autofocus>
			
		  </div>
		</div>

		          
		<div class="control-group hidden-phone">
		  <label class="control-label" for="textarea2"> Product Category  </label>
		  <div class="controls">
			<select name="category_id" class="input-xlarge"  id="" required autofocus>
				<option value="">Select Category</option>

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
				<option value=""> Select Manufacture Name </option>

				@if($result=DB::table('manufacture')->where('publication_status', 1)->get())
					@foreach($result as $data)
						<option value="{{ $data->manufacture_id }}"> {{ $data->manufacture_name }} </option>
					@endforeach
				@endif
				
			</select>
		  </div>
		</div>


		<div class="control-group hidden-phone">
		  <label class="control-label" for="textarea2">Product Short Description</label>
		  <div class="controls">
			<textarea class="" id="textarea2" rows="3" name="product_short_description" required autofocus></textarea>
		  </div>
		</div>


		<div class="control-group hidden-phone">
		  <label class="control-label" for="textarea2">Product Long Description</label>
		  <div class="controls">
			<textarea class="" id="textarea2" rows="3" name="product_long_description" required autofocus></textarea>
		  </div>
		</div>


		<div class="control-group">
		  <label class="control-label" for=""> Product Price </label>
		  <div class="controls">
			<input type="text" class="input-xlarge" id="" name="product_price" value="" required autofocus>			
		  </div>
		</div>


		<div class="control-group">
		  <label class="control-label" for=""> Product Image </label>
		  <div class="controls">
			<input type="file" class="input-xlarge" id="" name="product_image" value="" required autofocus>			
		  </div>
		</div>


		<div class="control-group">
		  <label class="control-label" for=""> Product Size </label>
		  <div class="controls">
			<input type="text" class="input-xlarge" id="" name="product_size" value="" required autofocus>			
		  </div>
		</div>



		<div class="control-group">
		  <label class="control-label" for=""> Product Color </label>
		  <div class="controls">
			<input type="text" class="input-xlarge" id="" name="product_color" value="" required autofocus>			
		  </div>
		</div>


		<div class="control-group">
		  <label class="control-label" for="fileInput">Publication Status</label>
		  <div class="controls">
			<input class="input-file uniform_on" for="status" id="fileInput" type="checkbox" value="1" name="publication_status"> Active &nbsp; &nbsp;
			<input class="input-file uniform_on" for="status" id="fileInput" type="checkbox" value="0" name="publication_status">Unactive
		  </div>
		</div>

		<div class="form-actions">
		  <button type="submit" class="btn btn-primary"> Add Product </button>
		  <button type="reset" class="btn">Cancel</button>
		</div>
	  </fieldset>
	</form>
</div>
</div>

@endsection