@extends('layout')
@section('content')

<div class="features_items">


	<h2 class="text-center text-success">
		@if($paymetmsg=Session::get('paymetmsg'))
		@if($paymetmsg)
			{{ $paymetmsg }}
		@endif
		@endif
	</h2>
	<h4 class="text-center text-primary " style="padding-bottom: 20px;">We will contact as soon as possible. </h4>



@include('pages.search_empty')


</div>

@endsection