<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\UploadedFile;
use Gloudemans\Shoppingcart\Facades\Cart;
session_start();

class AdminManageOrder extends Controller
{
    public function admin_manage_order(){
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers', 'tbl_customers.customer_id', '=', 'tbl_order.customer_id')
        ->select('tbl_order.*', 'tbl_customers.customer_name')
        ->orderby('tbl_order.order_id', 'desc')
        ->get();
        $manager_order = view('admin.admin-manage-order')->with('all_order', $all_order);
        return view('admin_welcome')->with('admin.admin-manage-order', $manager_order);
    }
    public function view_order($order_id){
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customers', 'tbl_customers.customer_id', '=', 'tbl_order.customer_id')
        ->join('tbl_shipping', 'tbl_shipping.shipping_id', '=', 'tbl_order.shipping_id')
        ->select('tbl_order.*', 'tbl_customers.*', 'tbl_shipping.*')
        ->where('tbl_order.order_id', $order_id)
        ->get();
        $order_by_id_2 = DB::table('tbl_order')
        ->join('tbl_order_details', 'tbl_order_details.order_id', '=', 'tbl_order.order_id')
        ->select('tbl_order_details.*')
        ->where('tbl_order.order_id', $order_id)
        ->get();
        $manager_order_by_id = view('admin.admin-view-order')
        ->with('order_by_id', $order_by_id)
        ->with('order_by_id_2', $order_by_id_2);
        return view('admin_welcome')->with('admin.admin_view_order', $manager_order_by_id);
    }
    public function confirm_order($order_id){
        DB::table('tbl_order')->where('order_id', $order_id)->update(['order_status' => 1]);
        return Redirect::to('admin-manage-order');
    }
    public function complated_order($order_id){
        DB::table('tbl_order')->where('order_id', $order_id)->update(['order_status' => 2]);
        $order_by_id_2 = DB::table('tbl_order')
        ->join('tbl_order_details', 'tbl_order_details.order_id', '=', 'tbl_order.order_id')
        ->select('tbl_order_details.*')
        ->where('tbl_order.order_id', $order_id)
        ->get();
        foreach($order_by_id_2 as $key => $product){
            $select_product = DB::table('tbl_product')
            ->where('product_id', $product->product_id)
            ->first();
            DB::table('tbl_product')
            ->where('product_id', $product->product_id)
            ->update(['product_sold' => $select_product->product_sold + $product->product_quantity]);
        }
        return Redirect::to('admin-manage-order');
    }
    public function cancel_order($order_id){
        DB::table('tbl_order')->where('order_id', $order_id)->update(['order_status' => 3]);
        return Redirect::to('my-account');
    }
    public function delete_order($order_id){
        $get_shipping_id = DB::table('tbl_order')->where('order_id', $order_id)->first();
        $shipping_id = $get_shipping_id->shipping_id;
        DB::table('tbl_order')->where('order_id', $order_id)->delete();
        DB::table('tbl_shipping')->where('shipping_id', $shipping_id)->delete();
        DB::table('tbl_payment')->where('shipping_id', $shipping_id)->delete();
        DB::table('tbl_order_details')->where('order_id', $order_id)->delete();
        return Redirect::to('admin-manage-order');
    }
}
