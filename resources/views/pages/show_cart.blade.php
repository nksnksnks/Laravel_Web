@extends('welcome_2')
@section('content2')
<title>Giỏ hàng của tôi</title>
<div class="shopping_cart_area">
    <form action="#"> 
        <?php
        $total = 0;    
        ?>
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="product_remove">Delete</th>
                                <th class="product_img">Hình ảnh</th>
                                <th class="product_name">Tên sản phẩm</th>
                                <th class="product-size">Kích cỡ</th>
                                <th class="product_color">Màu sắc</th>
                                <th class="product_price">Giá</th>
                                <th class="product_quantity">Số lượng</th>
                                <th class="product_total">Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $content = Cart::content(); 
                            $customer_username = Session()->get('customer_username')
                            ?>
                            @foreach($content as $key => $v_content)
                                @if($v_content->options->customer_username == $customer_username)
                                    <tr>
                                        <td class="product_remove"><a href="{{URL::to('delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-trash-o"></i></a></td>
                                        <td class="product_img"><a href="#"><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt="" width="50" height="50"></a></td>
                                        <td class="product_name"><a href="#">{{$v_content->name}}</a></td>
                                        <td class="product_size">{{$v_content->options->size}}</td>
                                        <td class="product_color">{{$v_content->options->color_name}}</td>
                                        <td class="product-price">{{number_format($v_content->price)}} ₫</td>
                                        <td class="product_quantity">
                                            <form action="{{URL::to('update-cart-quantity')}}" method="POST">
                                                {{ csrf_field() }}
                                                <input min="0" max="100" value="{{$v_content->qty}}" type="number" name="quantity_cart">
                                                <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart">
                                                <button type="submit" style="background-color: transparent;border:none;"><i class="fas fa-sync" style="color:#00bba6;padding-left: 20px;"></i></button>
                                            </form>
                                        </td>
                                        <?php
                                            $subtotal = $v_content->price * $v_content->qty;
                                            $total = $subtotal + $total;
                                        ?>
                                        <td class="product_total">{{number_format($subtotal)}} ₫</td>
                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>   
                        </div>      
                    </div>
                 </div>
             </div>
             <!--coupon code area start-->
            <div class="coupon_area">
                <div class="row">
                    {{-- <div class="col-lg-6 col-md-6">
                        <div class="coupon_code">
                            <h3>Coupon</h3>
                            <div class="coupon_inner">   
                                <p>Enter your coupon code if you have one.</p>                                
                                <input placeholder="Coupon code" type="text">
                                <button type="submit">Apply coupon</button>
                            </div>    
                        </div>
                    </div> --}}
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code">
                            <h3>Thành tiền</h3>
                            <div class="coupon_inner">
                               {{-- <div class="cart_subtotal">
                                   <p>Thành tiền</p>
                                   <p class="cart_amount">{{Cart::subtotal(0)}} ₫</p>
                               </div> --}}

                               <div class="cart_subtotal">
                                   <p>Tổng tiền</p>
                                   <p class="cart_amount">{{number_format($total)}} ₫</p>
                               </div>
                               <?php
                                $customer_id = Session::get('customer_id');
                                    if($customer_id!=NULL){
                                ?>
                                        <div class="checkout_btn">
                                            <a href="{{URL::to('/checkout')}}">Đặt hàng</a>
                                        </div>
                                <?php
                                    }else{
                                ?>
                                        <div class="checkout_btn">
                                            <a href="{{URL::to('/login')}}">Đặt hàng</a>
                                        </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area end-->
        </form> 
 </div>
 @endsection
 <!--shopping cart area end -->