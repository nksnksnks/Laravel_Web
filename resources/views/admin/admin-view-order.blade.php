@extends('admin_welcome')
@section('admin_content')
<style>
  .confirm{
    border:1px solid #8b5c7e; padding: 10px 30px 10px 30px;margin: 20px;border-radius:10px; text-align:right;margin-left: 70%;color:#8b5c7e;
  }
  .confirm2{
    border:1px solid #8b5c7e; 
    padding: 10px 30px 10px 30px;
    margin: 20px;border-radius:10px; text-align:right;
    color:#8b5c7e;
  }
  .confirm:hover{
    border-color:#337ab7; 
    border-radius:10px;
    background-color: #337ab7; 
    color:#ffffff;
  }
  .confirm2:hover{
    border-color:#337ab7; 
    border-radius:10px;
    background-color: #337ab7; 
    color:#ffffff;
  }
</style>
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
      Thông tin người đặt
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên người đặt</th>
            <th>username</th>
            <th>Số điện thoại</th>
            <th>E-mail</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <?php
        $order_status = 9;
        ?>
        <tbody>
            @foreach ($order_by_id as $key => $order)
                <tr>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->customer_username }}</td>
                    <td>{{ $order->customer_phonenumber }}</td>
                    <td>{{ $order->customer_email }}</td>
                </tr>
                <?php
                $order_status = $order->order_status;
                ?>
            @endforeach
        </tbody>
      </table> 
    </div>
  </div>
</div>
<br>
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông tin vận chuyển
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            </tr>
              <th>Họ tên</th>
              <th>email</th>
              <th>số điện thoại</th>
              <th>Địa chỉ</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
            @foreach ($order_by_id as $key => $order)
                <tr>
                    <td>{{ $order->shipping_name }}</td>
                    <td>{{ $order->shipping_email }}</td>
                    <td>{{ $order->shipping_phone }}</td>
                    <td>{{ $order->shipping_address }}</td>
                </tr>
            @endforeach
            </tr>
          </tbody>
        </table> 
      </div>
    </div>
  </div>
  <br>
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
        Chi tiết đơn hàng
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>IdSP</th>
              <th>Tên sản phẩm</th>
              <th>Size</th>
              <th>Màu sắc</th>
              <th>Số lượng</th>
              <th>Giá</th>
              <th>Tổng tiền</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
                @foreach ($order_by_id_2 as $key => $order)
                <tr> 
                    <td>{{ $order->product_id }}</td>
                    <td>{{ $order->product_name }}</td>
                    <td>{{ $order->product_size }}</td>
                    <td>{{ $order->color_name }}</td>
                    <td>{{ $order->product_quantity }}</td>
                    <td>{{ number_format($order->product_price) }} VNĐ</td>
                    <?php $total = $order->product_quantity * $order->product_price ?>
                    <td>{{ number_format($total) }} VNĐ </td>
                </tr>
            @endforeach
            </tr>
          </tbody>
        </table> 
      </div>
    </div>
    @if($order_status == 0)
      <div style="right:0;">
        <a class="confirm" href="{{URL::to('/confirm-order/'.$order->order_id)}}"
          onclick="return confirm('Bạn có chắc muốn xác nhận đơn hàng này không?')" >
          Xác nhận đơn hàng</a>
        <a class="confirm2" href="{{URL::to('/delete-order/'.$order->order_id)}}" class="active" ui-toggle-class="" style="font-size:18px;"
          onclick="return confirm('Bạn có chắc muốn hủy đơn hàng này không?')">Hủy đơn hàng</a>
      </div>
    @elseif($order_status == 1)
      <div style="right:0;">
        <a class="confirm" href="{{URL::to('/complated-order/'.$order->order_id)}}"
          onclick="return confirm('Bạn có chắc đã hoàn tất đơn hàng này không?')" >
          Xác nhận đã giao hàng</a>
    @endif
    
  </div>
@endsection