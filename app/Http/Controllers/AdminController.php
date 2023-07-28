<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Social;
use App\Models\UserLogin;
session_start();
class AdminController extends Controller
{
    public function index(){
        return view('admin_login');
    }
    public function show_dashboard(){
        return view('admin.admin-dashboard');
    }
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($result){
            session()->put('admin_name',$result->admin_name);
            session()->put('admin_id',$result->admin_id);
            return Redirect::to('/admin-dashboard');
        }
        else{
            session()->put('message','Tài khoản hoặc mật khẩu không chính xác');
            return Redirect::to('/admin-login');
        }
    }
    public function logout(){
        session()->put('admin_name',null);
        session()->put('admin_id',null);
        return Redirect::to('/admin-login');
    }
    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

}
