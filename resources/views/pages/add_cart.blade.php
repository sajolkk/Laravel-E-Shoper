@extends('layout')

@section('content')



<div class="features_items">

	<section id="cart_items">
		<div class="">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href=" {{ URL::to('/') }} ">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>

		
			<div class="cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image"> Image </td>
							<td class="description"> Name </td>
							<td class="price"> Price </td>
							<td class="quantity"> Quantity </td>
							<td class="total"> Total </td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					@if($contents=Cart::content())
					@foreach($contents as $data)
						<tr>
							<td class="cart_product">
								<a href=""><img src=" {{ $data->options->image }} " height="100px" width="100px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""> {{ $data->name }} </a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p> {{ $data->price }}Tk </p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">

									<form action=" {{ URL::to('/cart-update') }} " method="post" >
									{{ csrf_field() }}
	
									<input class="cart_quantity_input" type="text" name="qty" value=" {{ $data->qty }} " autocomplete="off" size="2">
									<input type="hidden" name="rowId" value=" {{ $data->rowId }} ">
									<input type="submit" name="update" value="Update" class="btn">

									</form>

								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"> {{ $data->total }}Tk </p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=" {{ URL::to('delete-cart/'. $data->rowId) }} "><i class="fa fa-times"></i></a>
							</td>
						</tr>

						

					@endforeach
					@endif	
						
					</tbody>
				</table>
				@if(count($contents)== 0)
					<h3 class="text-danger text-center">
						Shopping Card is Empty...!!!
					</h3>
				@endif
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span> {{ Cart::subtotal() }} Tk </span></li>
							<li>Eco Tax <span> {{ Cart::tax() }} Tk </span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span> {{ Cart::total() }} Tk </span></li>
						</ul>
							<a class="btn btn-default update" href="   ">Update</a>

						<?php 
							$customer_id=Session::get('customer_id');
							$shipping_id=Session::get('shipping_id');
							if($customer_id != NULL && $shipping_id == NULL)	
							{
						?>
							<a class="btn btn-default check_out" href="  {{ URL::to('/checkout') }} ">Check Out</a>
						<?php 
							}
							elseif($customer_id != NULL && $shipping_id != NULL){
						?>
						 	<a class="btn btn-default check_out" href="  {{ URL::to('/payment') }} "> Payment </a>
						<?php 
							}
							else{
						?>
							<a class="btn btn-default check_out" href="  {{ URL::to('/login-or-registration') }} ">Check Out</a>
						<?php 
							}
						?>

					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->


</div>



@endsection