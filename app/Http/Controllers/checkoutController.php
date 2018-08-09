<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use Cart;
session_start();

class checkoutController extends Controller
{

	public function customercheck()
    {
        $customer_id=Session::get('customer_id');
    	if ($customer_id) {
    		return ;
    	}
    	else{
   			return Redirect::to('/login-or-registration')->send();
    	}
    }



    public function login_registration()
    {
    	return view('pages.login');
    }


    public function checkout()
    {	
    	$this->customercheck();
    	return view('pages.checkout');
    }

    
     public function save_shipping(Request $request)
    {
    	$this->customercheck();
    	$data=array();
    	$data['shipping_first_name']=$request->shipping_first_name;
    	$data['shipping_last_name']=$request->shipping_last_name;
    	$data['shipping_email']=$request->shipping_email;
    	$data['shipping_address']=$request->shipping_address;
    	$data['shipping_mobile']=$request->shipping_mobile;
    	$data['shipping_city']=$request->shipping_city;

    	$shipping_id=DB::table('shipping')->insertGetId($data);
    	Session::put('shipping_id', $shipping_id);
    	return Redirect::to('/payment');
    }

    public function payment()
    {
    	$this->customercheck();
    	return view('pages.payment');
    }


    public function payment_process(Request $request)
    {
    	$this->customercheck();
    	$pdata=array();
    	$pdata['payment_method']=$request->payment_method;
    	$pdata['payment_status']="pending";
    	$payment_id=DB::table('payment')->insertGetId($pdata);

    	$odata=array();
    	$odata['customer_id']=Session::get('customer_id');
    	$odata['shipping_id']=Session::get('shipping_id');
    	$odata['payment_id']=$payment_id;
    	$odata['order_total']=Cart::total();
    	$odata['order_status']="pending";
    	$order_id=DB::table('order')->insertGetId($odata);

    	$contents=Cart::content();
    	$oddata=array();
    	foreach ($contents as $value) {
    		$oddata['order_id']=$order_id;
    		$oddata['product_id']=$value->id;
    		$oddata['product_name']=$value->name;
    		$oddata['product_price']=$value->price;
    		$oddata['product_sales_quantity']=$value->qty;
    		DB::table('order_details')->insert($oddata);
    	}

    	$payment_method=$pdata['payment_method'];
    	if ($payment_method == "handcash") {
    		Cart::destroy();
    		Session::put('paymetmsg', "Your Order Successfully done by handcash");
    		
    		return Redirect::to('/order-complete');
    	}
    	elseif ($payment_method == "paypal") {
    		Cart::destroy();
    		Session::put('paymetmsg', "Your Order Successfully done by paypal");
    	}
    	elseif ($payment_method == "bkash") {
    		Cart::destroy();
    		Session::put('paymetmsg', "Your Order Successfully done by bkash");
    		
    		return Redirect::to('/order-complete');
    	}
    	elseif ($payment_method == "rocket") {
    		Cart::destroy();
    		Session::put('paymetmsg', "Your Order Successfully done by rocket");
    	
    		return Redirect::to('/order-complete');
    	}
    	elseif ($payment_method == "mastercard") {
    		Cart::destroy();
    		Session::put('paymetmsg', "Your Order Successfully done by mastercard");
    		
    		return Redirect::to('/order-complete');
    	}
    	else{
    		Session::put('paymetmsgf', "Your order fail...!!! Because You are not selected method");
    		return Redirect::to('/order-complete');
    	}

    }


    public function order_complete()
    {
    	$this->customercheck();
    	return view('/pages.order-complete');
    }


}
