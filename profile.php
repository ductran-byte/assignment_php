<?php

include_once 'head.php';
//include_once 'set.php';
if($_login == null) {header("location:/user");}
$_active = isset($_active) ? $_active : null;

$read_sql = _fetch(_select("*", 'isplayer', "username='$_username'"));
$_coin = $read_sql['coin'];
$phone = $read_sql['phone'];
$ngaythamgia = $read_sql['ngaythamgia'];
//$_type_account_name; = $read_sql['nhomkhachhang'];
//$_type_account = htmlspecialchars($user_arr['nhomkhachhang']);
?>
<!--<main class="flex-grow-1 flex-shrink-1">
</br>
	<div class="container pb-5">-->
		

        

<div class="card" style="">
<div class="card-body">
    <div class="mb-3">
        <div class="row text-center justify-content-center row-cols-3 row-cols-lg-6 g-1 g-lg-1">
            <div class="col">
                <a class="btn btn-sm btn-success w-100 fw-semibold active" href="/user" style="background-color: rgb(101, 173, 109);">Tài khoản</a>
            </div>
            <?php
            if(is_admin()) {
                echo '<div class="col">
                        <a class="btn btn-sm btn-success w-100 fw-semibold false" href="/admin" style="background-color: rgb(101, 173, 109);">Panel Admin</a>
                    </div>';
            } else {
                echo '<div class="col">
                    <a class="btn btn-sm btn-success w-100 fw-semibold false" href="/lich-su" style="background-color: rgb(101, 173, 109);">Lịch sử GD</a>
                </div>';
            }
            ?>
        </div>
    </div>
    <hr>
    <table class="table">
        <tbody>
            <tr class="fw-semibold">
                <td>Tài khoản</td>
                <td><?php echo $_username; ?></td>
            </tr>
            <tr class="fw-semibold">
                <td>Mật khẩu</td>
                <td>*** (<a href="change-password">Đổi mật khẩu</a>)</td>
            </tr>
            <tr class="fw-semibold">
                <td>Coin Hiện Có</td>
                <td><a style="color:#FF1493;"><?php echo $_coin; ?> Coin</a></td>
            </tr>
            <tr class="fw-semibold">
                <td>Số điện thoại</td>
                <td><?php $phone = $read_sql['phone']; echo $phone ?> (<a class="cursor-pointer text-primary">Thay đổi</a>)
            </td>
        </tr>
        <tr class="fw-semibold">
            <td>Link giới thiệu</td>
            <td>
                <span class="cursor-pointer text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy">Click để copy</span>
            </td>
        </tr>
        <tr class="fw-semibold">
            <td>Nhóm thành viên</td>
            <td style="color: rgb(0, 0, 0);"><span style="color:black;font-weight: bold;"><?php echo $_type_account_name; ?></td>
        </tr>
        <tr class="fw-semibold">
            <td>Trạng thái</td>
            <td class="text-success fw-bold"><?php echo $_lock; ?></td>
        </tr>
        <tr class="fw-semibold">
            <td>Ngày tham gia</td>
            <td><?php echo $ngaythamgia ?></td>
        </tr>
    </tbody>
</table>
</div>
</div>

<div class="text-center my-2"><div class="age-rule">
    <img src="images/12.png" alt="Age Rule" height="12">
    <span>Trò chơi dành cho người chơi 12 tuổi trở lên. Chơi quá 180 phút mỗi ngày sẽ có hại cho sức khỏe</span>
</div>
</div>
</div>
</div>
</div>
<script src="static/js/jquery.min.js"></script>
   <script src="static/js/popper.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
</body>
</html>
<!--</main>-->
