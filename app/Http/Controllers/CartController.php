<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\UploadedFile;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function save_to_cart(Request $request){
        $product_id = $request->request->get('product_id_hidden');
        $product_price = $request->request->get('product_price_hidden');
        $quantity = $request->request->get('quantity');
        $size = $request->request->get('size');
        $color_name = $request->request->get('color_name');
        $product_info = DB::table('tbl_product')->where('product_id', $product_id)->first();
        $customer_username = session('customer_username');
        $data['id'] = $product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_price;
        $data['weight'] = '111';
        $data['options'] = [
            'size' => $size,
            'color_name' => $color_name,
            'image' => $product_info->product_image,
            'customer_username' => $customer_username,
        ];
        if($customer_username){
            Cart::add($data);
            return Redirect::to('/show-cart');
        }
        return Redirect::to('/login');
    }
    public function show_cart(){
        
        return view('pages.show_cart');
    }
    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->quantity_cart; 
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }
}
