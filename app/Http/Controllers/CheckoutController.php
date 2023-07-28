<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\UploadedFile;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\View;
use time;
session_start();

class CheckoutController extends Controller
{
    public function login_checkout(){
        return View::make('pages.login_checkout');
    }
    public function logout_checkout(){
        session()->put('customer_id', null);
        session()->put('customer_name', null);
        session()->put('customer_username', null);
        session()->put('customer_email', null);
        session()->put('customer_phonenumber', null);
        session()->put('customer_address', null);
        return View::make('pages.login_checkout');
    }
    public function my_account(){
        return view::make('pages.my_account');
    }
    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->get('customer_name');
        $data['customer_phonenumber'] = $request->request->get('customer_phonenumber');
        $data['customer_username'] = $request->get('customer_username');
        $data['customer_email'] = $request->request->get('customer_email');
        $data['avatar'] = "avatardefault21658465198465131235661.jpg";
        $data['customer_address'] = "x";
        $data['customer_password'] = $request->request->get('customer_password');
        $datax = $request->request->get('customer_password2');
        $isDuplicate = DB::table('tbl_customers')
        ->where('customer_name', $data['customer_name'])
        ->orWhere('customer_phonenumber', $data['customer_phonenumber'])
        ->orWhere('customer_username', $data['customer_username'])
        ->orWhere('customer_email', $data['customer_email'])
        ->exists();
        // $get_image = $request->file('product_image');
        // if ($get_image){
        //     $delete_image = DB::table('tbl_product')->where('product_id', $product_id)->first();
        //     if ($delete_image) {
        //         $old_image = $delete_image->product_image;
        //         if (file_exists(public_path('uploads/product/' . $old_image))) {
        //             unlink(public_path('uploads/product/' . $old_image));
        //         }
        //     }
        //     $new_image = rand(0, 99) . '.' . $get_image->getClientOriginalName();
        //     $get_image->move('public/uploads/product', $new_image);
        //     $data['product_image'] = $new_image;
        //     DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        if ($isDuplicate) {
            session()->put('message_user', 'Thông tin đăng ký của bạn đã tồn tại');
            return Redirect('/login');
        }
        if($data['customer_password'] != $datax){
            session()->put('message_user','Mật khẩu không trùng nhau');
            return Redirect('/login');
        }
        $customer_id = DB::table('tbl_customers')->insertgetId($data);
        session()->put('customer_id', $customer_id);
        session()->put('customer_name', $data['customer_name']);
        session()->put('customer_phonenumber', $data['customer_phonenumber']);
        session()->put('customer_eamil', $data['customer_email']);
        session()->put('customer_username', $data['customer_username']);
        session()->put('avatar', $data['avatar']);
        return Redirect('/trang-chu');
    }


    public function login_customer(Request $request){
        $customer_email = $request->customer_email;
        $customer_password = $request->customer_password;
        $result = DB::table('tbl_customers')->where('customer_email',$customer_email)->where('customer_password',$customer_password)->first();
        if(!$result){
            $result = DB::table('tbl_customers')->where('customer_username',$customer_email)->where('customer_password',$customer_password)->first();
        }
        if($result){
            session()->put('customer_name',$result->customer_name);
            session()->put('customer_email',$result->customer_email);
            session()->put('customer_phonenumber',$result->customer_phonenumber);
            session()->put('customer_id',$result->customer_id);
            session()->put('customer_username', $result->customer_username);
            session()->put('customer_address', $result->customer_address);
            session()->put('avatar', $result->avatar);
            return Redirect('/trang-chu');
        }
        else{
            session()->put('message_login','Tài khoản hoặc mật khẩu không chính xác');
        }
        return Redirect('/login');
    }


    public function checkout(){
        return view::make('pages.checkout');
    }


    public function save_checkout_customer(Request $request){

        return Redirect('/payment');
    }


    function execPostRequest($url, $data)
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data))
            );
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            //execute post
            $result = curl_exec($ch);
            //close connection
            curl_close($ch);
            return $result;
        }
    public function order_place(Request $request){
        //shipping
        $data = array();
        $data['shipping_name'] = $request->request->get('shipping_name');
        $data['shipping_phone'] = $request->request->get('shipping_phonenumber');
        $data['shipping_email'] = $request->request->get('shipping_email');
        $data['shipping_address'] = $request->request->get('shipping_address');
        if($request->request->get('shipping_notes'))
            $data['shipping_notes'] = $request->request->get('shipping_notes');
        else $data['shipping_notes'] = "Không có";
        $shipping_id = DB::table('tbl_shipping')->insertgetId($data);
        Session()->put('shipping_id', $shipping_id);
        //payment
        $payment_data = array();
        $payment_data['shipping_id'] =  $shipping_id ;
        $payment_data['payment_method'] = $request->request->get('payment_option');
        $payment_data['payment_status'] = "Chờ xử lý";
        $payment_id = DB::table('tbl_payment')->insert($payment_data);
        //order
        $order_data = array();
        $order_data['customer_id'] = Session()->get('customer_id');
        $order_data['shipping_id'] = $shipping_id;
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::subtotal(0);
        $order_data['order_status'] = 0;
        $order_id = DB::table('tbl_order')->insertgetId($order_data);
        //order_details;
        $content = Cart::content();  
        $customer_name = Session()->get('customer_username');
        foreach($content as $v_content){
            if($customer_name == $v_content->options->customer_username){
                $order_d_data = array();
                $order_d_data['order_id'] = $order_id;
                $order_d_data['product_id'] = $v_content->id;
                $order_d_data['shipping_id'] = $shipping_id;
                $order_d_data['product_name'] = $v_content->name;
                $order_d_data['product_price'] = $v_content->price;
                $order_d_data['color_name'] = $v_content->options->color_name;
                $order_d_data['product_quantity'] = $v_content->options->size;
                $order_d_data['product_quantity'] = $v_content->qty;
                $order_d_data['color_name'] =$v_content->options->color_name;
                $order_d_data['product_size'] = $v_content->options->size;
                $result = DB::table('tbl_order_details')->insert($order_d_data);
            }
        }
        if($request->request->get('payment_option') == 1){
            Cart::destroy();
            return Redirect::to("my-account");
        }elseif($request->request->get('payment_option') == 2){
        //     $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";


        //     $partnerCode = "MOMOBKUN20180529";
        //     $accessKey = "klm05TvNBzhg7h7j";
        //     $secretKey = "at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa";
        //     $orderInfo = "Thanh toán qua ATM MoMo";
        //     $amount = "10000";
        //     $orderId = time() . "";
        //     $returnUrl = "http://localhost/coron/coronweb/checkout";
        //     $notifyurl = "http://localhost/coron/coronweb/checkout";
        //     // Lưu ý: link notifyUrl không phải là dạng localhost
        //     $bankCode = "SML";


        //  $requestId = time() . "";
        //  $requestType = "payWithMoMoATM";
        //  $extraData = "";
        //  //before sign HMAC SHA256 signature
        //  $rawHashArr =  array(
        //                 'partnerCode' => $partnerCode,
        //                 'accessKey' => $accessKey,
        //                 'requestId' => $requestId,
        //                 'amount' => $amount,
        //                 'orderId' => $orderId,
        //                 'orderInfo' => $orderInfo,
        //                 'bankCode' => $bankCode,
        //                 'returnUrl' => $returnUrl,
        //                 'notifyUrl' => $notifyurl,
        //                 'extraData' => $extraData,
        //                 'requestType' => $requestType
        //                 );
        //  // echo $serectkey;die;
        //  $rawHash = "partnerCode=".$partnerCode."&accessKey=".$accessKey."&requestId=".$requestId."&bankCode=".$bankCode."&amount=".$amount."&orderId=".$orderId."&orderInfo=".$orderInfo."&returnUrl=".$returnUrl."&notifyUrl=".$notifyurl."&extraData=".$extraData."&requestType=".$requestType;
        //  $signature = hash_hmac("sha256", $rawHash, $secretKey);
        // // dd($signature);
        //  $data =  array('partnerCode' => $partnerCode,
        //                 'accessKey' => $accessKey,
        //                 'requestId' => $requestId,
        //                 'amount' => $amount,
        //                 'orderId' => $orderId,
        //                 'orderInfo' => $orderInfo,
        //                 'returnUrl' => $returnUrl,
        //                 'bankCode' => $bankCode,
        //                 'notifyUrl' => $notifyurl,
        //                 'extraData' => $extraData,
        //                 'requestType' => $requestType,
        //                 'signature' => $signature);
        //  $result = $this->execPostRequest($endpoint, json_encode($data));
        // dd($result);
        //  $jsonResult = json_decode($result,true);  // decode json
         
        //  error_log( print_r( $jsonResult, true ) );
        // //  header('Location: '.$jsonResult['payUrl']);
        return Redirect::to("my-account");
        }else{
            return Redirect::to("my-account");
        }
    }
    public function update_account(Request $request){
        $customer_id = $request->input('customer_id');
        $data = array();
        $data['customer_name'] = $request->input('new_customer_name');
        $data['customer_address'] = $request->input('new_customer_address');
        $data['customer_email'] = $request->input('new_customer_email');
        $data['customer_phonenumber'] = $request->input('new_customer_phonenumber');
        DB::table('tbl_customers')->where('customer_id', $customer_id)->update($data);
        session()->put('message', 'Cập nhật thông tin thành công'); 
        return Redirect::to('my-account');
    }
    public function view_order_customer(){
        $customer_id = Session()->get('customer_id');
        $order_id = DB::table('tbl_order')
        ->join('tbl_customers', 'tbl_customers.customer_id', '=', 'tbl_order.customer_id')
        ->join('tbl_shipping', 'tbl_shipping.shipping_id', '=', 'tbl_order.shipping_id')
        ->select('tbl_order.*', 'tbl_customers.*', 'tbl_shipping.*')
        ->where('tbl_order.customer_id', $customer_id)
        ->get();
        return view::make('pages.my_account')->with('order_id', $order_id);
    }
    public function change_password(Request $request){
        $customer_id = session('customer_id');
        $password = $request->input('password');
        $new_password = $request->input('new_password');
        $new_password2 = $request->input('new_password2');
        $old_password = DB::table('tbl_customers')
        ->where('customer_id', $customer_id)
        ->first();
        $ps = $old_password->customer_password;
        if($ps == $password){
            if($new_password == $new_password2){
                DB::table('tbl_customers')
                    ->where('customer_id', $customer_id)
                    ->update(['customer_password' => $new_password]);
                session()->put('message', 'Cập nhật mật khẩu thành công');
            }
            else{
                session()->put('message', 'Mật khẩu mới không trùng khớp');
            }
        }else{
            session()->put('message', 'Mật khẩu không chính xác');
        }
        return Redirect::to('my-account');
    }
    public function save_avatar(Request $request){
        $croppedImageData = $request->input('cropped_image');

        // Tạo tên ngẫu nhiên cho ảnh
        $imageName = rand(0, 9999) . '_' . time() . '.jpg';

        // Giải mã dữ liệu base64 và lưu ảnh vào thư mục "uploads/avatar"
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $croppedImageData));
        file_put_contents(public_path('uploads/avatar/' . $imageName), $imageData);

        // Lưu tên ảnh vào cơ sở dữ liệu
        $delete_image = DB::table('tbl_customers')->where('customer_id', Session()->get('customer_id'))->first();
        if ($delete_image) {
            $old_image = $delete_image->avatar;
            if (file_exists(public_path('uploads/avatar/' . $old_image))) {
                unlink(public_path('uploads/avatar/' . $old_image));
            }
        }
        DB::table('tbl_customers')->where('customer_id', Session()->get('customer_id'))->update(['avatar' => $imageName]);
        session()->put('avatar', $imageName);
        session()->put('message', 'Thay đổi ảnh đại diện thành công');
        return redirect('my-account');
    }
}
