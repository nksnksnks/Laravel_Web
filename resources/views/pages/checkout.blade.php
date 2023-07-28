@extends('welcome_2')
@section('content2')
<title>Thanh toán</title>
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
</style>
<div class="Checkout_section">
    <div class="row">
        </div>
    <div class="checkout_form">
        <form action="{{URL::to('/order-place')}}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h3 style="font-family: arial;">Thông tin người nhận</h3>
                    <div class="row">
                        <?php
                        $name = session('customer_name');
                        $email = session('customer_email');
                        $address = session('customer_address');
                        $phonenumber = session('customer_phonenumber');    
                        ?>
                        <div class="col-12 mb-30">
                            <label>Họ tên<span>*</span></label>
                            <input type="text" name="shipping_name" value="{{$name}}" style="border-radius:5px;" required>     
                        </div>
                        {{-- <div class="col-lg-4 mb-30">
                            <label>Tỉnh/Thành phố<span>*</span></label>
                            <select class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm" size="6">
                                <option value="">Chọn tỉnh thành</option>          
                                <option value="">Chọn tỉnh thành</option>    
                                <option value="">Chọn tỉnh thành</option>    
                                <option value="">Chọn tỉnh thành</option>     
                                <option value="">Chọn tỉnh thành</option>    
                                <option value="">Chọn tỉnh thành</option>    
                                <option value="">Chọn tỉnh thành</option>    
                                
                            </select>
                        </div> 
                        <div class="col-lg-4 mb-30">
                            <label>Tỉnh/Thành phố<span>*</span></label>
                            <select class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm">
                                <option value="" selected>Chọn quận huyện</option>
                            </select>

                        </div> 
                        <div class="col-lg-4 mb-30">
                            <label>Tỉnh/Thành phố<span>*</span></label>
                            <select class="form-select form-select-sm" id="ward" aria-label=".form-select-sm">
                                <option value="" selected>Chọn phường xã</option>
                                </select>
                        </div>  --}}
                        <div class="col-12 mb-30">
                            <label>Địa chỉ chi tiết <span>*</span></label>
                            <input placeholder="Nhập địa chỉ chi tiết" type="text" name="shipping_address" value="{{$address}}" required>     
                        </div>
                        <div class="col-lg-6 mb-30">
                            <label>Số điện thoại<span>*</span></label>
                            <input type="text" name="shipping_phonenumber" value="{{$phonenumber}}" required> 

                        </div> 
                        <div class="col-lg-6 mb-30">
                            <label> Email   <span>*</span></label>
                                <input type="text" name="shipping_email" value="{{$email}}" required> 

                        </div> 
                        <div class="col-12">
                            <div class="order-notes">
                                    <label for="order_note">Ghi chú đơn hàng</label>
                                <textarea id="order_note" name="shipping_notes" placeholder="Ghi chú cho đơn hàng này"></textarea>
                            </div>    
                        </div>   
                        <div class="col-12 mb-30">
                            <div class="checkout_btn">
                                <button type="submit" class="btn-checkout"  style="font-family:arial, sans-serif;cursor: pointer;"> Xác nhận thông tin</button>
                            </div>
                        </div>    		    	    	    	    	    	    
                    </div>  
                </div>
                <div class="col-lg-6 col-md-6">   
                    <h3 style="font-family: arial">Đơn hàng của bạn</h3> 
                    <div class="order_table table-responsive mb-30">
                        <table>
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Sản phẩm</th>
                                    <th>Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $content = Cart::content();    
                                $customer_name = Session()->get('customer_username');
                                $total = 0;
                                ?>
                                @foreach($content as $key => $v_content)
                                    @if($customer_name == $v_content->options->customer_username)
                                        <tr>
                                            <?php
                                                $subtotal = $v_content->price * $v_content->qty;
                                            ?>
                                            <td><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt="" width='60'></td>
                                            <td> {{$v_content->name}} <strong> × {{$v_content->qty}}</strong></td>
                                            <td> {{number_format($subtotal)}}₫</td>
                                        </tr>
                                        <?php $total = $total + $subtotal;
                                        ?>
                                    @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tổng tiền</th>
                                    <th></th>
                                    <td>{{number_format($total)}} ₫</td>
                                </tr>
                                <tr>
                                    <th>Phí giao hàng</th>
                                    <th></th>
                                    <td><strong>0 ₫</strong></td>
                                </tr>
                                <tr class="order_total">
                                    <th>Thanh toán</th>
                                    <th></th>
                                    <td><strong>{{number_format($total)}} ₫</strong></td>
                                </tr>
                            </tfoot>
                        </table>     
                    </div>
                    <h5>Chọn hình thức thanh toán</h5>
                    <div class="payment_method">
                        <div class="panel-default">
                            <input id="payment_cash" name="payment_option" type="checkbox" data-target="createp_account" value="1" checked>
                            <label for="payment_cash">Thanh toán tiền mặt</label>
                        </div> 
                        <div class="panel-default">
                            <input id="payment_paypal" name="payment_option" type="checkbox" data-target="createp_account" value="2">
                            <label for="payment_paypal" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">PayPal</label>
                        </div>
                        <div class="panel-default">
                            <input id="payment_momo" name="payment_option" type="checkbox" data-target="createp_account" value="3">
                            <label for="payment_momo" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">Momo</label>
                        </div>
                    </div>
                    <script>
                        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                        checkboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', function() {
                            if (this.checked) {
                            checkboxes.forEach(cb => {
                                if (cb !== this) {
                                cb.checked = false;
                                }
                            });
                            }
                        });
                        });</script> 
                </div>
            </div>   
    </form>    
</div>
<!--Checkout page section end-->

<!--Checkout page section end-->

 @endsection