<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;
session_start();
class CategoryProduct extends Controller
{
    
    //admin functions
    public function add_category_product(){
        return view('admin.admin-add-category-product');
    }
    public function all_category_product(){
        $all_category_product = Category::orderBy('category_id', 'DESC')->get();
        $manager_category_product = view('admin.admin-all-category-product')->with('all_category_product', $all_category_product);
        return view('admin_welcome') -> with('admin.admin_all_brand_product', $manager_category_product);
    }
    public function save_category_product(Request $request){
        $data = $request->all();
        $category = new Category();
        $category->category_name = $data['category_product_name'];
        $category->category_desc = $data['category_product_desc'];
        $category->category_status = $data['category_product_status'];
        $category->save();
        session()->put('message', 'Thêm danh mục thành công');
        return Redirect::to('all-category-product');
    }
    public function active_category_product($category_id){
        $category = Category::find($category_id);
        $category->category_status = 1;
        $category->save();
        return Redirect::to('all-category-product');
    }
    
    public function unactive_category_product($category_id){
        DB::table('tbl_category_product')->where('category_id', $category_id)->update(['category_status' => 0]);
        return Redirect::to('all-category-product');
    }
    public function edit_category_product($category_id){
        $category_product = DB::table('tbl_category_product')->where('category_id', $category_id)->get();
        $manager_category_product = view('admin.admin-edit-category-product')->with('edit_category_product', $category_product);
        return view('admin_welcome') -> with('admin.admin_edit_category_product', $manager_category_product);
    }
    public function update_category_product(Request $request, $category_id){
        $data = array();
        $data['category_name'] = $request->input('category_product_name');
        $data['category_desc'] = $request->input('category_product_desc');
        DB::table('tbl_category_product')->where('category_id', $category_id)->update($data);
        session()->put('message', 'Cập nhật danh mục thành công');
        return Redirect::to('all-category-product');
    }
    public function delete_category_product($category_id){
        DB::table('tbl_category_product')->where('category_id', $category_id)->delete();
        session()->put('message', 'Xóa danh mục thành công');
        return Redirect::to('all-category-product');
    }
    //end adminfunctions

    //user functions
    public function show_category_home($category_id){
        $cate_product =  DB::table('tbl_category_product') ->where('category_status', '1')-> orderby('category_id', 'desc') -> get();
        $brand_product =  DB::table('tbl_brand_product') ->where('brand_status', '1')-> orderby('brand_id', 'desc') -> get();
        $category_by_id = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
        -> where('tbl_product.category_id', $category_id) -> where('product_status', '1')
        ->get();
        $category_name = DB::table('tbl_category_product') -> where('category_id', $category_id)->get();
        return view('pages.show_category')->with('category', $cate_product)->with('brand', $brand_product)
        ->with('category_by_id', $category_by_id) -> with('category_name', $category_name);
    }
}
