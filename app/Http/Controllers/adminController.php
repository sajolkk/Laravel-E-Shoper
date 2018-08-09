<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();


class adminController extends Controller
{
    public function index()

    {   

    	return view('admin.admin_login');
    }

    public function login_process(Request $request)
    {
       

    	$admin_email=$request->admin_email;
    	$admin_password=md5($request->admin_password);
    	$result=DB::table('admin')
    			->where('admin_email', $admin_email)
    			->where('admin_password', $admin_password)
    			->first();
    	if($result){
    		Session::put('admin_name', $result->admin_name);
    		Session::put('admin_id', $result->admin_id);
    		return Redirect::to('/dashboard');
    	}
    	else{
    		Session::put('log_error', 'Email or Password Invalid');
    		return Redirect::to('admin-login');
    	}

    }

    
}
