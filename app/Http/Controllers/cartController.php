<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use Cart;
session_start();



class cartController extends Controller
{
    public function add_cart(Request $request)
    {
    	$data=array();
    	$data['qty']=$request->qty;
    	$data['id']=$request->product_id;

    	$result=DB::table('products')->where('product_id', $data['id'])->first();

    	$data['name']=$result->product_name;
    	$data['price']=$result->product_price;
    	$data['options']['image']=$result->product_image;

    	Cart::add($data);
    	return Redirect::to('/show-cart');	
    }


    public function show_cart()
    {
    	$data=DB::table('add_category')->where('publication_status', 1)->get();
    	$manage_cart=view('pages.add_cart')->with('all_data', $data);
    	return view('layout')->with('pages.add_cart', $manage_cart);
    }

    public function delete_cart($rowId)
    {
    	Cart::update($rowId, 0);
    	return Redirect::to('/show-cart');
    }

    public function cart_update(Request $request)
    {	
    	
    	$qty=$request->qty;
    	$rowId=$request->rowId;
    	Cart::update($rowId, $qty);
    	return Redirect::to('/show-cart');
    }
}
