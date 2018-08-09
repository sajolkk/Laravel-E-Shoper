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
	<i class="halflings-icon edit"></i><span class="break">&nbsp;Add Category</span>&nbsp;
	<span style="margin-left: 30% !important;  background: #28A745; color: white; display: inline;">
		<?php
			$manumsg=Session::get('manumsg');
			if ($manumsg) {
				echo $manumsg;
				Session::put('manumsg',null);
			}
		?>
	</span>
	<span style="margin-left: 30% !important; display: inline; background: #DC3545; color: white;">
			<?php
				$manumsgf=Session::get('manumsgf');
				if ($manumsgf) {
					echo $manumsgf;
					Session::put('manumsgf',null);
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

	<form class="form-horizontal" action="{{ URL('/manu-update-process/'.$all_data->manufacture_id)}}" method="post" enctype="">
	  
		{{ csrf_field() }}

	  <fieldset>
		
		<div class="control-group">
		  <label class="control-label" for="date01">Manufacture Name </label>
		  <div class="controls">
			<input type="text" class="input-xlarge" id="" name="manufacture_name" value="{{ $all_data->manufacture_name}}" required autofocus>
			
		  </div>
		</div>

		          
		<div class="control-group hidden-phone">
		  <label class="control-label" for="textarea2">Manufacture Description</label>
		  <div class="controls">
			<textarea class="cleditor" id="textarea2" rows="3" name="manufacture_description" required autofocus>
				{{ $all_data->manufacture_description }}
			</textarea>
		  </div>
		</div>

		<div class="form-actions">
		  <button type="submit" class="btn btn-primary"> Update Manufacture </button>
		  <button type="reset" class="btn">Cancel</button>
		</div>
	  </fieldset>
	</form>
</div>
</div>

@endsection