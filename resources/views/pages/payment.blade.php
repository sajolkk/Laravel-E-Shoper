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
		

		<div class="total_area" style="border: 1px solid #E6E4DF; padding: 5px;">
			<ul>
				<li>Cart Sub Total <span> {{ Cart::subtotal() }} Tk </span></li>
				<li>Eco Tax <span> {{ Cart::tax() }} Tk </span></li>
				<li>Shipping Cost <span>Free</span></li>
				<li>Total <span> {{ Cart::total() }} Tk </span></li>
			</ul>
		</div>


	</section> <!--/#cart_items-->


<section id="do_action">
	<div class="container">
		<div class="paymentCont col-md-12">
			<div class="headingWrap col-md-12 text-center">
					<h3 class="headingTop text-center">Select Your Payment Method</h3>	
					<p class="text-center">Created with bootsrap button and using radio button</p>
			</div>
			<div class="paymentWrap">
			<form action=" {{ URL::to('/payment-process') }} " method="post">
				{{ csrf_field() }}
				<div class="btn-group paymentBtnGroup" data-toggle="buttons">
		            <label class="btn paymentMethod active">
		            	<div class="method visa">
		            		<img src=" {{ URL::to('user/images/hand-cash.png') }} " alt="">
		            	</div>
		                <input type="radio" name="payment_method" value="handcash" checked> 
		            </label>
		            <label class="btn paymentMethod">
		            	<div class="method master-card">
		            		<img src=" {{ URL::to('user/images/paypal.png') }} " alt="">
		            	</div>
		                <input type="radio" name="payment_method" value="paypal"> 
		            </label>
		            <label class="btn paymentMethod">
	            		<div class="method amex">
	            			<img src=" {{ URL::to('user/images/bkash.jpg') }} " alt="">
	            		</div>
		                <input type="radio" name="payment_method" value="bkash">
		            </label>
		       		<label class="btn paymentMethod">
	             		<div class="method vishwa">
	             			<img src=" {{ URL::to('user/images/rocket.jpg') }} " alt="">
	             		</div>
		                <input type="radio" name="payment_method" value="rocket"> 
		            </label>

		            <label class="btn paymentMethod">
	             		<div class="method vishwa">
	             			<img src=" {{ URL::to('user/images/master-card.png') }} " alt="">
	             		</div>
		                <input type="radio" name="payment_method" value="mastercard"> 
		            </label>
		        </div>
		        <br>
		        <button class="btn btn-default check_out" type="submit" name="submit" >Submit</button>

			</form>
				    
	
			</div>
			<div class="footerNavWrap clearfix">
				
			</div>
		
		</div>
	</div>
</section><!--/#do_action-->
</div>
@endsection