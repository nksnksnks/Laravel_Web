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
      Danh sách màu sắc
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
            <th>Tên màu sắc</th>
            <th>Mã màu</th>
            <th>Sửa/Xóa</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            ?>
            @foreach($all_color as $key => $color_pro)
          <tr>
            <td><?php echo $i; $i+=1;?></td>
            <td style="font-size:18px;">{{( $color_pro->color_name)}}ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ</td>
            <td>{{( $color_pro->color_code)}} <div style="background-color: {{( $color_pro->color_code)}};width:30px;height:30px;margin-left:15px;"></div>ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ</td>
            <td>
              <a href="{{URL::to('/edit-color/'.$color_pro->color_id)}}" class="active" ui-toggle-class="" style="font-size:18px;"><i class="fa fa-check text-success text-active"></i> Sửa </a>
                |
                <a href="{{URL::to('/delete-color/'.$color_pro->color_id)}}" class="active" ui-toggle-class="" style="font-size:18px;"
                  onclick="return confirm('Bạn có chắc muốn xóa màu này không?')">Xóa <i class="fa fa-times text-danger text"></i></a>
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