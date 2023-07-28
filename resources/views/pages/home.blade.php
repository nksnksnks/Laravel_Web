
                        @extends('welcome')
                        @section('content')
                        <title>Pos Coron</title>
                        <!--header end -->
                                    <!--shop tab product-->
                                    <div class="banner_slider slider_1">
                                        <div class="slider_active owl-carousel">
                                            <div class="single_slider" style="background-image: url('public/front-end/assets/img/slider/slide_1.png')">
                                                <div class="slider_content">
                                                    <div class="slider_content_inner">  
                                                        <h1>Thời trang cho nữ</h1>
                                                        <p>Thiên đường của nữ giới </p>
                                                        <a href="#">Khám phá ngay</a>
                                                    </div>     
                                                </div>    
                                            </div>
                                            <div class="single_slider" style="background-image: url('public/front-end/assets/img/slider/slider_2.png')">
                                                <div class="slider_content">
                                                    <div class="slider_content_inner">  
                                                        <h1>Sản phẩm mới</h1>
                                                        <p>Những sản phẩm mới với phong cách thời trang mới nhất. </p>
                                                        <a href="#">Khám phá ngay</a>
                                                    </div>         
                                                </div>         
                                            </div>
                                            <div class="single_slider" style="background-image: url('public/front-end/assets/img/slider/slider_3.png')">
                                                <div class="slider_content">  
                                                    <div class="slider_content_inner">  
                                                        <h1>Sản phẩm bán chạy</h1>
                                                        <p>Những sản phẩm được bán chạy nhất tại Pos Coron. </p>
                                                        <a href="#">Khám phá ngay</a>
                                                    </div> 
                                                </div> 
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="shop_tab_product">   
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="large" role="tabpanel">
                                                <div class="block_title">
                                                    <h3>Sản phẩm mới</h3>
                                                </div>
                                                <div class="row">
                                                    @foreach($product as $key => $product)
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
                                                            <div class="product_price" style="color:#00BBA6; text-align:center;font-size:1.2rem;font-weight: bold;margin:10px 0 7px 0;">
                                                                {{number_format(($product->product_price)/100*(100-$product->product_sale))}}₫  
                                                                <span style="color:rgb(60, 60, 60);font-size:1rem;top:0; text-decoration: line-through;font-weight: normal;">{{number_format($product->product_price)}}₫</span></div>
                                                            <div class="product_content">
                                                                <h3 class="product_title"><a href="single-product.html">{{$product->product_name}}</a></h3>
                                                            </div>
                                                            <div class="product_info">
                                                                <ul>
                                                                    <li><a href="#" title=" Add to Wishlist">Yêu thích</a></li>
                                                                    <li><a href="#" data-toggle="modal" data-id="{{$product->product_id}}" data-target="#modal_box_home_{{$product->product_id}}" title="Quick view">Xem nhanh</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                

                                                    <div class="modal fade" id="modal_box_home_{{$product->product_id}}" tabindex="-1" role="dialog" aria-hidden="true" data-id="{{$product->product_id}}">
                                                        <?php
                                                            $color_product =  DB::table('tbl_color_product')
                                                            ->join('tbl_color', 'tbl_color.color_id', '=', 'tbl_color_product.color_id')
                                                            ->where('product_id', $product->product_id) -> orderby('color_product_id', 'desc') -> get();

                                                            $image_desc = DB::table('tbl_image_desc')
                                                            -> where('product_id', $product->product_id) -> orderby('image_desc_id', 'desc') -> get();
                                                        ?>
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
                                                                                                <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal_tab_button">    
                                                                                        <ul class="nav product_navactive" role="tablist">
                                                                                            @foreach($image_desc as $key => $desc)
                                                                                                <li>
                                                                                                    <img src="{{URL::to('public/uploads/product/'.$desc->image_desc)}}" alt="">
                                                                                                </li>
                                                                                            @endforeach
                                                                                        
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
                                                                                        <span class="new_price">{{number_format(($product->product_price)/100*(100-$product->product_sale))}} VNĐ</span>    
                                                                                        <span class="old_price">{{number_format($product->product_price)}}₫</span>    
                                                                                    </div>
                                                                                    <div class="modal_content mb-10">
                                                                                        <p><?php echo $product->product_content ?></p>    
                                                                                    </div>
                                                                                    <div class="modal_add_to_cart mb-15">
                                                                                        <form action="{{URL::to('/save-to-cart')}}" method="post">
                                                                                            {{ csrf_field() }}
                                                                                            <div class="sidebar_widget color">
                                                                                                <input type="hidden" name="product_id_hidden" value="{{$product->product_id}}">
                                                                                                <input type="hidden" name="product_price_hidden" 
                                                                                                    value="{{($product->product_price)/100*(100-$product->product_sale)}}">
                                                                                                <?php $size= $product->product_size?>
                                                                                                <?php if($size == 0){?>
                                                                                                    <div class="product_d_size mb-20">
                                                                                                        <label>Kích cỡ</label>
                                                                                                        <select name="size" id="group_1" style="z-index: 10;">
                                                                                                            <option value="S" style="z-index: 10;">S</option>
                                                                                                            <option value="M" style="z-index: 10;">M</option>
                                                                                                            <option value="L" style="z-index: 10;">L</option>
                                                                                                            <option value="XL" style="z-index: 10;">XL</option>
                                                                                                            <option value="XXL" style="z-index: 10;">XXL</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <?php 
                                                                                                    }
                                                                                                    ?>
                                                                                                    <?php if($size == 1){?>
                                                                                                        <div class="product_d_size mb-20">
                                                                                                            <label>kích cỡ</label>
                                                                                                            <select name="size" id="group_1" style="z-index: 10;">
                                                                                                                <option value="35" style="z-index: 10;">35</option>
                                                                                                                <option value="36" style="z-index: 10;">36</option>
                                                                                                                <option value="37" style="z-index: 10;">37</option>
                                                                                                                <option value="38" style="z-index: 10;">38</option>
                                                                                                                <option value="39" style="z-index: 10;">39</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <?php 
                                                                                                        }
                                                                                                        ?>
                                                                                                    <?php if($size == 2){?>
                                                                                                        <div class="product_d_size mb-20">
                                                                                                            <label>Kích cỡ</label>
                                                                                                            <select name="size" id="group_1" style="z-index: 10;">
                                                                                                                <option value="38" style="z-index: 10;">38</option>
                                                                                                                <option value="39" style="z-index: 10;">39</option>
                                                                                                                <option value="40" style="z-index: 10;">40</option>
                                                                                                                <option value="41" style="z-index: 10;">41</option>
                                                                                                                <option value="42" style="z-index: 10;">42</option>
                                                                                                                <option value="43" style="z-index: 10;">43</option> 
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <?php 
                                                                                                        }
                                                                                                        ?>
                                                                                                <h2 style="font-size:0.95rem;padding-top:10px;">Chọn màu sắc</h2>
                                                                                                <div class="widget_color">
                                                                                                    
                                                                                                    @foreach($color_product as $key => $color)
                                                                                                        <input class="color-btn for-color-{{$color->color_id}}" type="radio" id="color-{{$color->color_id}}" name="color_name" checked value="{{$color->color_name}}"/>
                                                                                                        <label class="color-{{$color->color_id}}" for="color-{{$color->color_id}}" style="background-color:{{$color->color_code}}; border-radius:50%;z-index:1;"></label>
                                                                                                    @endforeach
                                                                                                </div>
                                                                                            </div>
                                                                                            <input min="1" max="100" step="1" value="1" type="number" name="quantity" >
                                                                                            <button class="btn-view" type="submit"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                                                                        </form>
                                                                                    </div>   
                                                                                    <div class="modal_description mb-15">
                                                                                        <p><?php $product->product_desc ?></p>    
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

                                    <!--featured product start--> 
                                    <div class="new_product_area">
                                        <div class="block_title">
                                            <h3>Sản phẩm nổi bật</h3>
                                        </div>
                                        <div class="row">
                                            <div class="product_active owl-carousel">
                                                <?php $i=0;?>
                                                @foreach($hot_product as $key => $rela_product)
                                                <?php $i+=1;
                                                 if($i<5){?>
                                                <div class="col-lg-3">
                                                    <div class="single_product">
                                                        <div class="product_thumb">
                                                        <a href="{{URL::to('chi-tiet-san-pham/'.$rela_product->product_id)}}"><img src="{{URL::to('public/uploads/product/'.$rela_product->product_image)}}" alt=""></a> 
                                                        {{-- <div class="img_icone">
                                                            <img src="{{('public\front-end\assets\img\cart\span-hot.png')}}" alt="">
                                                        </div> --}}
                                                        <div class="hot_img">
                                                            <img src="{{('public\front-end\assets\img\cart\span-hot.png')}}" alt="">
                                                        </div>
                                                        <div class="product_action">
                                                            <a href="{{URL::to('chi-tiet-san-pham/'.$rela_product->product_id)}}"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>
                                                        </div>
                                                        </div>
                                                        <div class="product_content">
                                                            <span class="product_price">{{number_format($rela_product->product_price).'₫'}}</span>
                                                            <h3 class="product_title"><a href="{{URL::to('chi-tiet-san-pham/'.$rela_product->product_id)}}">{{$rela_product->product_name}}</a></h3>
                                                        </div>
                                                        <div class="product_info">
                                                            <ul>
                                                                <li><a href="#" title=" Add to Wishlist ">Yêu thích</a></li>
                                                                <li><a href="#" data-toggle="modal" data-id="{{$rela_product->product_id}}" data-target="#modal_box_home_{{$rela_product->product_id}}" title="Quick view">Xem nhanh</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php }?>
                                                @endforeach
                                            </div> 
                                        </div>       
                                    </div> 
                                                <?php $ii=0;?>
                                                @foreach($hot_product as $key => $rela_product)
                                                <?php $ii+=1;
                                                if($ii<5){?>
                                                <?php
                                                    $color_product =  DB::table('tbl_color_product')
                                                    ->join('tbl_color', 'tbl_color.color_id', '=', 'tbl_color_product.color_id')
                                                    ->where('product_id', $rela_product->product_id) -> orderby('color_product_id', 'desc') -> get();
                            
                                                    $image_desc = DB::table('tbl_image_desc')
                                                    -> where('product_id', $rela_product->product_id) -> orderby('image_desc_id', 'desc') -> get();
                                                ?> 
                                            <div class="modal fade" id="modal_box_home_{{$rela_product->product_id}}" tabindex="-1" role="dialog" aria-hidden="true" data-id="{{$rela_product->product_id}}">
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
                                                                                        <a href="#"><img src="{{URL::to('public/uploads/product/'.$rela_product->product_image)}}" alt=""></a>    
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
                                                                                    @foreach($image_desc as $key => $desc)
                                                                                        <li>
                                                                                            <img src="{{URL::to('public/uploads/product/'.$desc->image_desc)}}" alt="">
                                                                                        </li>
                                                                                    @endforeach
                                                                                
                                                                                </ul>
                                                                            </div>       
                                                                        </div>  
                                                                    </div>
                                                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                                                        <div class="modal_right">
                                                                            <div class="modal_title mb-10">
                                                                                <h2><div id="product_name">{{$rela_product->product_name}}</div></h2> 
                                                                            </div>
                                                                            <div class="modal_price mb-10">
                                                                                <span class="new_price">{{number_format(($rela_product->product_price)/100*(100-$rela_product->product_sale))}} VNĐ</span>    
                                                                                <span class="old_price">{{number_format($rela_product->product_price)}}₫</span>    
                                                                            </div>
                                                                            <div class="modal_content mb-10">
                                                                                <p><?php echo $rela_product->product_content ?></p>    
                                                                            </div>
                                                                            <div class="modal_add_to_cart mb-15">
                                                                                <form action="{{URL::to('/save-to-cart')}}" method="post">
                                                                                    {{ csrf_field() }}
                                                                                    <div class="sidebar_widget color">
                                                                                        <input type="hidden" name="product_id_hidden" value="{{$rela_product->product_id}}">
                                                                                        <input type="hidden" name="product_price_hidden" 
                                                                                            value="{{($rela_product->product_price)/100*(100-$rela_product->product_sale)}}">
                                                                                        <?php $size= $rela_product->product_size?>
                                                                                        <?php if($size == 0){?>
                                                                                            <div class="product_d_size mb-20">
                                                                                                <label>Kích cỡ</label>
                                                                                                <select name="size" id="group_1" style="z-index: 10;">
                                                                                                    <option value="S" style="z-index: 10;">S</option>
                                                                                                    <option value="M" style="z-index: 10;">M</option>
                                                                                                    <option value="L" style="z-index: 10;">L</option>
                                                                                                    <option value="XL" style="z-index: 10;">XL</option>
                                                                                                    <option value="XXL" style="z-index: 10;">XXL</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <?php 
                                                                                            }
                                                                                            ?>
                                                                                            <?php if($size == 1){?>
                                                                                                <div class="product_d_size mb-20">
                                                                                                    <label>kích cỡ</label>
                                                                                                    <select name="size" id="group_1" style="z-index: 10;">
                                                                                                        <option value="35" style="z-index: 10;">35</option>
                                                                                                        <option value="36" style="z-index: 10;">36</option>
                                                                                                        <option value="37" style="z-index: 10;">37</option>
                                                                                                        <option value="38" style="z-index: 10;">38</option>
                                                                                                        <option value="39" style="z-index: 10;">39</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <?php 
                                                                                                }
                                                                                                ?>
                                                                                            <?php if($size == 2){?>
                                                                                                <div class="product_d_size mb-20">
                                                                                                    <label>Kích cỡ</label>
                                                                                                    <select name="size" id="group_1" style="z-index: 10;">
                                                                                                        <option value="38" style="z-index: 10;">38</option>
                                                                                                        <option value="39" style="z-index: 10;">39</option>
                                                                                                        <option value="40" style="z-index: 10;">40</option>
                                                                                                        <option value="41" style="z-index: 10;">41</option>
                                                                                                        <option value="42" style="z-index: 10;">42</option>
                                                                                                        <option value="43" style="z-index: 10;">43</option> 
                                                                                                    </select>
                                                                                                </div>
                                                                                                <?php 
                                                                                                }
                                                                                                ?>
                                                                                        <h2 style="font-size:0.95rem;padding-top:10px;">Chọn màu sắc</h2>
                                                                                        <div class="widget_color">
                                                                                            @foreach($color_product as $key => $color)
                                                                                                <input class="color-btn for-color-{{$color->color_id}}" type="radio" id="color-{{$color->color_id}}" name="color_name" checked value="{{$color->color_name}}"/>
                                                                                                <label class="color-{{$color->color_id}}" for="color-{{$color->color_id}}" style="background-color:{{$color->color_code}}; border-radius:50%;z-index:1;"></label>
                                                                                            @endforeach
                                                                                        </div>
                                                                                    </div>
                                                                                    <input min="1" max="100" step="1" value="1" type="number" name="quantity" >
                                                                                    <button class="btn-view" type="submit"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                                                                </form>
                                                                            </div>   
                                                                            <div class="modal_description mb-15">
                                                                                <p><?php $rela_product->product_desc ?></p>    
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
                                             <?php }?>
                                            @endforeach
                                        </div>       
                                    </div>      
                                    <!--featured product end--> 

                                    <!--banner area start-->
                                    <div class="banner_area mb-60">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single_banner">
                                                    <a href="#"><img src="{{('public\front-end\assets\img\banner\banner7.jpg')}}" alt=""></a>
                                                    <div class="banner_title">
                                                        <p>Up to <span> 40%</span> off</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single_banner">
                                                    <a href="#"><img src="{{('public\front-end\assets\img\banner\banner8.jpg')}}" alt=""></a>
                                                    <div class="banner_title title_2">
                                                        <p>sale off <span> 30%</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>     
                                    <!--banner area end-->        
                                </div>
                            </div>  
                        </div>
                        <!--pos home section end-->
                        <!-- modal area start --> 
      <!-- modal area end --> 
@endsection