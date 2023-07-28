<?php
use Illuminate\Support\Facades\DB;
?>
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta property="og:type" content="website" />
        {{-- <title>Pos Coron</title> --}}
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{URL::TO('public\front-end\assets\img\logo\logo.jpg.png')}}" type="image/x-icon">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets\img\favicon.png">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<!-- all css here -->
        <link rel="stylesheet" href="{{asset('public\front-end\assets\css\bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('public\front-end\assets\css\plugin.css')}}">
        <link rel="stylesheet" href="{{asset('public\front-end\assets\css\bundle.css')}}">
        <link rel="stylesheet" href="{{asset('public\front-end\assets\css\style.css')}}">
        <link rel="stylesheet" href="{{asset('public\front-end\assets\css\responsive.css')}}">
        
        <script src="{{asset('public\front-end\assets\js\vendor\modernizr-2.8.3.min.js')}}"></script>
    </head>

    <style>
        /* vote-star */
  
  .rating-0 {
    filter: grayscale(100%);
  }
  
  .rating > input {
    display: none;
  }
  
  .rating > label {
    cursor: pointer;
    width: 40px;
    height: 40px;
    margin-top: auto;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: center;
    background-size: 76%;
    transition: .3s;
  }
  
  .rating > input:checked ~ label,
  .rating > input:checked ~ label ~ label {
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
  }
  
  
  .rating > input:not(:checked) ~ label:hover,
  .rating > input:not(:checked) ~ label:hover ~ label {
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
  }
  input.starr { display: none; }
   
   label.starr {
       left:0;
       float: right;
       padding: 10px;
       font-size: 36px; 
       color: #444;
       transition: all .2s;
   }
   label.starr:hover { transform: rotate(-15deg) scale(1.3); }
        /* end-vote-star */
        .modal_add_to_cart form a{
            background: none;
            border: 1px solid #444;
            margin-left: 10px;
            font-size: 12px;
            font-weight: 700;
            height: 38px;
            line-height: 18px;
            padding: 10px 15px;
            text-transform: uppercase;
            background: #444;
            color: #fff;
            border-radius: 5px;
            -webkit-transition: .3s;
            transition: .3s;
            cursor: pointer;
        }
        .modal_add_to_cart form a:hover{
            background: #00bba6;
            color: #fff;
            border-color: #00bba6;
        }
        [type="radio"]:checked,
        [type="radio"]:not(:checked){
        position: absolute;
        visibility: hidden;
        }
        .color-btn:checked + label,
        .color-btn:not(:checked) + label{
        position: relative;
        height: 20px;
        transition: all 200ms linear;
        border-radius: 4px;
        width: 20px;
        overflow: hidden;
        cursor: pointer;
        color: #ffeba7;
        margin-right: 5px;
        box-shadow: 0 12px 35px 0 rgba(16,39,112,.25);
        z-index: 10;
        background-position: center;
        background-size: cover;
        border: 1px solid rgb(87, 87, 87);
        }
        .color-btn:checked + label{
            border: 2px solid rgb(118, 118, 118);
            border-color: #282828;
            transform: scale(1.3);
        }
        </style>
     <body>
            <!-- Add your site or application content here -->
            
            <!--pos page start-->
            <div class="pos_page">
                <div class="container">
                   <!--pos page inner-->
                    <div class="pos_page_inner">  
                       <!--header area -->
                        <div class="header_area">
                               <!--header top--> 
                                <div class="header_top">
                                   <div class="row align-items-center">
                                        <div class="col-lg-6 col-md-6">
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="header_links">
                                                <ul>
                                                    <li><a href="{{URL::to('/contact')}}" title="Contact">Liên hệ chúng tôi</a></li>
                                                    <?php
                                                    $customer_id = Session::get('customer_id');
                                                    $customer_name = Session::get('customer_name');
                                                    $avatar = Session::get('avatar');
                                                        if($customer_id!=NULL){
                                                    ?>
                                                            <li><a href="{{URL::to('/show-cart')}}" title="My cart"><i class="bi bi-cart4"></i> Giỏ hàng của tôi</a></li>
                                                            <li class="dropdown">
                                                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                                                    @if($avatar == 'avatardefault21658465198465131235661.jpg')
                                                                        <img alt="" src="{{asset('public/back-end/images/avatardefault21658465198465131235661.jpg')}}" width=25 height=25 style="border-radius:50%;">
                                                                        
                                                                    @else
                                                                        <img alt="" src="{{asset('public/uploads/avatar/'. $avatar)}}" width=25 height=25 style="border-radius:50%;">
                                                                    @endif
                                                                    <span class="username">{{$customer_name}}</span> 
                                                                    <b class="caret"></b>
                                                                </a>
                                                                <ul class="dropdown-menu extended logout">
                                                                    <li><a href="{{URL::to('/my-account')}}"><i class=" fa fa-suitcase"></i>Thông tin tài khoản</a></li>
                                                                    <li><a href="{{URL::to('/login')}}"><i class="fa fa-key"></i> Đăng xuất</a></li>
                                                                </ul>
                                                            </li>
                                                    <?php
                                                        }else{
                                                    ?>
                                                            <li><a href="{{URL::to('/login')}}" title="Login">Đăng nhập</a></li>
                                                    <?php
                                                        }
                                                    ?>
                                                </ul>
                                            </div>   
                                        </div>
                                   </div> 
                                </div> 
                                <!--header top end-->

                                <!--header middel--> 
                                <div class="header_middel">
                                    <div class="row align-items-center">
                                       <!--logo start-->
                                        <div class="col-lg-3 col-md-3">
                                            <div class="logo">
                                                <a href="{{URL::to('/trang-chu')}}"><img src="{{URL::TO('public\front-end\assets\img\logo\logo.jpg.png')}}" alt=""></a>
                                            </div>
                                        </div>
                                        <!--logo end-->
                                        <div class="col-lg-9 col-md-9">
                                            <div class="header_right_info">
                                                <div class="search_bar">
                                                    <form action="{{URL::to('/tim-kiem')}}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input placeholder="Search..." type="text" name="keyword">
                                                        <button type="submit"><i class="fa fa-search"></i></button>
                                                    </form>
                                                </div>
                                                <?php
                                                if($customer_id!=NULL){
                                                ?>
                                                    <?php
                                                    $content = Cart::content(); 
                                                    $customer_username = Session()->get('customer_username');
                                                    $total=0;
                                                    $sl = 0;
                                                    ?>
                                                    @foreach($content as $key => $v_content)
                                                        @if($v_content->options->customer_username == $customer_username)
                                                            <?php 
                                                            $sl = $sl+1;
                                                            $subtotal = $v_content->price * $v_content->qty;
                                                            $total = $subtotal + $total;
                                                            ?>
                                                        @endif
                                                    @endforeach
                                                    <div class="shopping_cart">
                                                        <a href="#"><i class="fa fa-shopping-cart"></i> {{$sl}} Sản phẩm - {{number_format($total)}} ₫ <i class="fa fa-angle-down"></i></a>

                                                        <!--mini cart-->
                                                        <div class="mini_cart">
                                                            @foreach($content as $key => $v_content)
                                                                @if($v_content->options->customer_username == $customer_username)
                                                                <div class="cart_item">
                                                                    <div class="cart_img">
                                                                        <a href="#"><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt="" width="50" height="50"></a>
                                                                    </div>
                                                                    <div class="cart_info">
                                                                        <a href="{{URL::to('chi-tiet-san-pham/'.$v_content->id)}}">{{$v_content->name}}</a></a>
                                                                        <?php
                                                                            $subtotal = $v_content->price * $v_content->qty;
                                                                        ?>
                                                                        <span class="cart_price">{{number_format($subtotal)}} ₫</span>
                                                                        <span class="quantity">Qty: {{$v_content->qty}}</span>
                                                                    </div>
                                                                    <div class="cart_remove">
                                                                        <a href="{{URL::to('delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times-circle"></i></a>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            @endforeach
                                                            <div class="total_price">
                                                                <span> Thành tiền </span>
                                                                <span class="prices"> {{number_format($total)}} ₫</span>
                                                            </div>
                                                            <?php
                                                            $customer_id = Session::get('customer_id');
                                                                if($customer_id!=NULL){
                                                            ?>
                                                                    <div class="cart_button">
                                                                        <a href="{{URL::to('/checkout')}}"> Đặt hàng</a>
                                                                    </div>
                                                            <?php
                                                                }else{
                                                            ?>
                                                                    <div class="cart_button">
                                                                        <a href="{{URL::to('/login')}}"> Đặt hàng</a>
                                                                    </div>
                                                            <?php
                                                                }
                                                            ?>
                                                        </div>
                                                        <!--mini cart end-->
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>     
                                <!--header middel end-->         
                            <div class="header_bottom">
                                <div class="row">
                                        <div class="col-12">
                                            <div class="main_menu_inner">
                                                <div class="main_menu d-none d-lg-block">
                                                    <nav>
                                                        <ul style="font-family: arial;">
                                                            <li class="active"><a href="{{URL::to('/trang-chu')}}">Trang chủ</a>
                                                            </li>
                                                            <li><a href="#">Danh mục</a>
                                                                <div class="mega_menu jewelry">
                                                                    <div class="mega_items jewelry">
                                                                        <ul>
                                                                            <li><a href="{{URL::to('/trang-chu')}}">Sản phẩm mới</a></li>
                                                                            <li><a href="{{URL::to('/trang-chu')}}">Sản phẩm bán chạy</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>  
                                                            </li>
                                                            <li><a href="#">Nam</a>
                                                                <div class="mega_menu jewelry">
                                                                    <div class="mega_items jewelry">
                                                                        <div class="mega_items">
                                                                            <ul>
                                                                                <li><a href="#">Giày</a></li>
                                                                                <li><a href="#">Quần</a></li>
                                                                                <li><a href="#">Áo</a></li>
                                                                                <li><a href="#">Phụ kiện</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><a href="#">Nữ</a>
                                                                <div class="mega_menu jewelry">
                                                                    <div class="mega_items jewelry">
                                                                        <div class="mega_items">
                                                                            <ul>
                                                                                <li><a href="#">Giày</a></li>
                                                                                <li><a href="#">Quần</a></li>
                                                                                <li><a href="#">Váy</a></li>
                                                                                <li><a href="#">Áo</a></li>
                                                                                <li><a href="#">Phụ kiện</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </li>
                                                            
                                                            <li><a href="blog.html">blog</a>
                                                                <div class="mega_menu jewelry">
                                                                    <div class="mega_items jewelry">
                                                                        <ul>
                                                                            <li><a href="#">Giới thiệu</a></li>
                                                                            <li><a href="#">Thông tin mới</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>  
                                                            </li>
                                                            <li><a href="{{URL::to('/contact')}}">Về chúng tôi</a></li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                                <div class="mobile-menu d-lg-none">
                                                    <nav>
                                                        <ul>
                                                            <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a>
                                                            </li>
                                                            <li><a href="#">Danh mục</a>
                                                                <div>
                                                                    <div>
                                                                        <ul>
                                                                            <li><a href="{{URL::to('/trang-chu')}}">Sản phẩm mới</a></li>
                                                                            <li><a href="{{URL::to('/trang-chu')}}">Sản phẩm bán chạy</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>  
                                                            </li>
                                                            <li><a href="#">Nam</a>
                                                                <ul>
                                                                    <li><a href="#">Giày</a></li>
                                                                    <li><a href="#">Quần</a></li>
                                                                    <li><a href="#">Áo</a></li>
                                                                    <li><a href="#">Phụ kiện</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="#">Nữ</a>
                                                                <ul>
                                                                    <li><a href="#">Giày</a></li>
                                                                    <li><a href="#">Quần</a></li>
                                                                    <li><a href="#">Váy</a></li>
                                                                    <li><a href="#">Áo</a></li>
                                                                    <li><a href="#">Phụ kiện</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="#">Blog</a>
                                                                <ul>
                                                                    <li><a href="#">Giới thiệu</a></li>
                                                                    <li><a href="#">Thông tin mới</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="{{URL::to('/contact')}}">contact us</a></li>

                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <!--pos home section-->
                        <div class=" pos_home_section" style="font-family: Arial, sans-serif;">
                            <div class="row pos_home">
                                <div class="col-lg-3 col-md-8 col-12">
                                   <!--sidebar banner-->
                                    <div class="sidebar_widget banner mb-35">
                                        <div class="banner_img mb-35">
                                            <a href="#"><img src="{{URL::TO('public\front-end\assets\img\banner\banner5.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="banner_img">
                                            <a href="#"><img src="{{URL::TO('public\front-end\assets\img\banner\banner6.jpg')}}" alt=""></a>
                                        </div>
                                    </div>
                                    <!--sidebar banner end-->

                                    <!--categorie menu start-->
                                    <div class="sidebar_widget catrgorie mb-35">
                                        <h3>Danh mục</h3>
                                        <ul>
                                            <li class="has-sub"><a href="#"><i class="fa fa-caret-right"></i> Danh mục sản phẩm</a>
                                                <ul class="categorie_sub">
                                                    @foreach ($category as $key => $cate)
                                                        <li class="has-sub"><a href="{{URL::to('danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                                                    @endforeach  
                                                </ul> 
                                            </li>    
                                            <li class="has-sub"><a href="#"><i class="fa fa-caret-right"></i> Thương hiệu sản phẩm</a>
                                                <ul class="categorie_sub">
                                                    @foreach ($brand as $key => $bran)
                                                        <li class="has-sub"><a href="{{URL::to('thuong-hieu-san-pham/'.$bran->brand_id)}}"><i class="fa fa-caret-right"></i>{{$bran->brand_name}}</a>   
                                                        </li>
                                                    @endforeach  
                                                </ul> 
                                            </li>
                                        </ul>     
                                    </div>
                                    <!--categorie menu end-->

                                    <!--price slider start-->                                     
                                    <div class="sidebar_widget price">
                                        <div class="block_title">
                                            <h3>PRICE</h3>
                                        </div>
                                        <div class="ca_search_filters">

                                            <input type="text" name="text" id="amount">  
                                            <div id="slider-range"></div> 
                                        </div>
                                    </div>                                                       
                                    <div class="sidebar_widget bottom ">
                                        <div class="banner_img">
                                            <a href="#"><img src="{{URL::TO('public\front-end\assets\img\banner\banner9.jpg')}}" alt=""></a>
                                        </div>
                                    </div>
                                    <!--sidebar banner end-->



                                </div>
                                <div class="col-lg-9 col-md-12">



{{-- yield                                     --}}
                        @yield('content')  
{{-- -----------------------------------------------------    --}}





                    </div>
                    <!--pos page inner end-->
                </div>
            </div>
            <!--pos page end-->
            
            <!--footer area start-->
            <div class="footer_area">
                <div class="footer_top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer_widget">
                                    <h3>Về chúng tôi</h3>
                                    <p>Chuyên cung cấp những sản phẩm chính hãng của các nhãn hiệu lớn với mức giá tốt nhất.</p>
                                    <div class="footer_widget_contect">
                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>  112-Vu Ngoc Phan, Lang Ha, Dong Da, HN</p>

                                        <p><i class="fa fa-mobile" aria-hidden="true"></i> 0848 173 289</p>
                                        <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> nguyenkhacsonnn@gmail.com </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer_widget">
                                    <h3>Tài khoản của tôi</h3>
                                    <ul>
                                        <li><a href="{{URL::to('/my-account')}}">Tài khoản</a></li>
                                        <li><a href="{{URL::to('/my-account')}}">Đơn hàng</a></li>
                                        <li><a href="{{URL::to('/show-cart')}}">Giỏ hàng</a></li>
                                        <li><a href="{{URL::to('/login')}}">Đăng xuất</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer_widget">
                                    <h3>Thông tin</h3>
                                    <ul>
                                        <li><a href="#">Đặc biệt</a></li>
                                        <li><a href="{{URL::to('/trang-chu')}}">Cửa hàng của chúng tôi</a></li>
                                        <li><a href="#">Phiếu tín dụng của chúng tôi</a></li>
                                        <li><a href="#">Các điều khoản và điều kiện</a></li>
                                        <li><a href="#">Về chúng tôi</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer_widget">
                                    <h3>Tính năng bổ sung</h3>
                                    <ul>
                                        <li><a href="#"> Nhãn hiệu</a></li>
                                        <li><a href="#"> Phiếu giảm giá </a></li>
                                        <li><a href="#"> Đặc biệt </a></li>
                                        <li><a href="#"> Chính sách bảo mật </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer_bottom">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="copyright_area">
                                    <ul>
                                        <li><a href="#">  Dịch vụ khách hàng  </a></li>
                                        <li><a href="#">  Chính sách bảo mật  </a></li>
                                    </ul>
                                    <p>Bản quyền &copy; 2023 <a href="#">SownNK</a>.Đã đăng ký bản quyền. </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="footer_social text-right">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer area end-->
            
            <!-- modal area start --> 
           <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal_body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <div class="modal_tab">  
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                                    <div class="modal_tab_img">
                                                        <a href="#"><img src="{{URL::TO('public\front-end\assets\img\product\product13.jpg')}}" alt=""></a>    
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab2" role="tabpanel">
                                                    <div class="modal_tab_img">
                                                        <a href="#"><img src="{{URL::TO('public\front-end\assets\img\product\product14.jpg')}}" alt=""></a>    
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab3" role="tabpanel">
                                                    <div class="modal_tab_img">
                                                        <a href="#"><img src="{{URL::TO('public\front-end\assets\img\product\product15.jpg')}}" alt=""></a>    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal_tab_button">    
                                                <ul class="nav product_navactive" role="tablist">
                                                    <li>
                                                        <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="assets\img\cart\cart17.jpg" alt=""></a>
                                                    </li>
                                                    <li>
                                                         <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="assets\img\cart\cart18.jpg" alt=""></a>
                                                    </li>
                                                    <li>
                                                       <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="assets\img\cart\cart19.jpg" alt=""></a>
                                                    </li>
                                                </ul>
                                            </div>    
                                        </div>  
                                    </div> 
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <div class="modal_right">
                                            <div class="modal_title mb-10">
                                                <h2>Handbag feugiat</h2> 
                                            </div>
                                            <div class="modal_price mb-10">
                                                <span class="new_price">$64.99</span>    
                                                <span class="old_price">$78.99</span>    
                                            </div>
                                            <div class="modal_content mb-10">
                                                <p>Short-sleeved blouse with feminine draped sleeve detail.</p>    
                                            </div>
                                            <div class="modal_size mb-15">
                                               <h2>size</h2>
                                                <ul>
                                                    <li><a href="#">s</a></li>
                                                    <li><a href="#">m</a></li>
                                                    <li><a href="#">l</a></li>
                                                    <li><a href="#">xl</a></li>
                                                    <li><a href="#">xxl</a></li>
                                                </ul>
                                            </div>
                                            <div class="modal_add_to_cart mb-15">
                                                <form action="#">
                                                    <input min="0" max="100" step="2" value="1" type="number">
                                                    <button type="submit">add to cart</button>
                                                </form>
                                            </div>   
                                            <div class="modal_description mb-15">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>    
                                            </div> 
                                            <div class="modal_social">
                                                <h2>Share this product</h2>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                </ul>    
                                            </div>      
                                        </div>    
                                    </div>    
                                </div>     
                            </div>
                        </div>    
                    </div>
                </div>
            </div> 
            
          <!-- modal area end --> 
          <script src="{{asset('public\front-end\assets\js\popper.js')}}"></script>
          <script src="{{asset('public\front-end\assets\js\vendor\jquery-1.12.0.min.js')}}"></script>
          <script src="{{asset('public\front-end\assets\js\bootstrap.min.js')}}"></script>
          <script src="{{asset('public\front-end\assets\js\ajax-mail.js')}}"></script>
          <script src="{{asset('public\front-end\assets\js\plugins.js')}}"></script>
          <script src="{{asset('public\front-end\assets\js\main.js')}}"></script>
		<!-- all js here -->
    </body>
</html>