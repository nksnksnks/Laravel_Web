<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;
session_start();
class BrandProduct extends Controller
{
    public function add_brand_product(){
        return view('admin.admin-add-brand-product');
    }
    public function all_brand_product(){
        // $all_brand_product = DB::table('tbl_brand_product')->get();
        $all_brand_product = Brand::orderBy('brand_id', 'DESC')->get();
        $manager_brand_product = view('admin.admin-all-brand-product')->with('all_brand_product', $all_brand_product);
        return view('admin_welcome') -> with('admin.admin_all_brand_product', $manager_brand_product);
    }
    public function save_brand_product(Request $request){
        $data = $request->all();
        $brand = new Brand();
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->save();
        // $data = array();
        // $data['brand_name'] = $request->brand_product_name;
        // $data['brand_desc'] = $request-> brand_product_desc;
        // $data['brand_status'] = $request-> brand_product_status;
        // DB::table('tbl_brand_product')->insert($data);
        session()->put('message', 'Thêm thương hiệu thành công');
        return Redirect::to('all-brand-product');
    }
    public function active_brand_product($brand_id){
        $brand = Brand::find($brand_id);
        $brand->brand_status = 1;
        $brand->save();
        // DB::table('tbl_brand_product')->where('brand_id', $brand_id)->update(['brand_status' => 1]);
        return Redirect::to('all-brand-product');
    }
    
    public function unactive_brand_product($brand_id){
        $brand = Brand::find($brand_id);
        $brand->brand_status = 0;
        $brand->save();
        // DB::table('tbl_brand_product')->where('brand_id', $brand_id)->update(['brand_status' => 0]);
        return Redirect::to('all-brand-product');
    }
    public function edit_brand_product($brand_id){
        // $brand_product = DB::table('tbl_brand_product')->where('brand_id', $brand_id)->get();
        $brand_product = Brand::find($brand_id);
        $manager_brand_product = view('admin.admin-edit-brand-product')->with('brand_product', $brand_product);
        return view('admin_welcome') -> with('admin.admin_edit_brand_product', $manager_brand_product);
    }
    public function update_brand_product(Request $request, $brand_id){
        $data = $request->all();
        $brand = Brand::find($brand_id);
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->save();
        // $data = array();
        // $data['brand_name'] = $request->input('brand_product_name');
        // $data['brand_desc'] = $request->input('brand_product_desc');
        // DB::table('tbl_brand_product')->where('brand_id', $brand_id)->update($data);
        session()->put('message', 'Cập nhật thương hiệu thành công');
        return Redirect::to('all-brand-product');
    }
    public function delete_brand_product($brand_id){
        $brand = Brand::find($brand_id);
        $brand->delete();
        session()->put('message', 'Xóa thương hiệu thành công');
        return Redirect::to('all-brand-product');
    }
    
    //--------------------------------------------------------------
    public function show_brand_home($brand_id){
        $cate_product =  DB::table('tbl_category_product') ->where('category_status', '1')-> orderby('category_id', 'desc') -> get();
        $brand_product =  DB::table('tbl_brand_product') ->where('brand_status', '1')-> orderby('brand_id', 'desc') -> get();
        $brand_by_id = DB::table('tbl_product')
        ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
        -> where('tbl_product.brand_id', $brand_id) -> where('product_status', '1')
        ->get();
        $brand_name = DB::table('tbl_brand_product') -> where('brand_id', $brand_id)->get();
        return view('pages.show_brand')->with('category', $cate_product)->with('brand', $brand_product)
        ->with('brand_by_id', $brand_by_id)->with('brand_name', $brand_name);
    }
}
