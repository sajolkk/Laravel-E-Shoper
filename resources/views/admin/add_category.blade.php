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
			$catmsg=Session::get('catmsg');
			if ($catmsg) {
				echo $catmsg;
				Session::put('catmsg',null);
			}
		?>
	</span>
	<span style="margin-left: 30% !important; display: inline; background: #DC3545; color: white;">
			<?php
				$catmsgf=Session::get('catmsgf');
				if ($catmsgf) {
					echo $catmsgf;
					Session::put('catmsgf',null);
				}
			?>
		</span>

		<div class="box-icon" style="display: inline;">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>
	</div>
	<div class="box-content">

	<form class="form-horizontal" action="{{ URL('add_category_process')}}" method="post" enctype="">
	  
		{{ csrf_field() }}

	  <fieldset>
		
		<div class="control-group">
		  <label class="control-label" for="date01">Category Name </label>
		  <div class="controls">
			<input type="text" class="input-xlarge" id="" name="category_name" value="">
		  </div>
		</div>

		          
		<div class="control-group hidden-phone">
		  <label class="control-label" for="textarea2">Category Description</label>
		  <div class="controls">
			<textarea class="cleditor" id="textarea2" rows="3" name="category_description"></textarea>
		  </div>
		</div>

		<div class="control-group">
		  <label class="control-label" for="fileInput">Publication Status</label>
		  <div class="controls">
			<input class="input-file uniform_on" for="status" id="fileInput" type="checkbox" value="1" name="publication_status"> Active &nbsp;
			<input class="input-file uniform_on" for="status" id="fileInput" type="checkbox" value="0" name="publication_status">Unactive
		  </div>
		</div>

		<div class="form-actions">
		  <button type="submit" class="btn btn-primary"> Add Category </button>
		  <button type="reset" class="btn">Cancel</button>
		</div>
	  </fieldset>
	</form>
</div>
</div>

@endsection