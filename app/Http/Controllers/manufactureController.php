<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class manufactureController extends Controller
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
    	return view('admin.add_manufacture');
    }



    public function save_manufacture(Request $request)	
    {	
        $this->adminCheck();
    	$this->validate($request,[
    		'manufacture_name'=>'required|min:1',
    		'manufacture_description'=>'required|min:1',
    		'publication_status'=>'required|min:1',
    	]);

    	$data=array();
    	$data['manufacture_name']=$request->manufacture_name;
    	$data['manufacture_description']=$request->manufacture_description;
    	$data['publication_status']=$request->publication_status;
    	$result=DB::table('manufacture')->insert($data);
    	if ($result) {
    		Session::put('manumsg','Manufacture Add Successfully.');
    		return Redirect::to('/add-manufacture');
    	}
    	else{
    		Session::put('manumsgf', 'Manufacture Add fail...!!!');
    		return Redirect::to('/add-manufacture');
    	}
    }

    public function all_manufacture()
    {
        $this->adminCheck();
    	$data=DB::table('manufacture')->get();
    	$manage_manufacture=view('admin.all_manufacture')->with('all_data', $data);
    	return view('admin_layout')->with('admin.all_manufacture', $manage_manufacture);
    }

    public function manufacture_unactive($manufacture_id)
    {
        $this->adminCheck();
    	$result=DB::table('manufacture')->where('manufacture_id', $manufacture_id)->update(['publication_status'=>0]);
    	if ($result) {
    		Session::put('manumsg',$manufacture_id.' No Manufacture Unactivated Successfully');
    		return Redirect::to('all-manufacture');
    	}
    	else{
    		Session::put('manumsgf', $manufacture_id.' No Manufacture Unactivated fail...!!!');
    	}
    }

    public function manufacture_active($manufacture_id)
    {
        $this->adminCheck();
    	$result=DB::table('manufacture')->where('manufacture_id', $manufacture_id)->update(['publication_status'=>1]);
    	if ($result) {
    		Session::put('manumsg', $manufacture_id.' No Manufacture Activated Successfully');
    		return Redirect::to('all-manufacture');
    	}
    	else{
    		Session::put('manumsgf', $manufacture_id.' No Manufacture Activated fail...!!!');
    		return Redirect::to('all-manufacture');
    	}
    }

    public function manufacture_update($manufacture_id)
    {
        $this->adminCheck();
    	$data=DB::table('manufacture')->where('manufacture_id', $manufacture_id)->first();
    	$manage_manufacture=view('admin.manufacture_update')->with('all_data', $data);
    	return view('admin_layout')->with('admin.manufacture_update', $manage_manufacture);
    }

    public function manu_update_process($manufacture_id, Request $request)
    {	
        $this->adminCheck();
    	$data=array();
    	$data['manufacture_name']=$request->manufacture_name;
    	$data['manufacture_description']=$request->manufacture_description;
    	$result=DB::table('manufacture')->where('manufacture_id', $manufacture_id)->update($data);
    	if ($result) {
    		Session::put('manumsg', $manufacture_id.' No Manufacture Update Successfully');
    		return Redirect::to('all-manufacture');
    	}
    	else{
    		Session::put('manumsgf', $manufacture_id.' No Manufacture Update Fail...!!!');
    		return Redirect::to('all-manufacture');
    	}
    }

    public function delete_manufacture($manufacture_id)
    {
        $this->adminCheck();
    	$result=DB::table('manufacture')->where('manufacture_id', $manufacture_id)->delete();
    	if ($result) {
    		Session::put('manumsg', $manufacture_id.' No Manufacture Delete Successfully');
    		return Redirect::to('all-manufacture');
    	}
    	else{
    		Session::put('manumsgf', $manufacture_id.' No Manufacture Delete Fail...!!!');
    		return Redirect::to('all-manufacture');
    	}
    }
}
