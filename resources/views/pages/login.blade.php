@extends('layout')
@section('content')




<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action=" {{ URL::to('/customer-login') }} " method="post">
							{{ csrf_field() }}
							<input type="email" name="customer_email" placeholder="User Email" />
							<input type="password" name="customer_password" placeholder="User Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action=" {{ URL::to('/customer-reg-process') }} " method="post">
							{{ csrf_field() }}

							<input type="text" name="customer_name" placeholder="Full Name"/>
							<input type="email" name="customer_email" placeholder="User Email"/>
							<input type="mobile" name="customer_mobile" placeholder="Mobile"/>
							<input type="password" name="customer_password" placeholder="Password"/>
							<h6 class="text-danger">
								@if($cusmsg=Session::get('cusmsg'))
									@if($cusmsg)
										{{ $cusmsg }}
										@else(Session::put('cusmsg', null))
									@endif
								@endif
							</h6>
							<input type="password" name="confirm_password" placeholder="Confirm password"/>
							
							<button type="submit" name="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	


@endsection