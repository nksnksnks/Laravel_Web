@extends('admin_welcome')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Thêm sản phẩm
        </header>
        <div class="panel-body">
            <div class="position-center">
                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" 
                        placeholder="Tên sản phẩm" required
                        data-validation="length" data-validation-length="max55"
                        data-validation-error-msg="Điền nhiều nhất 55 ký tự">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                        <select class="form-control input-lg m-bot15" name="cate">
                            @foreach($cate_product as $key => $cate)
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                        <select class="form-control input-lg m-bot15" name="brand">
                            @foreach($brand_product as $key => $brand)
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Đối tượng khách hàng</label>
                        <select class="form-control input-lg m-bot15" name="sex_id">
                            <option value="0">Nữ</option>
                            <option value="1">Nam</option>
                            <option value="2">Cả nam và nữ</option>
                        </select>
                    </div>
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
                        <textarea style="resize:none;" rows="5" type="text" class="form-control" id="ckeditor1" placeholder="Mô tả" 
                        name="product_desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tóm tắt sản phẩm</label>
                        <textarea style="resize:none;" rows="5" type="text" class="form-control" id="ckeditor" placeholder="Tóm tắt" 
                        name="product_content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá sản phẩm</label>
                        <input type="text" class="form-control" name="product_price" id="exampleInputEmail1" placeholder="Giá sản phẩm" required
                        data-validation="number" data-validation-error-msg="Vui lòng chỉ điền chữ số">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giảm giá(%)</label>
                        <input type="number" class="form-control" name="product_sale" id="exampleInputEmail1" placeholder="Giá sản phẩm" required
                        data-validation="number" data-validation-error-msg="Vui lòng chỉ điền chữ số"  min="0" max="100" step="5">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                        <input type="file" class="form-control" name="product_image" id="exampleInputEmail1" placeholder="Hình ảnh"
                        accept=".png, .jpg, .jpeg" onchange="validateFile(this)">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình ảnh giới thiệu sản phẩm</label>
                        <input type="file" class="form-control" name="product_image_desc[]" id="exampleInputEmail1" placeholder="Hình ảnh"
                        accept=".png, .jpg, .jpeg" onchange="validateFile(this)" multiple>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Hiển thị</label>
                        <select class="form-control input-lg m-bot15" name="product_status">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiện</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Thêm sản phẩm</button>
                </form>
            </div>

        </div>
    </section>
    <script>
        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor1');
    </script>
    <script>
        $.validate({
        });
    </script>
</div>
@endsection