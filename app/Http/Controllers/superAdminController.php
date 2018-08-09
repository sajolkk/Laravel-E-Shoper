<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class superAdminController extends Controller
{
	public function index()
	{	
		$this->adminCheck();
		return view('admin.dashboard');
	}

    public function logout()
    {
    	/*Session::put('admin_name', null);
    	Session::put('admin_id', null);*/
    	Session::flush();
    	return Redirect('/admin-login');
    }

    public function adminCheck()
    {
    	$admin_id=Session::get('admin_id');
    	if ($admin_id) {
    		return ;
    	}
    	else{
   			return Redirect::to('/admin-login')->send();
    	}
    }

    
}
