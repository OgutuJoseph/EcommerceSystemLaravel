<?php

namespace App\Http\Controllers;

use DB;  
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();
        return view('admin.add_product');
    }

    public function all_product()
    {
        $this->AdminAuthCheck();
        $all_product_info=DB::table('tbl_products')
                            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                            ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                            ->get();

        $manage_product=view('admin.all_product')
               ->with('all_product_info', $all_product_info);

        return view('admin_layout')
                ->with('all_product',$manage_product);
    }

    public function save_product(Request $request)
    {
        $data=array(); 
        $data['category_id']=$request->category_id; 
        $data['manufacture_id']=$request->manufacture_id;
        $data['product_name']=$request->product_name; 
        $data['product_description']=$request->product_description;
        $data['product_price']=$request->product_price;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['publication_status']=$request->publication_status;

        $image=$request->file('product_image');
        if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['product_image']=$image_url;

                DB::table('tbl_products')->insert($data);
                Session::put('message','Product added successfully!');
                return Redirect::to('/add-product');
            }
        }

        $data['image']='';
            DB::table('tbl_products')->insert($data);
            Session::put('message','product added successfully without image');
            return Redirect::to('/add-product');
    }

    public function inactive_product($product_id)
    {
        DB::table('tbl_products')
            ->where('product_id',$product_id)
            ->update(['publication_status' => 0]);
        Session::put('message','Product Status Changed Successfully!');
            return Redirect::to('/all-product');
    }

    public function active_product($product_id)
    {
        DB::table('tbl_products')
            ->where('product_id',$product_id)
            ->update(['publication_status' => 1]);
        Session::put('message','Product Activated Successfully!');
            return Redirect::to('/all-product');
    }
 
    public function delete_product($product_id)
    {
        DB::table('tbl_products')
            ->where('product_id',$product_id)
            ->delete();
        Session::get('message','Product Deleted Successfully');
        return Redirect::to('/all-product');
    }

    public function AdminAuthCheck()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return;
        }else {
            return Redirect::to('/admin')->send();
        }
    }
}
