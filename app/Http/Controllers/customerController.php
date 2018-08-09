<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class customerController extends Controller
{
    public function customer_reg_process(Request $request)
    {
    	$data=array();
    	$data['customer_name']=$request->customer_name;
    	$data['customer_email']=$request->customer_email;
    	$data['customer_mobile']=$request->customer_mobile;
    	$data['customer_password']=md5($request->customer_password);
    	$password=md5($request->confirm_password);

    	if($password==$data['customer_password'])
    	{
    		$customer_id=DB::table('customer')->insertGetId($data);
    		Session::put('customer_id', $customer_id);
    		Session::put('customer_name', $request->customer_name);
    		return Redirect::to('/checkout');
    	}
    	else{
    			Session::put('cusmsg', 'Password not match...!!!');
    			return Redirect::to('/login');
    		}
    }


    public function customer_login(Request $request)
    {
    	$customer_email=$request->customer_email;
    	$customer_password=md5($request->customer_password);
    	$result=DB::table('customer')
    		->where('customer_email', $customer_email)
    		->where('customer_password', $customer_password)
    		->first();
    	if ($result) {
    		Session::put('customer_id', $result->customer_id);
    		Session::put('customer_name', $result->customer_name);
    		return Redirect::to('/checkout');
    	}

    	else{
    		return Redirect::to('/login-or-registration');
    	}
    	

    }

        public function customer_logout()
    {
    	Session::flush();
    	return Redirect::to('/');
    }
}
