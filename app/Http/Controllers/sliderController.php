<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class sliderController extends Controller
{
    public function index()
    {
    	$this->adminCheck();
    	return view('admin.add_slider');
    }

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


    public function save_slider(Request $request)
    {
        $data=array();
        $data['publication_status']=$request->publication_status; 
        $image=$request->file('slider_image');

        if ($image) {
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path="user/images/";
            $iamge_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['slider_image']=$iamge_url;
                DB::table('slider')->insert($data);
                Session::put('slidermsg', 'Product Add Successfully');
                return Redirect::to('/add-slider');
            }
        }
        $data['slider_image']='';
            DB::table('slider')->insert($data);
            Session::put('slidermsgf', 'Product Add Without Image...!!');
            return Redirect::to('/add-slider');
    }

    public function all_slider()
    {   
        $data=DB::table('slider')->get();
        $manage_slider=view('admin.all_slider')->with('all_data', $data);
        return view('admin_layout')->with('admin.all_slider', $manage_slider);
    }

    public function slider_unactive($slider_id)         
    {
        $result=DB::table('slider')->where('slider_id', $slider_id)->update(['publication_status'=>0]);
        if ($result) {
            Session::put('slidermsg', $slider_id.' No Slider Unactivated Successfully');
            return Redirect::to('all-slider');
        }
        else{
            Session::put('slidermsgf', $slider_id.' No Slider Unactivated Fail...!!!');
            return Redirect::to('all-slider');
        }
    }

    public function slider_active($slider_id)
    {
        $result=DB::table('slider')->where('slider_id', $slider_id)->update(['publication_status'=>1]);
        if ($result) {
            Session::put('slidermsg', $slider_id.' No Slider Activated Successfully');
            return Redirect::to('all-slider');
        }
        else{
            Session::put('slidermsgf', $slider_id.' No Slider Activated Fail...!!!');
            return Redirect::to('all-slider');
        }
    }

    public function delete_slider($slider_id)
    {
        $result=DB::table('slider')->where('slider_id', $slider_id)->delete();
        if ($result) {
            Session::put('slidermsg', $slider_id.' No Slider Delete Successfully');
            return Redirect::to('all-slider'); 
        }
        else{
            Session::put('slidermsgf', $slider_id.' No Slider Delete Fail...!!!');
            return Redirect::to('all-slider');
        }
    }
}

