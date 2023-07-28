<?php
use Illuminate\Database\MySql\Connection;
?>
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
      Danh sách đơn hàng
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
            <th>Tên người đặt</th> 
            <th>Tổng giá tiền</th>
            <th>Tình trạng</th>
            <th>Chi tiết/Xóa</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_order as $key => $order)
          <tr>
            <td style="font-size:18px;">{{( $order->customer_name)}}</td>
            <td style="font-size:18px;">{{($order->order_total)}}</td>
            @if($order->order_status == 0)
              <td ><span style="font-size:18px;color: red;border:1px solid red;padding: 5px 13px 5px 13px;border-radius:7px;">Chờ xử lý</span></td>
              <td>
                <a href="{{URL::to('/view-order/'.$order->order_id)}}" class="active" ui-toggle-class="" style="font-size:18px;"><i class="fa fa-check text-success text-active"></i> Chi tiết </a>
                  |
                  <a href="{{URL::to('/delete-order/'.$order->order_id)}}" class="active" ui-toggle-class="" style="font-size:18px;"
                    onclick="return confirm('Bạn có chắc muốn đơn hàng này không?')">Xóa <i class="fa fa-times text-danger text"></i></a>
              </td>
            @elseif($order->order_status == 1)
            <td ><span style="font-size:18px;color: blue;border:1px solid blue;padding: 5px 10px 5px 10px;border-radius:7px;">Đang giao</span></td>
            <td>
              <a href="{{URL::to('/view-order/'.$order->order_id)}}" class="active" ui-toggle-class="" style="font-size:18px;"><i class="fa fa-check text-success text-active"></i> Chi tiết </a>
                |
                <a href="{{URL::to('/complated-order/'.$order->order_id)}}" class="active" ui-toggle-class="" style="font-size:18px;"
                  onclick="return confirm('Bạn có chắc đã hoàn tất đơn hàng này không?')">Hoàn tất <i class="fa fa-check text-success text-active"></i></a>
            </td>
            @elseif($order->order_status == 2)
            <td ><span style="font-size:18px;color: green;border:1px solid green;padding: 5px 20px 5px 20px;border-radius:7px;">Đã giao</span></td>
            <td>
              <a href="{{URL::to('/view-order/'.$order->order_id)}}" class="active" ui-toggle-class="" style="font-size:18px;"><i class="fa fa-check text-success text-active"></i> Chi tiết </a>
                |
                <a href="{{URL::to('/delete-order/'.$order->order_id)}}" class="active" ui-toggle-class="" style="font-size:18px;"
                  onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này không?')">Xóa <i class="fa fa-check text-danger text-active"></i></a>
            </td>
            @else
            <td ><span style="font-size:18px;color: rgb(135, 135, 135);border:1px solid rgb(134, 134, 134);padding: 5px 14px 5px 14px;border-radius:7px;">Đã bị hủy</span></td>
            <td>
              <a href="{{URL::to('/view-order/'.$order->order_id)}}" class="active" ui-toggle-class="" style="font-size:18px;"><i class="fa fa-check text-success text-active"></i> Chi tiết </a>
                |
                <a href="{{URL::to('/delete-order/'.$order->order_id)}}" class="active" ui-toggle-class="" style="font-size:18px;"
                  onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này không?')">Xóa <i class="fa fa-check text-danger text-active"></i></a>
            </td>
            @endif
            
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