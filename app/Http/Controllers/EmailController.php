<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Mail;
class EmailController extends Controller
{
    public function send_mail(){
        $to_name = "SownNK";
        $to_email = "nksnks2002@gmail.com";//send to this email

        $data = array("name"=>"Email từ tài khoản khách hàng","body"=>"Mail gửi về vấn đề hàng hóa"); //body of mail.blade.php
    
        Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('test mail nhé');//send this mail with subject
            $message->from($to_email,$to_name);//send from this mail
        });
        Redirect('/')->with('message', '');
    }
}
