<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminManageOrder;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Artisan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Frontend
Route::get("/clear-cache", function () {
    $exitCode = Artisan::call('cache:clear');
});
Route::get('/', [HomeController::class,'index']);
Route::get('/trang-chu', [HomeController::class,'index']);
//Search
Route::post('/tim-kiem', [HomeController::class,'search']);
    //category home
    Route::get('/danh-muc-san-pham/{category_id}', [CategoryProduct::class,'show_category_home']);
    //brand home
    Route::get('/thuong-hieu-san-pham/{brand_id}', [BrandProduct::class,'show_brand_home']);
    //view product
    Route::get('/chi-tiet-san-pham/{product_id}', [ProductController::class,'details_product']);
    //cart
    Route::get('/show-cart', [CartController::class,'show_cart']);
    Route::post('/save-to-cart', [CartController::class,'save_to_cart']);
    Route::get('/delete-to-cart/{rowID}', [CartController::class,'delete_to_cart']);
    Route::post('/update-cart-quantity', [CartController::class,'update_cart_quantity']);
    //contact
    Route::get('/contact', [HomeController::class,'contact']);
    //checkout
    Route::get('/login', [CheckoutController::class,'login_checkout']);
    Route::get('/login', [CheckoutController::class,'logout_checkout']);
    Route::post('/login-customer', [CheckoutController::class,'login_customer']);
    Route::post('/add-customer', [CheckoutController::class,'add_customer']);
    Route::get('/checkout', [CheckoutController::class,'checkout']);
    Route::post('/save-checkout-customer', [CheckoutController::class,'save_checkout_customer']);
    Route::get('/payment', [CheckoutController::class,'payment']);
    Route::post('/order-place', [CheckoutController::class,'order_place']);
    Route::get('/order-history', [CheckoutController::class,'order_history']);
    Route::post('/danh-gia', [CommentController::class,'add_comment']);
    Route::post('/sua-danh-gia', [CommentController::class,'edit_comment']);
    //MyAccount
    Route::get('/my-account', [CheckoutController::class,'my_account']);
    Route::get('/my-account', [CheckoutController::class,'view_order_customer']);
    Route::post('/luu-thong-tin', [CheckoutController::class,'update_account']);
    Route::get('/cancel-order/{order_id}', [ AdminManageOrder::class,'cancel_order']);
    Route::post('/doi-mat-khau', [CheckoutController::class,'change_password']);
    Route::post('/save-avatar', [CheckoutController::class,'save_avatar']);
//Backend
Route::group(['middleware' => 'admin.logout'], function () {
Route::get('/admin-login', [AdminController::class,'index']);
});
Route::get('/admin-dashboard', [AdminController::class,'show_dashboard']);
Route::post('/admin-dashboard', [AdminController::class,'dashboard']);

Route::get('/logout', [AdminController::class,'logout']);
Route::group(['middleware' => 'admin.login'], function () {
    //Category Product
    Route::get('/add-category-product', [CategoryProduct::class,'add_category_product']);
    Route::get('/all-category-product', [CategoryProduct::class,'all_category_product']);

    Route::get('/active-category-product/{category_id}', [CategoryProduct::class,'active_category_product']);
    Route::get('/unactive-category-product/{category_id}', [CategoryProduct::class,'unactive_category_product']);

    Route::post('/save-category-product', [CategoryProduct::class,'save_category_product']);
    Route::post('/update-category-product/{category_id}', [CategoryProduct::class,'update_category_product']);
    Route::get('/edit-category-product/{category_id}', [CategoryProduct::class,'edit_category_product']);
    Route::get('/delete-category-product/{category_id}', [CategoryProduct::class,'delete_category_product']);

    //Brand Product
    Route::get('/add-brand-product', [BrandProduct::class,'add_brand_product']);
    Route::get('/all-brand-product', [BrandProduct::class,'all_brand_product']);

    Route::get('/active-brand-product/{brand_id}', [BrandProduct::class,'active_brand_product']);
    Route::get('/unactive-brand-product/{brand_id}', [BrandProduct::class,'unactive_brand_product']);

    Route::post('/save-brand-product', [BrandProduct::class,'save_brand_product']);
    Route::post('/update-brand-product/{brand_id}', [BrandProduct::class,'update_brand_product']);
    Route::get('/edit-brand-product/{brand_id}', [BrandProduct::class,'edit_brand_product']);
    Route::get('/delete-brand-product/{brand_id}', [BrandProduct::class,'delete_brand_product']);
    //Color Product
    Route::get('/add-color', [ColorController::class,'add_color']);
    Route::get('/all-color', [ColorController::class,'all_color']);

    Route::post('/save-color', [ColorController::class,'save_color']);
    Route::post('/update-color/{color_id}', [ColorController::class,'update_color']);
    Route::get('/edit-color/{color_id}', [ColorController::class,'edit_color']);
    Route::get('/delete-color/{color_id}', [ColorController::class,'delete_color']);
    //Product
    Route::get('/add-product', [ProductController::class,'add_product']);
    Route::get('/all-product', [ProductController::class,'all_product']);

    Route::get('/active-product/{product_id}', [ProductController::class,'active_product']);
    Route::get('/unactive-product/{product_id}', [ProductController::class,'unactive_product']);

    Route::post('/save-product', [ProductController::class,'save_product']);
    Route::post('/update-product/{product_id}', [ProductController::class,'update_product']);
    Route::get('/edit-product/{product_id}', [ProductController::class,'edit_product']);
    Route::get('/delete-product/{product_id}', [ProductController::class,'delete_product']);
    //order
    Route::get('/admin-manage-order', [ AdminManageOrder::class,'admin_manage_order']);
    Route::get('/view-order/{order_id}', [ AdminManageOrder::class,'view_order']);
    Route::get('/confirm-order/{order_id}', [ AdminManageOrder::class,'confirm_order']);
    Route::get('/complated-order/{order_id}', [ AdminManageOrder::class,'complated_order']);
    Route::get('/delete-order/{order_id}', [ AdminManageOrder::class,'delete_order']);
});
//send-email
Route::get('/send-mail', [ EmailController::class,'send_mail']);
//Login facebook
Route::get('/login-facebook','LoginController@login_facebook');
Route::get('/admin/callback','LoginController@callback_facebook');

