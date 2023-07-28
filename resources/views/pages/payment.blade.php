@extends('welcome_2')
@section('content2')
<!--Checkout page section-->
<style>
    .btn-checkout{
        font-size: 16px;
        line-height: 30px;
        padding: 5px 10px;
        text-transform: uppercase;
        color: #fff;
        background: #00bba6;
        font-weight: 700;
        -webkit-transition: .3s;
        transition: .3s;
        border: none;
    }
    .btn-checkout:hover{
        background: #e84c3d;
    }
</style>
<div class="Checkout_section">
    <div class="row">
        </div>
    <div class="checkout_form">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <form action="{{URL::to('/save-checkout-customer')}}" method="POST">
                        {{ csrf_field() }}
                        <h3>Thanh toán giỏ hàng</h3>
                        <div class="row">
                            <?php
                            $name = session('customer_name');
                            $email = session('customer_email');
                            $phonenumber = session('customer_phonenumber');    
                            ?>
                            <div class="col-12 mb-30">
                                <label>Họ tên<span>*</span></label>
                                <input type="text" name="shipping_name" value="{{$name}}">     
                            </div>
                            <div class="col-12 mb-30">
                                <label>Địa chỉ  <span>*</span></label>
                                <input placeholder="Nhập địa chỉ chi tiết (Số nhà - ...)" type="text" name="shipping_address">     
                            </div>
                            <div class="col-lg-6 mb-30">
                                <label>Số điện thoại<span>*</span></label>
                                <input type="text" name="shipping_phonenumber" value="{{$phonenumber}}"> 

                            </div> 
                             <div class="col-lg-6 mb-30">
                                <label> Email   <span>*</span></label>
                                  <input type="text" name="shipping_email" value="{{$email}}"> 

                            </div> 
                            <div class="col-12">
                                <div class="order-notes">
                                     <label for="order_note">Ghi chú đơn hàng</label>
                                    <textarea id="order_note" name="shipping_notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>    
                            </div> 
                            <div class="col-12 mb-30">
                                <div class="checkout_btn">
                                    <button type="submit" class="btn-checkout"  style="font-family:arial, sans-serif;cursor: pointer;"> Xác nhận thông tin</button>
                                </div>
                            </div>    	    	    	    	    	    	    
                        </div>
                    </form>    
                </div>
                <div class="col-lg-6 col-md-6">
                    <form action="#">    
                        <h3>Đơn hàng của bạn</h3> 
                        <div class="order_table table-responsive mb-30">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($content as $key => $v_content)
                                    <tr>
                                        <td> {{$v_content->name}} <strong> × {{$v_content->quantity}}</strong></td>
                                        <td> $165.00</td>
                                    </tr>
                                    <tr>
                                        <td>  Handbag  justo	 <strong> × 2</strong></td>
                                        <td> $50.00</td>
                                    </tr>
                                    <tr>
                                        <td>  Handbag elit	<strong> × 2</strong></td>
                                        <td> $50.00</td>
                                    </tr>
                                    <tr>
                                        <td> Handbag Rutrum	 <strong> × 1</strong></td>
                                        <td> $50.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Cart Subtotal</th>
                                        <td>$215.00</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td><strong>$5.00</strong></td>
                                    </tr>
                                    <tr class="order_total">
                                        <th>Order Total</th>
                                        <td><strong>$220.00</strong></td>
                                    </tr>
                                </tfoot>
                            </table>     
                        </div>
                        <div class="payment_method">
                           <div class="panel-default">
                                <input id="payment" name="check_method" type="radio" data-target="createp_account">
                                <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">Create an account?</label>

                                <div id="method" class="collapse one" data-parent="#accordion">
                                    <div class="card-body1">
                                       <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                    </div>
                                </div>
                            </div> 
                           <div class="panel-default">
                                <input id="payment_defult" name="check_method" type="radio" data-target="createp_account">
                                <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">PayPal <img src="assets\img\visha\papyel.png" alt=""></label>

                                <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                    <div class="card-body1">
                                       <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p> 
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="order_button">
                                <button type="submit">Proceed to PayPal</button> 
                            </div>     --}}
                        </div> 
                    </form>         
                </div>
            </div> 
        </div>        
</div>
<!--Checkout page section end-->


<!--Checkout page section end-->

 @endsection