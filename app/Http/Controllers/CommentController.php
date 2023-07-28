<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\UploadedFile;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\View;
use App\Models\Comment;
use time;
session_start();

class CommentController extends Controller
{
    public function add_comment(Request $request){
        $data = $request->all();
        $comment = new Comment();
        $comment->product_id = $data['product_id'];
        $comment->customer_id = session()->get('customer_id');
        $comment->vote_star = $data['vote_star'];
        $comment->comment_content = $data['comment_content'];
        $edit_product = DB::table('tbl_product')->where('product_id', $data['product_id'])->first();
        $product_vote_star = $edit_product->product_vote_star + 1;
        $product_vote_star_point = 
        $product_vote_star_point = (($edit_product->product_vote_star_point * $edit_product->product_vote_star) + $data['vote_star']) / ($edit_product->product_vote_star + 1);
        DB::table('tbl_product')->where('product_id', $data['product_id'])
        ->update([
            'product_vote_star_point' => $product_vote_star_point,
            'product_vote_star' => $product_vote_star
        ]);
        $comment->save();
        return Redirect::to('/chi-tiet-san-pham/'. $data['product_id']);
    }
    public function edit_comment(Request $request){
        $data = array();
        $data['comment_content'] = $request->input('new_comment_content');
        $data['product_id'] = $request->input('product_id');
        $data['customer_id'] = session()->get('customer_id');
        $data['new_vote_star'] = $request->input('new_vote_star');
        $data['old_vote_star'] = $request->input('old_vote_star');
        $edit_product = DB::table('tbl_product')->where('product_id', $data['product_id'])->first();
        $product_vote_star = $edit_product->product_vote_star;
        $product_vote_star_point = (($edit_product->product_vote_star_point * $edit_product->product_vote_star) + $data['new_vote_star'] - $data['old_vote_star']) / ($edit_product->product_vote_star);
        DB::table('tbl_product')->where('product_id', $data['product_id'])
        ->update([
            'product_vote_star_point' => $product_vote_star_point,
            'product_vote_star' => $product_vote_star
        ]);
        DB::table('tbl_product_comments')
        ->where('product_id', $data['product_id'])
        ->where('customer_id', $data['customer_id'])
        ->update([
            'vote_star' => $data['new_vote_star'],
            'comment_content' => $data['comment_content']
        ]);
        return Redirect::to('/chi-tiet-san-pham/'. $data['product_id']);
    }
}
