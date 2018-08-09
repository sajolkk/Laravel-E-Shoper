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
					<a href="#">Add Slider</a>
				</li>
			</ul>
<div class="row-fluid sortable">
	<div class="box span12">
	<div class="box-header" data-original-title>
	<i class="halflings-icon edit"></i><span class="break">&nbsp; Add Slider </span>&nbsp;
	<span style="margin-left: 30% !important;  background: #28A745; color: white; display: inline;">
		
		@if($slidermsg=Session::get('slidermsg'))
			@if($slidermsg)
				{{ $slidermsg }}
				{{ Session::put('slidermsg', null) }}
			@endif
		@endif
	</span>
	<span style="margin-left: 30% !important; display: inline; background: #DC3545; color: white;">
		
		@if($slidermsgf=Session::get('slidermsgf'))
			@if($slidermsgf)
				{{ $slidermsgf }}
				{{ Session::put('slidermsgf', null) }}
 			@endif
 		@endif

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

	<form class="form-horizontal" action="{{ URL('save-slider')}}" method="post" enctype="multipart/form-data">
	  
		{{ csrf_field() }}

	  <fieldset>
		
		<div class="control-group">
		  <label class="control-label" for=""> Slider Image </label>
		  <div class="controls">
			<input type="file" class="input-xlarge" id="" name="slider_image" value="" required autofocus>			
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
		  <button type="submit" class="btn btn-primary"> Add Slider </button>
		  <button type="reset" class="btn">Cancel</button>
		</div>
	  </fieldset>
	</form>
</div>
</div>

@endsection