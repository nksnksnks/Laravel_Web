@extends('admin_welcome')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Thêm danh mục sản phẩm
        </header>
        <div class="panel-body">
            <div class="position-center">
                <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên danh mục</label>
                        <input type="text" class="form-control" name="category_product_name" id="exampleInputEmail1" placeholder="Tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả danh mục</label>
                        <textarea style="resize:none;" rows="5" type="text" class="form-control" id="exampleInputPassword1" placeholder="Mô tả" 
                        name="category_product_desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Hiển thị</label>
                        <select class="form-control input-lg m-bot15" name="category_product_status">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiện</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Thêm danh mục</button>
                </form>
            </div>

        </div>
    </section>

</div>
@endsection