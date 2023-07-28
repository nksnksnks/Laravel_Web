@extends('welcome_2')
@section('content2')
<title>Đăng nhập</title>
<div class="customer_login">
    <div class="row">
               <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <?php
                            $message_login = Session() -> get('message_login');
                        ?>
                        <h2 style="font-family: arial;">Đăng nhập</h2>
                        <form action="{{URL::to('/login-customer')}}" method="POST">
                            {{ csrf_field() }}
                            <p>   
                                <label>Username hoặc email <span>*</span></label>
                                <input type="text" name="customer_email">
                             </p>
                             <p>   
                                <label>Mật khẩu <span>*</span></label>
                                <input type="password" name="customer_password">
                             </p> 
                             <?php
                             if($message_login){
                                 ?> <div style="color:red;"><?php echo $message_login?></div>
                             <?php
                             $message_login = Session() -> put('message_login', null);
                             }
                             ?>  
                            <div class="login_submit">
                                <button type="submit">Đăng nhập</button>
                                <label for="remember">
                                    <input id="remember" type="checkbox">
                                    Ghi nhớ
                                </label>
                                <a href="#">Quên mật khẩu?</a>
                            </div>

                        </form>
                     </div>    
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Đăng ký</h2>
                        <?php
                            $message_user = Session() -> get('message_user');
                        ?>
                        <form action="{{URL::to('/add-customer')}}" method="POST">
                            {{ csrf_field() }}
                            <p>   
                                <label>Họ tên<span>*</span></label>
                                <input type="text" name="customer_name" required>
                             </p>
                            <p>  
                            <p>   
                                <label>Số điện thoại<span>*</span></label>
                                <input type="text" name="customer_phonenumber" required>
                                </p>
                            <p>     
                            <p>   
                                <label>Tên đăng nhập<span>*</span></label>
                                <input type="text" name="customer_username" required>
                             </p>
                            <p>   
                                <label>Email<span>*</span></label>
                                <input type="text" name="customer_email" required>
                             </p>
                             <p>   
                                <label>Mật khẩu <span>*</span></label>
                                <input type="password" name="customer_password" required>
                             </p>
                             <p>   
                                <label>Nhập lại mật khẩu <span>*</span></label>
                                <input type="password" name="customer_password2" required>
                             </p>
                             <?php
                            if($message_user){
                                ?> <div style="color:red;"><?php echo $message_user?></div>
                            <?php
                            $message_user = Session() -> put('message_user', null);
                            }
                            ?>
                            <div class="login_submit">
                                <button type="submit">Đăng ký</button>
                            </div>
                        </form>
                    </div>    
                </div>
                <!--register area end-->
            </div>
</div>
<!-- customer login end -->

 @endsection