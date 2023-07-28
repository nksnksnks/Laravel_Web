@extends('admin_welcome')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Cập nhật\ sản phẩm
        </header>
        <div class="panel-body">
            <div class="position-center">
                @foreach($edit_product as $key => $product)
                <form role="form" action="{{URL::to('/update-product/'.$product->product_id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" placeholder="Tên sản phẩm"
                        value="{{$product->product_name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                        <select class="form-control input-lg m-bot15" name="cate">
                            @foreach($cate_product as $key => $cate)
                                @if($cate->category_id == $product->category_id)
                                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @else
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                        <select class="form-control input-lg m-bot15" name="brand">
                            @foreach($brand_product as $key => $brand)
                                @if($brand->brand_id == $product->brand_id)
                                    <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @else
                                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <select class="form-control input-lg m-bot15" name="sex_id">
                        <option value="0">Nữ</option>
                        <option value="1">Nam</option>
                        <option value="2">Cả nam và nữ</option>
                    </select>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Loại kích cỡ</label>
                        <select class="form-control input-lg m-bot15" name="product_size">
                            <option value="0">S,M,L...</option>
                            <option value="1">38,...,43</option>
                            <option value="2">35,...,39</option>
                            <option value="3">null</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Màu sắc sản phẩm</label><br>
                            <?php $i = 0; ?>
                            @foreach($color_product as $key => $color)
                                <input type="checkbox" name="color_desc[]" value="{{$color->color_id}}"> {{$color->color_name}} 
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                $i= $i+1;
                                if($i % 3 == 0){
                                ?>
                                <br>
                                <?php
                                }
                                ?>
                            @endforeach
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                        <textarea style="resize:none;" rows="5" type="text" class="form-control" id="exampleInputPassword1" placeholder="Mô tả" 
                        name="product_desc">{{$product->product_desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tóm tắt sản phẩm</label>
                        <textarea style="resize:none;" rows="5" type="text" class="form-control" id="exampleInputPassword1" placeholder="Tóm tắt" 
                        name="product_content">{{$product->product_content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá sản phẩm</label>
                        <input type="number" class="form-control" name="product_price" id="exampleInputEmail1" placeholder="Giá sản phẩm"
                        value="{{$product->product_price}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                        <input type="file" class="form-control" name="product_image" id="exampleInputEmail1" placeholder="Hình ảnh"
                        accept=".png, .jpg, .jpeg" onchange="validateFile(this)">
                        <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" width='100' height='100'>
                    </div>
                    <button type="submit" class="btn btn-info">Cập nhật sản phẩm</button>
                </form>
                @endforeach
            </div>

        </div>
    </section>

</div>
@endsection