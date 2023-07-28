@extends('welcome_2')
@section('content2')
<title>Tài khoản của tôi</title>
<!-- Start Maincontent  -->
<style>
    .btn_my_account{
        background: none;
        border: 1px solid #00bba6;
        margin-left: 10px;
        font-size: 12px;
        font-weight: 700;
        height: 38px;
        line-height: 18px;
        padding: 10px 15px;
        text-transform: uppercase;
        background: #00bba6;
        color: #fff;
        border-radius: 5px;
        -webkit-transition: .3s;
        transition: .3s;
        cursor: pointer;
    }
    .btn_my_account:hover{
        background: #e84c3d;
        border-color: #e84c3d;
    }
    #preview-container {
    width: 300px;
    height: 300px;
    border: 2px solid #ccc;
    overflow: hidden;
    }

    #preview-wrapper {
    width: 100%;
    height: 100%;
    overflow: hidden;
    }

    #preview-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    }

    </style>
<section class="main_content_area">
    <div class="account_dashboard">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3">
                <!-- Nav tabs -->
                <div class="dashboard_tab_button">
                    <ul role="tablist" class="nav flex-column dashboard-list">
                        <li> <a href="#orders" data-toggle="tab" class="nav-link">Đơn hàng</a></li>
                        <li><a href="#account-details" data-toggle="tab" class="nav-link">Thông tin cá nhân</a></li>
                        <li><a href="#change_password" data-toggle="tab" class="nav-link">Đổi mật khẩu</a></li>
                        <li><a href="#change_avatar" data-toggle="tab" class="nav-link">Đổi ảnh đại diện</a></li>
                        <li><a href="{{URL::to('/login')}}" class="nav-link">Đăng xuất</a></li>
                    </ul>
                    <br>
                </div>    
            </div>
            
            <div class="col-sm-12 col-md-9 col-lg-9">
                <!-- Tab panes -->
                <div class="tab-content dashboard_content">
                    <div class="tab-pane fade show active" id="dashboard">
                        <?php
                        $message = Session()->get('message');
                        ?>
                        <h5 style="color:red;font-family:arial;">{{$message}}</h5>
                        <?php
                        Session()->put('message', null);
                        ?>
                    </div>
                    <div class="tab-pane fade" id="orders">
                        <h3 style="family-font:arial;">Thông tin đơn hàng</h3>
                        <div class="coron_table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Stt</th>
                                        {{-- <th>Ngày đặt</th> --}}
                                        <th>Trạng thái</th>
                                        <th>Tổng tiền</th>
                                        <th>Xem/Xóa</th> 	 	 	
                                    </tr>
                                </thead>
                                <?php $i=1;?>
                                @foreach($order_id as $key => $order)
                                    @if($order->order_status != 3)
                                <tbody>
                                    <tr>
                                        <td>{{$i}}</td><?php $i+=1;?>
                                        {{-- <td>May 10, 2018</td> --}}
                                        @if($order->order_status == 0)
                                        <td ><span style="font-size:18px;color: red;border:1px solid red;padding: 5px 10px 5px 10px;border-radius:7px;">Chờ xử lý</span></td>
                                        
                                        @elseif($order->order_status == 1)
                                        <td ><span style="font-size:18px;color: blue;border:1px solid blue;padding: 5px 10px 5px 10px;border-radius:7px;">Đang giao</span></td>

                                        @elseif($order->order_status == 2)
                                        <td ><span style="font-size:18px;color: green;border:1px solid green;padding: 5px 10px 5px 10px;border-radius:7px;">Đã giao</span></td>
                                        @endif
                                        <td>{{$order->order_total}} </td>
                                        <td><a href="#" data-toggle="modal" data-id="{{$order->order_id}}" 
                                            data-target="#modal_box_home_{{$order->order_id}}" title="Quick view" style="color:green">Xem</a>
                                            |<a href="{{URL::to('/cancel-order/'.$order->order_id)}}" 
                                                onclick="return confirm('Bạn có chắc muốn hủy đơn hàng này không?')">Hủy</a>
                                    </tr>
                                </tbody>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                        
                        @foreach($order_id as $key => $order)
                            <?php
                                $order_id_2 = DB::table('tbl_order_details')
                                ->select('tbl_order_details.*')
                                ->where('tbl_order_details.order_id', $order->order_id)
                                ->get();
                            ?>
                            <div class="modal fade" id="modal_box_home_{{$order->order_id}}" tabindex="-1" role="dialog" aria-hidden="true" data-id="{{$order->order_id}}">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Stt</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Size</th>
                                                    <th>Màu sắc</th>
                                                    <th>Số lượng</th>
                                                    <th>Giá</th>
                                                    <th>Tổng</th>	 	 	 	
                                                </tr>
                                            </thead>
                                            <?php
                                                $x=1;?>
                                            @foreach($order_id_2 as $key => $order2) 
                                            <tbody>
                                                <tr>
                                                    <td>{{$x}}</td>
                                                    <td>{{$order2->product_name}}</td>
                                                    <td>{{$order2->product_size}}</td>
                                                    <td>{{$order2->color_name}}</td>
                                                    <td>{{$order2->product_quantity}}</td>
                                                    <td>{{number_format($order2->product_price)}}</td>
                                                    <td>{{number_format(($order2->product_price)*($order2->product_quantity))}}</td>
                                                    <td><a href="{{URL::to('chi-tiet-san-pham/'.$order2->product_id)}}" class="view">Xem sản phẩm</a></td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                            <?php $x+=1;?>
                                        </table> 
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="account-details">
                        <h3 style="family-font:arial;">Thông tin tài khoản </h3>
                        <?php
                        $id = Session('customer_id');
                        $name = Session('customer_name');
                        $username = Session('customer_username');
                        $email = Session('customer_email');
                        $phonenumber = Session('customer_phonenumber');
                        $address = Session('customer_address');
                        ?>
                        <form action="{{URL::to('/luu-thong-tin')}}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$id}}" name="customer_id">
                            <label>Họ tên</label>
                            <input type="text" name="new_customer_name" value="{{$name}}" required>
                            <label>Tên đăng nhập</label>
                            <input type="text" name="new_customer_username" value="{{$username}}" disabled>
                            <label>Địa chỉ</label>
                            <input type="text" name="new_customer_address" value="{{$address}}" required>
                            <label>E-mail</label>
                            <input type="text" name="new_customer_email" value="{{$email}}" required>
                            <label>Số điện thoại</label>
                            <input type="text" name="new_customer_phonenumber" value="{{$phonenumber}}" required>
                            <br>
                            <br>
                            <div class="save_button primary_btn default_button">
                                <button class="btn_my_account" type="submit">
                                    Lưu thông tin</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="change_password">
                        <form action="{{URL::to('/doi-mat-khau')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$id}}" name="customer_id">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" value="" required>
                            <label>Mật khẩu mới</label>
                            <input type="password" name="new_password" value="" required>
                            <label>Nhập lại mật khẩu mới</label>
                            <input type="password" name="new_password2" value="" required>
                            <br>
                            <br>
                            <div class="save_button primary_btn default_button">
                                <button class="btn_my_account" type="submit">
                                    Lưu thông tin</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="change_avatar">
                        <form id="avatar-form" action="{{URL::to('/save-avatar')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="file" id="upload-input" accept="image/*" required>
                            <!-- Ẩn trường input để lưu dữ liệu ảnh cắt -->
                            <input type="hidden" name="cropped_image" id="cropped-image-input" required>
                            <br>
                            <button class="btn_my_account" type="submit" class="btn_my_account" disabled id="crop-button" style="margin: 15px 0 15px 0; font-family: Arial;">Lưu ảnh đại diện</button>
                            <br>
                            <div id="preview-container">
                                <div id="preview-wrapper">
                                    <img id="preview-image">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>      	
</section>	
<!-- Đoạn mã JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.js"></script>
<script>
    const uploadInput = document.getElementById('upload-input');
    const cropButton = document.getElementById('crop-button');
    const previewImage = document.getElementById('preview-image');
    let cropper;

    function initializeCropper(imageUrl) {
        if (cropper) {
            // Nếu đã có khung cắt trước đó, hủy bỏ nó trước khi khởi tạo lại
            cropper.destroy();
        }

        // Khởi tạo Cropper.js sau khi hình ảnh đã tải lên
        cropper = new Cropper(previewImage, {
            aspectRatio: 1, // Tỷ lệ cắt ảnh (1:1 cho hình vuông)
            viewMode: 1, // Chế độ xem (0: tự do, 1: thu nhỏ, 2: thu nhỏ chính xác, 3: cố định)
            dragMode: 'move', // Chế độ kéo thả (move: di chuyển, crop: cắt)
            autoCropArea: 0.8, // Diện tích mặc định của vùng cắt ảnh
        });

        // Cập nhật ảnh mới vào khung cắt
        cropper.replace(imageUrl);
    }

    uploadInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            const imageUrl = reader.result;
            previewImage.src = imageUrl;

            // Gọi hàm khởi tạo Cropper.js với ảnh mới đã chọn
            initializeCropper(imageUrl);

            // Bật nút "Lưu ảnh đại diện" sau khi đã tải lên ảnh
            cropButton.disabled = false;
        };

        reader.readAsDataURL(file);
    });

    cropButton.addEventListener('click', function() {
    if (!cropper) return;

    // Lấy kết quả sau khi cắt ảnh
    const croppedImageData = cropper.getCroppedCanvas().toDataURL('image/jpeg');

    // Đặt giá trị của dữ liệu ảnh cắt vào trường input ẩn trong form
    const croppedImageInput = document.getElementById('cropped-image-input');
    croppedImageInput.value = croppedImageData;

    // Submit form để gửi dữ liệu ảnh đến máy chủ
    const avatarForm = document.getElementById('avatar-form');
    avatarForm.submit();
});
</script>
 @endsection