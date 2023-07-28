<?php
use Illuminate\Database\MySql\Connection;
?>
@extends('admin_welcome')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Sửa thương hiệu sản phẩm
        </header>
        <div class="panel-body">
            <div class="position-center">
                {{-- @foreach($edit_brand_product as $key => $edit_value)
                <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên thương hiệu</label>
                        <input type="text" class="form-control" name="brand_product_name" 
                        id="exampleInputEmail1" placeholder="Tên thương hiệu" value="{{$edit_value->brand_name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                        <textarea style="resize:none;" rows="5" type="text" class="form-control" id="exampleInputPassword1" placeholder="Mô tả" 
                        name="brand_product_desc">{{$edit_value->brand_desc}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Cập nhật thương hiệu</button>
                </form>
                @endforeach --}}
                <form role="form" action="{{URL::to('/update-brand-product/'.$brand_product->brand_id)}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên thương hiệu</label>
                        <input type="text" class="form-control" name="brand_product_name" 
                        id="exampleInputEmail1" placeholder="Tên thương hiệu" value="{{$brand_product->brand_name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                        <textarea style="resize:none;" rows="5" type="text" class="form-control" id="exampleInputPassword1" placeholder="Mô tả" 
                        name="brand_product_desc">{{$brand_product->brand_desc}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Cập nhật thương hiệu</button>
                </form>
            </div>

        </div>
    </section>

</div>
@endsection