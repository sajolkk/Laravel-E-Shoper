<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
session_start();

class productController extends Controller
{

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
    
    
    public function index()
    {   
        $this->adminCheck();
    	return view('admin.add_product');
    }

    public function save_product(Request $request)
    {
        $this->adminCheck();
    	$this->validate($request,[
    		'product_name'=>'required|min:1',
    		'product_short_description'=>'required|min:1',
    		'product_long_description'=>'required|min:1',
    		'product_price'=>'required|min:1',
    		'product_size'=>'required|min:1',
    		'product_color'=>'required|min:1',
    		'publication_status'=>'required|min:1',

    	]);
    	$data=array();
    	$data['product_name']=$request->product_name;
    	$data['category_id']=$request->category_id;
    	$data['manufacture_id']=$request->manufacture_id;
    	$data['product_short_description']=$request->product_short_description;
    	$data['product_long_description']=$request->product_long_description;
    	$data['product_price']=$request->product_price;
    	$data['product_size']=$request->product_size;
    	$data['product_color']=$request->product_color;
    	$data['publication_status']=$request->publication_status;

    	$image=$request->file('product_image');
    	if ($image) {
    		$image_name=str_random(20);
    		$ext=strtolower($image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$ext;
    		$upload_path="user/images/";
    		$iamge_url=$upload_path.$image_full_name;
    		$success=$image->move($upload_path,$image_full_name);
    		if ($success) {
    			$data['product_image']=$iamge_url;
    			DB::table('products')->insert($data);
    			Session::put('promsg', 'Product Add Successfully');
    			return Redirect::to('/add-product');
    		}
    	}
    	$data['product_image']='';
    		DB::table('products')->insert($data);
    		Session::put('promsgf', 'Product Add Without Image...!!');
    		return Redirect::to('/add-product');
    	/*$result=DB::table('products')->insert($data);
    	if ($result) {
    		Session::put('promsg', 'Product Add Successfully');
    		return Redirect::to('add-product');
    	}
    	else{
    		Session::put('promsgf', 'Product Add Fail...!!!');
    		return Redirect::to('add-product');
    	}*/
    }


    public function all_product()
    {	
        $this->adminCheck();
    	/*$data=DB::table('products')->get();
    	$manage_product=view('admin.all_product')->with('all_data', $data);
    	return view('admin_layout')->with('admin.all_product', $manage_product);*/

    	$data=DB::table('products')
            ->join('add_category', 'products.category_id', '=', 'add_category.category_id')
            ->join('manufacture', 'products.manufacture_id', '=', 'manufacture.manufacture_id')
            ->select('products.*', 'add_category.category_name', 'manufacture.manufacture_name')
            ->get();

    	return view('admin.all_product', ['all_data'=> $data]);
    }

    public function product_unactive($product_id)       
    {
        $this->adminCheck();
        $result=DB::table('products')->where('product_id', $product_id)->update(['publication_status'=> 0]);
        if ($result) {
            Session::put('promsg', $product_id.' No Product Unactivated Successfully');
            return Redirect::to('all-product');
        }
        else{
            Session::put('promsgf', $product_id.' No Product Unactivated Fail...!!!');
            return Redirect::to('all-product');
        }
    }

    public function product_active($product_id)
    {
        $this->adminCheck();
        $result=DB::table('products')->where('product_id', $product_id)->update(['publication_status'=>1]);
        if ($result) {
            Session::put('promsg', $product_id.' No Product Activated Successfully');
            return Redirect::to('all-product');
        }
    }


    public function product_update($product_id)
    {
        $data=DB::table('products')
            ->join('add_category', 'products.category_id', '=', 'add_category.category_id')
            ->join('manufacture', 'products.manufacture_id', '=', 'manufacture.manufacture_id')
            ->select('products.*', 'add_category.category_name', 'manufacture.manufacture_name')
            ->where('products.product_id', $product_id)
            ->first();
        $manage_data=view('admin.product_update')->with('all_data', $data);
        return view('admin_layout')->with('admin.product_update', $manage_data);
    }



    public function pro_update_process($product_id, Request $request)
    {
        $data=array();
        
        $data['category_id']=$request->category_id;
        $data['manufacture_id']=$request->manufacture_id;
        $data['product_name']=$request->product_name;
        $data['product_short_description']=$request->product_short_description;
        $data['product_long_description']=$request->product_long_description;
        $data['product_price']=$request->product_price;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $result=DB::table('products')->where('product_id', $product_id)->update($data);
        if ($result) {
            Session::put('promsg', $product_id.' No Product Update Successfully');
            return Redirect::to('all-product');
        }
    }



    public function delete_product($product_id)
    {
        $result=DB::table('products')->where('product_id', $product_id)->delete();
        if ($result) {
            Session::put('promsg', $product_id.' No Product Delete Successfully');
            return Redirect::to('all-product');
        }
        else{
            Session::put('promsgf', $product_id.' No Product Delete Fail...!!!');
            return Redirect::to('all-product');
        }
    }


}
