<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index (){
        //Seo
        // $meta_des = "Chuyên bán quần áo của các brand nổi tiếng";
        // $meta_keywords = "Pos coron,shopping";
        $cate_product =  DB::table('tbl_category_product') ->where('category_status', '1')-> orderby('category_id', 'desc') -> get();
        $brand_product =  DB::table('tbl_brand_product') ->where('brand_status', '1')-> orderby('brand_id', 'desc') -> get();
        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
        // ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
        // ->get();
        // $manager_product = view('admin.admin-all-product')->with('all_product', $all_product);
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id', 'desc') -> get();
        $hot_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_sold', 'desc') -> get();
        return view('pages.home')
        ->with('category', $cate_product)
        ->with('brand', $brand_product)
        ->with('product', $all_product)
        ->with('hot_product', $hot_product);
    }
    public function search(Request $request){
        $keywords = $request->request->get('keyword');
        Session()->put('keywordSubmit', $keywords);
        $cate_product =  DB::table('tbl_category_product') ->where('category_status', '1')-> orderby('category_id', 'desc') -> get();
        $brand_product =  DB::table('tbl_brand_product') ->where('brand_status', '1')-> orderby('brand_id', 'desc') -> get();
        $search_product = DB::table('tbl_product')
        ->where('product_status','1')
        ->where('product_name', 'like', '%'.$keywords.'%')->get();
        return view('pages.search')->with('category', $cate_product)->with('brand', $brand_product)
        ->with('search_product', $search_product);
    }
    public function color_image($product_id){
        $color_product =  DB::table('tbl_color_product')
        ->join('tbl_color', 'tbl_color.color_id', '=', 'tbl_color_product.color_id')
        ->where('product_id', $product_id) -> orderby('color_product_id', 'desc') -> get();

        $image_desc = DB::table('tbl_image_desc')
        -> where('product_id', $product_id) -> orderby('image_desc_id', 'desc') -> get();
        return view('pages.home')->with('color', $color_product) -> with('image', $image_desc);
    }
    public function contact(){
        return view('pages.contact');
    }
}
