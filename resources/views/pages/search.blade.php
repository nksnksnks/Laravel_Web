
@extends('welcome')
@section('content')
<?php
$keywords = Session('keywordSubmit'); 
?>
<title>Tìm kiếm: {{$keywords}}</title>
<!--header end -->
            <!--shop tab product-->
            <div class="shop_tab_product">   
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="large" role="tabpanel">
                        <div class="block_title">
                            <h3>Tìm kiếm: {{$keywords}}</h3>
                        </div>
                        <div class="row">
                            @foreach($search_product as $key => $product)
                            <div class="col-lg-4 col-md-6">
                                <div class="single_product">
                                    <div class="product_thumb">
                                    <a href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}"><img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt=""></a> 
                                       <div class="img_icone">
                                        <img src="{{('public\front-end\assets\img\cart\span-new.png')}}" alt="">
                                       </div>
                                       <div class="product_action">
                                           <a href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
                                       </div>
                                    </div>
                                    <div class="product_content">
                                        <span class="product_price">{{number_format($product->product_price).' VNĐ'}}</span>
                                        <h3 class="product_title"><a href="single-product.html">{{$product->product_name}}</a></h3>
                                    </div>
                                    <div class="product_info">
                                        <ul>
                                            <li><a href="#" title=" Add to Wishlist ">Yêu thích</a></li>
                                            <li><a href="#" data-toggle="modal" data-id="{{$product->product_id}}" data-target="#modal_box_home_{{$product->product_id}}" title="Quick view">Xem nhanh</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modal_box_home_{{$product->product_id}}" tabindex="-1" role="dialog" aria-hidden="true" data-id="{{$product->product_id}}">
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
                                                                        <a href="#"><img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt=""></a>    
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
                                                                <h2><div id="product_name">{{$product->product_name}}</div></h2> 
                                                            </div>
                                                            <div class="modal_price mb-10">
                                                                <span class="new_price">{{number_format($product->product_price)}} VNĐ</span>    
                                                                <span class="old_price">$78.99</span>    
                                                            </div>
                                                            <div class="modal_content mb-10">
                                                                <p>{{$product->product_content}}</p>    
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
                                                                    <a class="btn-view" href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
                                                                </form>
                                                            </div>   
                                                            <div class="modal_description mb-15">
                                                                <p>{{$product->product_desc}}</p>    
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
                            @endforeach
                        </div>  
                    </div>
                    <div class="tab-pane fade" id="list" role="tabpanel">
                        <div class="product_list_item mb-35">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product_thumb">
                                       <a href="single-product.html"><img src="assets\img\product\product2.jpg" alt=""></a> 
                                       <div class="hot_img">
                                           <img src="assets\img\cart\span-hot.png" alt="">
                                       </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 col-sm-6">
                                    <div class="list_product_content">
                                       <div class="product_ratting">
                                           <ul>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                           </ul>
                                       </div>
                                        <div class="list_title">
                                            <h3><a href="single-product.html">Lorem ipsum dolor</a></h3>
                                        </div>
                                        <p class="design"> in quibusdam accusantium qui nostrum consequuntur, officia, quidem ut placeat. Officiis, incidunt eos recusandae! Facilis aliquam vitae blanditiis quae perferendis minus eligendi</p>

                                        <p class="compare">
                                            <input id="select" type="checkbox">
                                            <label for="select">Select to compare</label>
                                        </p>
                                        <div class="content_price">
                                            <span>$118.00</span>
                                            <span class="old-price">$130.00</span>
                                        </div>
                                        <div class="add_links">
                                            <ul>
                                                <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#modal_box_home" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="product_list_item mb-35">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product_thumb">
                                       <a href="single-product.html"><img src="assets\img\product\product3.jpg" alt=""></a> 
                                       <div class="img_icone">
                                           <img src="assets\img\cart\span-new.png" alt="">
                                       </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 col-sm-6">
                                   <div class="list_product_content">
                                       <div class="product_ratting">
                                           <ul>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                           </ul>
                                       </div>
                                        <div class="list_title">
                                            <h3><a href="single-product.html">Quisque ornare dui</a></h3>
                                        </div>
                                        <p class="design"> in quibusdam accusantium qui nostrum consequuntur, officia, quidem ut placeat. Officiis, incidunt eos recusandae! Facilis aliquam vitae blanditiis quae perferendis minus eligendi</p>

                                        <p class="compare">
                                            <input id="select1" type="checkbox">
                                            <label for="select1">Select to compare</label>
                                        </p>
                                        <div class="content_price">
                                            <span>$118.00</span>
                                            <span class="old-price">$130.00</span>
                                        </div>
                                        <div class="add_links">
                                            <ul>
                                                <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                                                <li><a href="#" data-toggle="modal" data-target="#modal_box_home" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="product_list_item mb-35">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product_thumb">
                                       <a href="single-product.html"><img src="assets\img\product\product4.jpg" alt=""></a> 
                                       <div class="img_icone">
                                           <img src="assets\img\cart\span-new.png" alt="">
                                       </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 col-sm-6">
                                    <div class="list_product_content">
                                       <div class="product_ratting">
                                           <ul>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                           </ul>
                                       </div>
                                        <div class="list_title">
                                            <h3><a href="single-product.html">Maecenas sit amet</a></h3>
                                        </div>
                                        <p class="design"> in quibusdam accusantium qui nostrum consequuntur, officia, quidem ut placeat. Officiis, incidunt eos recusandae! Facilis aliquam vitae blanditiis quae perferendis minus eligendi</p>

                                        <p class="compare">
                                            <input id="select2" type="checkbox">
                                            <label for="select2">Select to compare</label>
                                        </p>
                                        <div class="content_price">
                                            <span>$118.00</span>
                                            <span class="old-price">$130.00</span>
                                        </div>
                                        <div class="add_links">
                                            <ul>
                                                <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                                                <li><a href="#" data-toggle="modal" data-target="#modal_box_home" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div> 
                        <div class="product_list_item mb-35">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product_thumb">
                                       <a href="single-product.html"><img src="assets\img\product\product5.jpg" alt=""></a> 
                                       <div class="img_icone">
                                           <img src="assets\img\cart\span-new.png" alt="">
                                       </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 col-sm-6">
                                    <div class="list_product_content">
                                       <div class="product_ratting">
                                           <ul>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                           </ul>
                                       </div>
                                        <div class="list_title">
                                            <h3><a href="single-product.html">Sed non luctus turpis</a></h3>
                                        </div>
                                        <p class="design"> in quibusdam accusantium qui nostrum consequuntur, officia, quidem ut placeat. Officiis, incidunt eos recusandae! Facilis aliquam vitae blanditiis quae perferendis minus eligendi</p>

                                        <p class="compare">
                                            <input id="select3" type="checkbox">
                                            <label for="select3">Select to compare</label>
                                        </p>
                                        <div class="content_price">
                                            <span>$118.00</span>
                                            <span class="old-price">$130.00</span>
                                        </div>
                                        <div class="add_links">
                                            <ul>
                                                <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                                                <li><a href="#" data-toggle="modal" data-target="#modal_box_home" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div> 
                        <div class="product_list_item mb-35">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product_thumb">
                                       <a href="single-product.html"><img src="assets\img\product\product6.jpg" alt=""></a> 
                                       <div class="hot_img">
                                           <img src="assets\img\cart\span-hot.png" alt="">
                                       </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 col-sm-6">
                                    <div class="list_product_content">
                                       <div class="product_ratting">
                                           <ul>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                           </ul>
                                       </div>
                                        <div class="list_title">
                                            <h3><a href="single-product.html">Donec dignissim eget</a></h3>
                                        </div>
                                        <p class="design"> in quibusdam accusantium qui nostrum consequuntur, officia, quidem ut placeat. Officiis, incidunt eos recusandae! Facilis aliquam vitae blanditiis quae perferendis minus eligendi</p>

                                        <p class="compare">
                                            <input id="select4" type="checkbox">
                                            <label for="select4">Select to compare</label>
                                        </p>
                                        <div class="content_price">
                                            <span>$118.00</span>
                                            <span class="old-price">$130.00</span>
                                        </div>
                                        <div class="add_links">
                                            <ul>
                                                <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                                                <li><a href="#" data-toggle="modal" data-target="#modal_box_home" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div> 
                        <div class="product_list_item mb-35">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product_thumb">
                                       <a href="single-product.html"><img src="assets\img\product\product7.jpg" alt=""></a> 
                                       <div class="img_icone">
                                           <img src="assets\img\cart\span-new.png" alt="">
                                       </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 col-sm-6">
                                    <div class="list_product_content">
                                       <div class="product_ratting">
                                           <ul>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                           </ul>
                                       </div>
                                        <div class="list_title">
                                            <h3><a href="single-product.html">Lorem ipsum dolor</a></h3>
                                        </div>
                                        <p class="design"> in quibusdam accusantium qui nostrum consequuntur, officia, quidem ut placeat. Officiis, incidunt eos recusandae! Facilis aliquam vitae blanditiis quae perferendis minus eligendi</p>

                                        <p class="compare">
                                            <input id="select5" type="checkbox">
                                            <label for="select5">Select to compare</label>
                                        </p>
                                        <div class="content_price">
                                            <span>$118.00</span>
                                            <span class="old-price">$130.00</span>
                                        </div>
                                        <div class="add_links">
                                            <ul>
                                                <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                                                <li><a href="#" data-toggle="modal" data-target="#modal_box_home" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div> 
                        <div class="product_list_item mb-35">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product_thumb">
                                       <a href="single-product.html"><img src="assets\img\product\product8.jpg" alt=""></a> 
                                       <div class="img_icone">
                                           <img src="assets\img\cart\span-new.png" alt="">
                                       </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 col-sm-6">
                                    <div class="list_product_content">
                                       <div class="product_ratting">
                                           <ul>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                           </ul>
                                       </div>
                                        <div class="list_title">
                                            <h3><a href="single-product.html">Donec ac congue</a></h3>
                                        </div>
                                        <p class="design"> in quibusdam accusantium qui nostrum consequuntur, officia, quidem ut placeat. Officiis, incidunt eos recusandae! Facilis aliquam vitae blanditiis quae perferendis minus eligendi</p>

                                        <p class="compare">
                                            <input id="select6" type="checkbox">
                                            <label for="select6">Select to compare</label>
                                        </p>
                                        <div class="content_price">
                                            <span>$118.00</span>
                                            <span class="old-price">$130.00</span>
                                        </div>
                                        <div class="add_links">
                                            <ul>
                                                <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                                                <li><a href="#" data-toggle="modal" data-target="#modal_box_home" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div> 
                        <div class="product_list_item mb-35">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product_thumb">
                                       <a href="single-product.html"><img src="assets\img\product\product9.jpg" alt=""></a> 
                                       <div class="hot_img">
                                           <img src="assets\img\cart\span-hot.png" alt="">
                                       </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 col-sm-6">
                                    <div class="list_product_content">
                                       <div class="product_ratting">
                                           <ul>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                           </ul>
                                       </div>
                                        <div class="list_title">
                                            <h3><a href="single-product.html">Curabitur sodales</a></h3>
                                        </div>
                                        <p class="design"> in quibusdam accusantium qui nostrum consequuntur, officia, quidem ut placeat. Officiis, incidunt eos recusandae! Facilis aliquam vitae blanditiis quae perferendis minus eligendi</p>

                                        <p class="compare">
                                            <input id="select7" type="checkbox">
                                            <label for="select7">Select to compare</label>
                                        </p>
                                        <div class="content_price">
                                            <span>$118.00</span>
                                            <span class="old-price">$130.00</span>
                                        </div>
                                        <div class="add_links">
                                            <ul>
                                                <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                                                <li><a href="#" data-toggle="modal" data-target="#modal_box_home" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div> 
                        <div class="product_list_item mb-35">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product_thumb">
                                       <a href="single-product.html"><img src="assets\img\product\product1.jpg" alt=""></a> 
                                       <div class="img_icone">
                                           <img src="assets\img\cart\span-new.png" alt="">
                                       </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 col-sm-6">
                                    <div class="list_product_content">
                                       <div class="product_ratting">
                                           <ul>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                               <li><a href="#"><i class="fa fa-star"></i></a></li>
                                           </ul>
                                       </div>
                                        <div class="list_title">
                                            <h3><a href="single-product.html">Lorem ipsum dolor</a></h3>
                                        </div>
                                        <p class="design"> in quibusdam accusantium qui nostrum consequuntur, officia, quidem ut placeat. Officiis, incidunt eos recusandae! Facilis aliquam vitae blanditiis quae perferendis minus eligendi</p>

                                        <p class="compare">
                                            <input id="select8" type="checkbox">
                                            <label for="select8">Select to compare</label>
                                        </p>
                                        <div class="content_price">
                                            <span>$118.00</span>
                                            <span class="old-price">$130.00</span>
                                        </div>
                                        <div class="add_links">
                                            <ul>
                                                <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                                                <li><a href="#" data-toggle="modal" data-target="#modal_box_home" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>                        
                    </div>

                </div>
            </div>    
            <!--shop tab product end-->  

        </div>
    </div>  
</div>
<!--pos home section end-->
<!-- modal area start --> 
<!-- modal area end --> 
@endsection