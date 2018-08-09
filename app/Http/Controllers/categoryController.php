<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
session_start();


class categoryController extends Controller
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
    	return view('admin.add_category');
    }


    public function add_category_process(Request $request)
    {
        $this->adminCheck();
    	$data=array();
    	$data['category_name']=$request->category_name;
    	$data['category_description']=$request->category_description;
    	$data['publication_status']=$request->publication_status;

    	$result=DB::table('add_category')->insert($data);
    	if ($result) {
    		Session::put('catmsg','Category Add Successfully');
    		return Redirect::to('add-category');
    	}
    	else{
    		Session::put('catmsgf', 'Category Add fail..!!!!');
    		return Redirect::to('add-category');
    	}
    }

    public function all_category()
	    {
            $this->adminCheck();
	    	$data=DB::table('add_category')->get();
	    	$manage_category = view('admin.all_category')->with('all_data', $data);
	    	return view ('admin_layout')->with('admin.all_category',$manage_category);
	    }

	public function category_unactive($category_id)
	{
        $this->adminCheck();
		DB::table('add_category')->where('category_id', $category_id)->update(['publication_status'=>0]);
		Session::put('catmsg', $category_id.' No Category Unactivated Successfully..');
		return Redirect::to('all-category');
	}

	public function category_active($category_id)
	{
        $this->adminCheck();
		DB::table('add_category')->where('category_id', $category_id)->update(['publication_status'=>1]);
		Session::put('catmsg', $category_id.' No Category Activated Successfully..');
		return Redirect::to('all-category');
	}


    public function category_update($category_id)       
    {
        $this->adminCheck();
        $data=DB::table('add_category')->where('category_id', $category_id)->first();
        $manage_category=view('admin.category_update')->with('all_data', $data);
        return view('admin_layout')->with('admin.category_update', $manage_category);

    }

    public function cat_update_process($category_id, Request $request)
    {
        $this->adminCheck();
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $result=DB::table('add_category')->where('category_id', $category_id)->update($data);

        if ($result) {
            Session::put('catmsg', $category_id.' No Category Update Successfully');
        }
        else{
            Session::put('catmsgf', $category_id.' No Category Update Fail..!!!!');
        }
        return Redirect::to('all-category');
    }

    public function delete_category($category_id)
    {
        $this->adminCheck();
        $result=DB::table('add_category')->where('category_id', $category_id)->delete();
        if ($result) {
            Session::put('catmsg', 'Category Delete Successfully');
        }
        else{
            Session::put('catmsgf', 'Category Delete fail');
        }

        return Redirect::to('all-category');
    }

}
