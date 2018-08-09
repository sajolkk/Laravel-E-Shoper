@extends('layout')
@section('content')


<div class="features_items">
    <h2 class="title text-center"> Please Fill up all Field </h2>

		<div class="shopper-informations">
			
					
			<p class="text-center text-primary">Shipping Details....</p>
			<div class="form-one" >
				<form action=" {{ URL::to('/save-shipping') }} " method="post">
					{{ csrf_field() }}
					<input type="text" name="shipping_first_name" placeholder="First Name *">
					<input type="text" name="shipping_last_name" placeholder="Last Name *">
					<input type="text" name="shipping_email" placeholder="Email *">
					<input type="text" name="shipping_address" placeholder="Address *">
					<input type="text" name="shipping_mobile" placeholder="Mobile Number *">
					<input type="text" name="shipping_city" placeholder="City *">


					<input type="submit" value="Submit" name="submit">
				</form>
			</div>
					
		</div>

	</div>

@endsection