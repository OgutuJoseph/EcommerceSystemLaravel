<?php

namespace App\Http\Controllers;

use DB;  
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();
        return view('admin.add_slider');
    }

    public function all_slider()
    {
        $this->AdminAuthCheck();
        $all_slider_info=DB::table('tbl_slider') 
                            ->get();

        $manage_slider=view('admin.all_slider')
               ->with('all_slider_info', $all_slider_info);

        return view('admin_layout')
                ->with('all_slider',$manage_slider);
    }

    public function save_slider(Request $request)
    {
        $data=array();   
        $data['publication_status']=$request->publication_status;

        $image=$request->file('slider_image');
        if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='slider/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['slider_image']=$image_url;

                DB::table('tbl_slider')->insert($data);
                Session::put('message','Slider added successfully!');
                return Redirect::to('/add-slider');
            }
        }

        $data['image']='';
            DB::table('tbl_slider')->insert($data);
            Session::put('message','slider added successfully without image');
            return Redirect::to('/add-slider');
    }

    public function inactive_slider($slider_id)
    {
        DB::table('tbl_slider')
            ->where('slider_id',$slider_id)
            ->update(['publication_status' => 0]);
        Session::put('message','Slider Status Changed Successfully!');
            return Redirect::to('/all-slider');
    }

    public function active_slider($slider_id)
    {
        DB::table('tbl_slider')
            ->where('slider_id',$slider_id)
            ->update(['publication_status' => 1]);
        Session::put('message','Slider Activated Successfully!');
            return Redirect::to('/all-slider');
    }
 
    public function delete_slider($slider_id)
    {
        DB::table('tbl_slider')
            ->where('slider_id',$slider_id)
            ->delete();
        Session::get('message','Slider Deleted Successfully');
        return Redirect::to('/all-slider');
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