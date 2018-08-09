<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();
class homeController extends Controller
{
    public function index()
    {
        $data=DB::table('products')
            ->join('add_category', 'products.category_id', '=', 'add_category.category_id')
            ->join('manufacture', 'products.manufacture_id', '=', 'manufacture.manufacture_id')
            ->select('products.*', 'add_category.category_name', 'manufacture.manufacture_name')
            ->where('products.publication_status', 1)
            ->inRandomOrder()
            ->limit(9)
            ->get();




        $manage_data=view('pages.home_content')->with('all_data', $data);
        return view('layout')->with('pages.home_content', $manage_data);
    }

    


    public function show_by_category($category_name, $category_id)
    {   
        
        $result=DB::table('products')
            ->join('add_category', 'add_category.category_id', '=', 'products.category_id')
            ->join('manufacture', 'manufacture.manufacture_id', '=', 'products.manufacture_id')
            ->select('products.*', 'add_category.category_name', 'manufacture.manufacture_name')
            ->where('add_category.category_id', $category_id)
            ->where('products.publication_status', 1)
            ->get();

        $manage_show_by_category=view('pages.show_by_category')->with('all_data', $result);

        return view('layout')->with('pages.show_by_category', $manage_show_by_category);
    }



    public function show_by_manufacture($category_name, $manufacture_id)
    {
        $result=DB::table('products')
            ->join('add_category', 'add_category.category_id', '=', 'products.category_id')
            ->join('manufacture', 'manufacture.manufacture_id', '=', 'products.manufacture_id')
            ->select('products.*', 'add_category.category_name', 'manufacture.manufacture_name')
            ->where('manufacture.manufacture_id', $manufacture_id)
            ->where('products.publication_status', 1)
            ->get();
        $manage_show_by_manufacture=view('pages.show_by_manufacture')->with('all_data', $result);
        return view('layout')->with('pages.show_by_manufacture', $manage_show_by_manufacture);
    }


    public function view_product($product_id)
    {
        $result=DB::table('products')
            ->join('add_category', 'add_category.category_id', '=', 'products.category_id')
            ->join('manufacture', 'manufacture.manufacture_id', '=', 'products.manufacture_id')
            ->select('products.*', 'add_category.category_name', 'manufacture.manufacture_name')
            ->where('products.product_id', $product_id)
            ->where('products.publication_status', 1)
            ->first();
        $manage_view_product=view('pages.view_product')->with('all_data', $result);
        return view('layout')->with('pages.view_product', $manage_view_product);
    }

}
