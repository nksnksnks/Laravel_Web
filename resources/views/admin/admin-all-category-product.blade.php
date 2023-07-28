@extends('admin_welcome')
@section('admin_content')
<?php
    $message = Session() -> get('message');
?>
		<div class="table-agile-info">
  <div class="panel panel-default">
    <?php
        if($message){
    ?>  <div style="color:red;"><?php echo $message?></div>
        <?php
        $message = Session() -> put('message', null);
        }
    ?>
    <div class="panel-heading">
      Danh sách danh mục
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm</th>
            <th>Hiển thị</th>
            <th>Sửa/Xóa</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_category_product as $key => $cate_pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td style="font-size:18px;">{{( $cate_pro->category_name)}}ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ</td>
            <td><span class="text-ellipsis">
            <?php
            if($cate_pro->category_status == 1){
                ?>
                <a href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}" style="color:green; font-size:18px;"><span class="fa fa-thumbs-up"></span>Hiện</a>
            <?php
            }else{
            ?>
                <a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}" style="color:red; font-size:18px;"><span class="fa fa-thumbs-down"></span>Ẩn</a>
            <?php
            }
            ?>
            ㅤㅤㅤㅤㅤㅤㅤㅤ</span></td>
            <td>
              <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" class="active" ui-toggle-class="" style="font-size:18px;"><i class="fa fa-check text-success text-active"></i> Sửa </a>
                |
                <a href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" class="active" ui-toggle-class="" style="font-size:18px;"
                  onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')">Xóa <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection