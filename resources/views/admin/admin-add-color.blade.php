@extends('admin_welcome')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Thêm màu sắc sản phẩm
        </header>
        <div class="panel-body">
            <div class="position-center">
                <form role="form" action="{{URL::to('/save-color')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên màu sắc</label>
                        <input type="text" class="form-control" name="color_name" id="exampleInputEmail1" placeholder="Tên danh mục" value="Màu ">
                        <br>
                        <input type="color" class="form-control" name="color_code">
                    </div>
                    <button type="submit" class="btn btn-info">Thêm màu sắc</button>
                </form>
            </div>

        </div>
    </section>

</div>
@endsection