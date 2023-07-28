<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;
session_start();

class ColorController extends Controller
{
    public function add_color(){
        return view('admin.admin-add-color');
    }
    public function save_color(Request $request){
        $data = $request->all();
        $color = new Color();
        $color->color_name = $data['color_name'];
        $color->color_code = $data['color_code'];
        $color->save();
        session()->put('message', 'Thêm màu sản phẩm thành công');
        return Redirect::to('all-color');
    }
    public function all_color(){
        $all_color = Color::orderBy('color_id', 'DESC')->get();
        $manager_color_product = view('admin.admin-all-color')->with('all_color', $all_color);
        return view('admin_welcome') -> with('admin.admin_all_color', $manager_color_product);
    }
    public function edit_color($color_id){
        $find_color = Color::find($color_id);
        $manager_color_product = view('admin.admin-edit-color')->with('find_color', $find_color);
        return view('admin_welcome') -> with('admin.admin_edit_color', $manager_color_product);
    }
    public function update_color(Request $request, $color_id){
        $data = $request->all();
        $color = Color::find($color_id);
        $color->color_name = $data['color_name'];
        $color->color_code = $data['color_code'];
        $color->save();
        session()->put('message', 'Cập nhật màu sắc thành công');
        return Redirect::to('all-color');
    }
    public function delete_color($color_id){
        $color = Color::find($color_id);
        $color->delete();
        session()->put('message', 'Xóa màu sắc thành công');
        return Redirect::to('all-color');
    }
}
