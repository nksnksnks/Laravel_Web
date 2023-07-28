@extends('welcome')
@section('content')
    <style>
    </style>
    @foreach($details_product as $key => $product)
    <title>{{$product->product_name}}</title>
    <div class="row">
       <div class="col-lg-6 col-md-6">
            <div class="product_tab sidebar fix"> 
                <div class="tab-content produc_tab_c">
                    <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">
                        <div class="modal_img">
                            <a href="#"><img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt=""></a>
                            @foreach($image_desc as $key => $image)
                                <div class="view_img">
                                    <a class="large_view" href="{{URL::to('public/uploads/product/'.$image->image_desc)}}"><i class="fa fa-search-plus"></i></a>
                                </div>    
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="product_tab_button">    
                    <ul class="nav" role="tablist">
                        @foreach($image_desc as $key => $image)
                        <li>
                            <a class="active" data-toggle="tab" href="#p_tab1" role="tab" aria-controls="p_tab1" aria-selected="false"><img src="{{URL::to('public/uploads/product/'.$image->image_desc)}}" alt=""></a>
                        </li>
                        <div class="view_img">
                            <a class="large_view" href="{{URL::to('public/uploads/product/'.$product->product_image)}}"><i class="fa fa-search-plus"></i></a>
                        </div>  
                        @endforeach
                    </ul>
                </div> 

            </div> 
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="product_d_right">
                <h1 style = "color:#00BBA6;">{{$product->product_name}}</h1>
                 <div class="product_ratting mb-10">
                    <ul>
                        <?php $tb = $product->product_vote_star_point?>
                        <?php for($x = 1; $x <= 5; $x++){
                                $tb-=1;
                                if($tb >= 0){
                        ?>
                                    <li><div style="color: #00BBA6;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                      </svg></div ></li>
                        <?php
                                }else if($tb < 0 && $tb>-1){    
                        ?>
                                    <li><div style="color: #00BBA6;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-half" viewBox="0 0 16 16">
                                        <path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z"/>
                                      </svg></div ></li>
                        <?php       }else{
                            ?>
                                        <li><div style="color: #00BBA6;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                          </svg></div ></li>
                            <?php
                                }
                            }
                        ?>
                        <li>(<span style="color: #00BBA6;">{{$product->product_vote_star}}</span>  Đánh giá)</li>
                    </ul>
                    <ul> <div>(Đã bán <span style="color: #00BBA6;">{{$product->product_sold}}</span>)</div></ul>
                </div>
                <div class="content_price mb-15">
                    <span style="color:#00BBA6;">{{number_format(($product->product_price)/100*(100-$product->product_sale))}}₫</span>
                    <span class="old-price">{{number_format($product->product_price)}}₫</span>
                </div>
                <div class="box_quantity mb-20">
                    <form action="{{URL::to('/save-to-cart')}}" method="post">
                        {{ csrf_field() }}
                        
                        <label style="color:rgb(53, 53, 53); font-size:0.95rem;font-weight: bold;">SỐ LƯỢNG</label>
                        <input min="0" max="100" value="1" type="number" name="quantity"> 
                        <input type="hidden" name="product_id_hidden" value="{{$product->product_id}}">
                        <input type="hidden" name="product_price_hidden" 
                            value="{{($product->product_price)/100*(100-$product->product_sale)}}">
                        <button type="submit" style="font-family:arial, sans-serif;"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button> 
                        <?php $size= $product->product_size?>
                        <?php if($size == 0){?>
                        <div class="product_d_size mb-20">
                            <label>Kích cỡ</label>
                            <select name="size" id="group_1" style="z-index: 10;" style="padding:10px;">
                                <option value="S" style="z-index: 10;" selected>S</option>
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
                        <div class="sidebar_widget color">
                            <h2 style="font-size:0.95rem;padding-top:10px;">Chọn màu sắc</h2>
                            <div class="widget_color">
                                @foreach($color_product as $key => $color)
                                <input class="color-btn for-color-{{$color->color_id}}" type="radio" id="color-{{$color->color_id}}" name="color_name" checked value="{{$color->color_name}}"/>
                                <label class="color-{{$color->color_id}}" for="color-{{$color->color_id}}" style="background-color:{{$color->color_code}}; border-radius:50%;z-index:1;"></label>
                                @endforeach
                            </div>
                        </div>                 
                    </form>
                    <a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a>    
                </div>
                <div class="sidebar_widget">
                    <h6 style="padding-bottom: 20px;">Thương hiệu: {{$product->brand_name}}</h6>
                </div>      
                <div class="product_stock mb-20">
                   <p>Tình trạng: Còn hàng</p>
                    <span> In stock </span> 
                </div>
                <div class="wishlist-share">
                    <h4>Chia sẻ:</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>           
                        <li><a href="#"><i class="fa fa-vimeo"></i></a></li>           
                        <li><a href="#"><i class="fa fa-tumblr"></i></a></li>           
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>        
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>        
                    </ul>      
                </div>
            </div>
        </div>
        <!--product info start-->
        <div class="product_d_info sidebar">
            <div class="col-12">
                <div class="product_d_inner">   
                    <div class="product_info_button">    
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Chi tiết sản phẩm</a>
                            </li>
                            <li>
                                 <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Mô tả sản phẩm</a>
                            </li>
                            <li>
                               <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Đánh giá</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div>ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ</div>
                            <div class="product_desc">
                                <p><?php echo nl2br($product->product_content) ?></p>
                            </div>   
                        </div>

                        <div class="tab-pane fade" id="sheet" role="tabpanel">
                            <div class="product_desc">
                                <p><?php echo nl2br($product->product_desc) ?></p>
                            </div>  
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <?php $check =0;
                            
                            ?>
                            <div class="product_review_form">
                                @foreach($comment_product as $key => $comment) 
                                    @if(isset($comment))
                                        @if($comment->customer_id == session()->get('customer_id'))
                                            <?php $check = 1;
                                            $cmt = $comment->comment_content;
                                            $vote_star = $comment->vote_star;?>
                                        @endif
                                    @endif
                                @endforeach
                                @if($check==1)
                                        <form action="{{URL::to('/sua-danh-gia')}}" method="post">
                                            {{csrf_field()}}
                                            <div>ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ</div>
                                            <input type="hidden" value="{{$product->product_id}}" name="product_id">
                                            <label for="review_comment">Đánh giá của bạn </label>
                                            <div class="product_info_inner">
                                                <div class="product_ratting mb-10">
                                                    <div class="box-star">
                                                        <div class="rating"> 
                                                            <input type="radio" name="new_vote_star" id="rating-5" value="5" <?php if($vote_star == 5)echo('checked')?>>
                                                            <label class="starr star-5" for="rating-5"></label>
                                                            <input type="radio" name="new_vote_star" id="rating-4" value="4" <?php if($vote_star == 4)echo('checked')?>>
                                                            <label class="starr star-4" for="rating-4"></label>
                                                            <input type="radio" name="new_vote_star" id="rating-3" value="3" <?php if($vote_star == 3)echo('checked')?>>
                                                            <label class="starr star-3" for="rating-3"></label>
                                                            <input type="radio" name="new_vote_star" id="rating-2" value="2" <?php if($vote_star == 2)echo('checked')?>>
                                                            <label class="starr star-2" for="rating-2"></label>
                                                            <input type="radio" name="new_vote_star" id="rating-1" value="1" <?php if($vote_star == 1)echo('checked')?>>
                                                            <label class="starr star-1" for="rating-1"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="review_comment">Nhận xét của bạn </label>
                                                    <input name="new_comment_content" id="review_comment" value="{{$cmt}}">
                                                    <input type="hidden" name="old_vote_star" value="{{$vote_star}}">
                                                </div> 
                                            </div>
                                            <button type="submit">Cập nhật</button>
                                        </form> 
                                @else
                                <form action="{{URL::to('/danh-gia')}}" method="post">
                                    {{csrf_field()}}
                                    <div>ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ</div>
                                    <input type="hidden" value="{{$product->product_id}}" name="product_id">
                                    <label for="review_comment">Đánh giá của bạn </label>
                                    <div class="product_info_inner">
                                        <div class="product_ratting mb-10">
                                            <div class="box-star">
                                                <div class="rating"> 
                                                    <input type="radio" name="vote_star" id="rating-5" value="5" checked>
                                                    <label class="starr star-5" for="rating-5" checked></label>
                                                    <input type="radio" name="vote_star" id="rating-4" value="4">
                                                    <label class="starr star-4" for="rating-4"></label>
                                                    <input type="radio" name="vote_star" id="rating-3" value="3">
                                                    <label class="starr star-3" for="rating-3"></label>
                                                    <input type="radio" name="vote_star" id="rating-2" value="2">
                                                    <label class="starr star-2" for="rating-2"></label>
                                                    <input type="radio" name="vote_star" id="rating-1" value="1">
                                                    <label class="starr star-1" for="rating-1"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="review_comment">Nhận xét của bạn </label>
                                            <input name="comment_content" id="review_comment">
                                        </div> 
                                    </div>
                                    <button type="submit">Nhận xét</button>
                                </form> 
                                @endif
                                <br>
                                <div class="block_title" style>
                                    <h3>Nhận xét</h3>
                                </div>
                                @foreach($comment_product as $key => $comment) 
                                <div class="col-12" stlye="padding-top:10px;">
                                    @if($comment->avatar == 'avatardefault21658465198465131235661.jpg')
                                        <img alt="" src="{{asset('public/back-end/images/avatardefault21658465198465131235661.jpg')}}" width=25 height=25 style="border-radius:50%;">  
                                    @else
                                        <img alt="" src="{{asset('public/uploads/avatar/'. $comment->avatar)}}" width=25 height=25 style="border-radius:50%;">
                                    @endif
                                    <label for="review_comment">{{$comment->customer_name}}
                                        <?php for($x = 1; $x <= 5; $x++){
                                            if($x <= $comment->vote_star){
                                    ?>
                                                <span style="color:#00BBA6"><i class="fa fa-star"></i></span>
                                    <?php
                                            }else{    
                                    ?>
                                                <span><i class="fa fa-star"></i></span>
                                    <?php       }
                                        }
                                    ?>
                                    </label>
                                    <div style="padding-left: 2rem;">{{$comment->comment_content}}</div>
                                </div>  
                                @endforeach
                            </div>     
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    </div>  
    @endforeach    
        <!--product info end-->
       <!--Related Products area start-->  
       <div class="new_product_area">
            <div class="block_title">
                <h3>Sản phẩm tương tự</h3>
            </div>
            <div class="row">
                <div class="product_active owl-carousel">
                    @foreach($related_product as $rela_product)
                    <div class="col-lg-3">
                        <div class="single_product">
                            <div class="product_thumb">
                            <a href="{{URL::to('chi-tiet-san-pham/'.$rela_product->product_id)}}"><img src="{{URL::to('public/uploads/product/'.$rela_product->product_image)}}" alt=""></a> 
                            <div class="img_icone">
                                <img src="{{('public\front-end\assets\img\cart\span-new.png')}}" alt="">
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
                    @endforeach
                </div> 
            </div>       
        </div> 
                @foreach($related_product as $rela_product)
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
                 
                @endforeach
            </div>       
        </div> 
        <!--Related Products area end-->  
    
</div>
@endsection
<!--product details end-->