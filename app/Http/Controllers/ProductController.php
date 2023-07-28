<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\UploadedFile;
session_start();
class ProductController extends Controller
{
    public function add_product(){
        $cate_product =  DB::table('tbl_category_product') -> orderby('category_id', 'desc') -> get();
        $brand_product =  DB::table('tbl_brand_product') -> orderby('brand_id', 'desc') -> get();
        $color_product =  DB::table('tbl_color') -> orderby('color_id', 'desc') -> get();
        return view('admin.admin-add-product') -> with('cate_product', $cate_product) -> with('brand_product', $brand_product)
        -> with('color_product', $color_product);
    }
    public function all_product(){
    $all_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
        ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
        ->get();
    $manager_product = view('admin.admin-all-product')->with('all_product', $all_product);
    return view('admin_welcome')->with('admin_all_product', $manager_product);
    }
    public function save_product(Request $request)
    {
        $data = array();
    
        $data['category_id'] = $request->input('cate');
        $data['brand_id'] = $request->input('brand');
        $data['sex_id'] = $request->input('sex_id');
        $data['product_name'] = $request->input('product_name');
        $data['product_desc'] = $request->input('product_desc');
        $data['product_content'] = $request->input('product_content');
        $data['product_size'] = $request->input('product_size');
        $data['product_price'] = $request->input('product_price');
        $data['product_sale'] = $request->input('product_sale');
        $data['product_status'] = $request->input('product_status');
        $data['product_sold'] = 0;
        $data['product_vote_star'] = 0;
        $data_color = $request->input('color_desc');
        $get_image = $request->file('product_image');
        $get_image_desc = $request->file('product_image_desc');
        if ($get_image) {
            $new_image = rand(0, 99) . '.' . $get_image->getClientOriginalName();
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] = $new_image;
            session()->put('message', 'Thêm sản phẩm thành công');
        }
    
        $get_id_product = DB::table('tbl_product')->insertGetId($data);
        if($get_id_product){
            foreach($data_color as $key =>$color){
                $colorData = [
                    'product_id' => $get_id_product,
                    'color_id' => $color,
                ];
                $insert_color_product = DB::table('tbl_color_product')->insert($colorData);
            }
            if ($get_image_desc) {
                foreach($get_image_desc as $key =>$image_desc){
                    $new_image_desc = rand(0, 99) . '.' . $image_desc->getClientOriginalName();
                    $image_desc->move('public/uploads/product', $new_image_desc);
                    $imageData = [
                        'product_id' => $get_id_product,
                        'image_desc' => $new_image_desc,
                    ];
                    $insert_color_product = DB::table('tbl_image_desc')->insert($imageData);
                }
            }

        }
        session()->put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('add-product');
    }
    public function active_product($product_id){
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 1]);
        return Redirect::to('all-product');
    }
    
    public function unactive_product($product_id){
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 0]);
        return Redirect::to('all-product');
    }
    public function edit_product($product_id){
        $cate_product =  DB::table('tbl_category_product') -> orderby('category_id', 'desc') -> get();
        $brand_product =  DB::table('tbl_brand_product') -> orderby('brand_id', 'desc') -> get();
        $color_product =  DB::table('tbl_color_product') -> orderby('product_id', 'desc') -> get();
        $image_product =  DB::table('tbl_image_desc') -> orderby('product_id', 'desc') -> get();
        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.admin-edit-product')
            ->with('edit_product', $edit_product)
            ->with('cate_product', $cate_product)
            ->with('brand_product',$brand_product)
            ->with('image_product',$image_product)
            ->with('color_product',$color_product);
        return view('admin_welcome') -> with('admin.admin_edit_product', $manager_product);
    }
    public function update_product(Request $request, $product_id){
        $data = array();
    
        $data['category_id'] = $request->input('cate');
        $data['brand_id'] = $request->input('brand');
        $data['sex_id'] = $request->input('sex_id');
        $data['product_name'] = $request->input('product_name');
        $data['product_desc'] = $request->input('product_desc');
        $data['product_content'] = $request->input('product_content');
        $data['product_size'] = $request->input('product_size');
        $data['product_price'] = $request->input('product_price');
        $data['product_sale'] = $request->input('product_sale');
        $data['product_status'] = $request->input('product_status');
        $get_image = $request->file('product_image');
        if ($get_image){
            $delete_image = DB::table('tbl_product')->where('product_id', $product_id)->first();
            if ($delete_image) {
                $old_image = $delete_image->product_image;
                if (file_exists(public_path('uploads/product/' . $old_image))) {
                    unlink(public_path('uploads/product/' . $old_image));
                }
            }
            $new_image = rand(0, 99) . '.' . $get_image->getClientOriginalName();
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            session()->put('message', 'Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');
        }
        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        session()->put('message', 'Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function delete_product($product_id){
        $delete_image = DB::table('tbl_product')->where('product_id', $product_id)->first();
        if ($delete_image) {
            $old_image = $delete_image->product_image;
            if (file_exists(public_path('uploads/product/' . $old_image))) {
                unlink(public_path('uploads/product/' . $old_image));
            }
        }
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        session()->put('message', 'Xóa sản phẩm thành công');
        return Redirect::to('all-product');
    }

    //----------------------users--------------------------------
    public function details_product($product_id){
        $cate_product =  DB::table('tbl_category_product') ->where('category_status', '1')-> orderby('category_id', 'desc') -> get();
        $brand_product =  DB::table('tbl_brand_product') ->where('brand_status', '1')-> orderby('brand_id', 'desc') -> get();
        $color_product =  DB::table('tbl_color_product')
        ->join('tbl_color', 'tbl_color.color_id', '=', 'tbl_color_product.color_id')
        ->where('product_id', $product_id) -> orderby('color_product_id', 'desc') -> get();

        $image_desc = DB::table('tbl_image_desc')
        -> where('product_id', $product_id) -> orderby('image_desc_id', 'desc') -> get();

        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
        ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
        ->where('product_status', '1')
        ->where('tbl_product.product_id', $product_id)
        ->get();
        foreach($details_product as $key => $value){
            $category_id = $value -> category_id;
        }
        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
        ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
        ->where('tbl_category_product.category_id', $category_id)
        ->where('product_status', '1')
        ->whereNotIn('tbl_product.product_id', [$product_id])
        ->get();
        $comment_product = DB::table('tbl_product_comments')
        ->join('tbl_customers', 'tbl_customers.customer_id', '=', 'tbl_product_comments.customer_id')
        ->where('tbl_product_comments.product_id', $product_id)
        ->orderby('comment_id', 'desc') -> get();
        $comment_check = DB::table('tbl_product_comments')
        ->where('customer_id', session()->get('customer_id'))
        ->where('product_id', session()->get('product_id'))
        ->first();
        return view('pages.show_details_product')
        ->with('category', $cate_product)
        ->with('brand', $brand_product)
        ->with('details_product', $details_product)
        ->with('related_product', $related_product)
        ->with('color_product', $color_product)
        ->with('comment_product', $comment_product)
        ->with('comment_check', $comment_check)
        ->with('image_desc', $image_desc);
    }
}
