<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class orderController extends Controller
{
    public function adminCheck()
    {
    	$admin_id=Session::get('admin_id');
    	if ($admin_id) {
    		return;
    	}
    	else{
    		return Redirect::to('/admin-login')->send();
    	}
    }



    public function manage_order()
    {	
    	$this->adminCheck();
    	$data=DB::table('order')
    		->join('customer', 'customer.customer_id', '=', 'order.customer_id')
    		->select('order.*', 'customer.customer_name')
    		->get();
    	$manage_order=view('admin.manage_order')->with('all_data', $data);
    	return view('admin_layout')->with('admin.manage_order', $manage_order);
    }


    public function view_order($order_id)
    {
    	$this->adminCheck();
    	$data=DB::table('order')
    		->join('order_details', 'order_details.order_id', '=', 'order.order_id')
    		->join('shipping', 'shipping.shipping_id', '=', 'order.shipping_id')
    		->join('customer', 'customer.customer_id', '=', 'order.customer_id')
    		->select('order.*', 'order_details.*', 'shipping.*', 'customer.*')
    		->where('order.order_id', $order_id)
    		->get();
    	$manage_order=view('admin.view_order')->with('all_data', $data);
    	return view('admin_layout')->with('admin.view_order', $manage_order);
    }


}
