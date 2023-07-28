<?php
use Illuminate\Database\MySql\Connection;
?>
@extends('admin_welcome')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Sửa danh mục sản phẩm
        </header>
        <div class="panel-body">
            <div class="position-center">
                @foreach($edit_category_product as $key => $edit_value)
                <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên danh mục</label>
                        <input type="text" class="form-control" name="category_product_name" 
                        id="exampleInputEmail1" placeholder="Tên danh mục" value="{{$edit_value->category_name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả danh mục</label>
                        <textarea style="resize:none;" rows="5" type="text" class="form-control" id="exampleInputPassword1" placeholder="Mô tả" 
                        name="category_product_desc">{{$edit_value->category_desc}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Cập nhật danh mục</button>
                </form>
                @endforeach
            </div>

        </div>
    </section>

</div>
@endsection