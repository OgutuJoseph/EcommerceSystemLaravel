<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
       public function index()
       {

       //return view('pages.home_content');

       $all_published_product=DB::table('tbl_products')
                            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                            ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                            ->where('tbl_products.publication_status',1)
                            ->limit(6)
                            ->get();

       $manage_published_product=view('pages.home_content')
              ->with('all_published_product', $all_published_product);

       return view('layout')
              ->with('pages.home_content',$manage_published_product);
        
       }

       public function show_product_by_category($category_id)
       {
       $product_by_category=DB::table('tbl_products')
                            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id') 
                            ->select('tbl_products.*','tbl_category.category_name',)
                            ->where('tbl_category.category_id',$category_id)
                            ->where('tbl_products.publication_status',1)
                            ->limit(15)
                            ->get();

       $manage_product_by_category=view('pages.products_by_category')
              ->with('product_by_category', $product_by_category);

       return view('layout')
                ->with('pages.products_by_category',$manage_product_by_category);
       }

       public function show_product_by_manufacture($manufacture_id)
       {
       $product_by_manufacture=DB::table('tbl_products')
                            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id') 
                            ->select('tbl_products.*','tbl_manufacture.manufacture_name',)
                            ->where('tbl_manufacture.manufacture_id',$manufacture_id)
                            ->where('tbl_products.publication_status',1)
                            ->limit(15)
                            ->get();

       $manage_product_by_manufacture=view('pages.products_by_manufacture')
               ->with('product_by_manufacture', $product_by_manufacture);

       return view('layout')
                ->with('pages.products_by_manufacture',$manage_product_by_manufacture);
       }

       public function product_details_by_id($product_id)
       {
       $product_by_details=DB::table('tbl_products')
                            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                            ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                            ->where('tbl_products.product_id',$product_id)
                            ->where('tbl_products.publication_status',1) 
                            ->first();

       $manage_product_by_details=view('pages.product_details')
              ->with('product_by_details', $product_by_details);

       return view('layout')
                ->with('pages.product_details',$manage_product_by_details);
       }


       //Service Section
       public function online_help()
       { 
              return view('home.service.online_help');
       }

       public function contact_us()
       { 
              return view('home.service.contact');
       }

       public function faqs()
       { 
              return view('home.service.faq');
       }

       //QuickShop Section
       public function mens()
       { 
              return view('home.quickshop.mens');
       }

       public function womens()
       { 
              return view('home.quickshop.womens');
       }

       public function electronics()
       { 
              return view('home.quickshop.electronics');
       }

       public function furniture()
       { 
              return view('home.quickshop.furniture');
       }

       //Policies Section
       public function terms_of_use()
       { 
              return view('home.policies.terms_of_use');
       }

       public function privacy_policy()
       { 
              return view('home.policies.privacy_policy');
       }

       public function refund_policy()
       { 
              return view('home.policies.refund_policy');
       }

       public function billing_system()
       { 
              return view('home.policies.billing_system');
       }

       //About Section
       public function company_information()
       { 
              return view('home.about.company_information');
       }

       public function careers()
       { 
              return view('home.about.careers');
       }

       public function store_location()
       { 
              return view('home.about.store_location');
       }

       public function copyright()
       { 
              return view('home.about.copyright');
       }

}
