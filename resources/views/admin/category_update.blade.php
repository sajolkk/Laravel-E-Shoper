
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
	<span class="alert alert-success" style="padding: 2px; margin-left: 30%;">
		<?php
			$catmsg=Session::get('catmsg');
			if ($catmsg) {
				echo $catmsg;
				Session::put('catmsg',null);
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

	<form class="form-horizontal" action="{{ URL('category-update-process/'.$all_data->category_id)}}" method="post" enctype="">
	  
		{{ csrf_field() }}

	  <fieldset>
		
		<div class="control-group">
		  <label class="control-label" for="date01">Category Name </label>
		  <div class="controls">
			<input type="text" class="input-xlarge" id="" name="category_name" value="{{ $all_data->category_name}}">
		  </div>
		</div>

		          
		<div class="control-group hidden-phone">
		  <label class="control-label" for="textarea2">Category Description</label>
		  <div class="controls">
			<textarea class="cleditor" id="textarea2" rows="3" name="category_description">
				{{ $all_data->category_description }}
			</textarea>
		  </div>
		</div>

		
		<div class="form-actions">
		  <button type="submit" class="btn btn-primary"> Update Category </button>
		  <button type="reset" class="btn">Cancel</button>
		</div>
	  </fieldset>
	</form>
</div>
</div>
@endsection
