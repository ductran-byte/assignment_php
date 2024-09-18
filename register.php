<?php
global $_name_site, $_login;
include_once 'set.php';
$_title = "NSOBOBA" . $_name_site;
include_once 'head.php';
$_alert = null;
if ($_login == null) {
    if (isset($_POST['username'])) {


        $phone = isset_sql($_POST['phone']);
        $username = isset_sql($_POST['username']);
        $password = isset_sql($_POST['password']);
        $repassword = isset_sql($_POST['repassword']);
        $time = time();
        if ($password == $repassword) {
            $txt = _insert('isplayer', "username,password,vnd,luong,status,activated",
                "'$username','$password','0','0','1','1'");
            $read = _select("*", 'isplayer', "username='$username'");
            if (is_array(_fetch($read))) {
                echo '
					<script type="text/javascript">
					
					$(document).ready(function(){
					
					  swal({
							title: "Thất bại",
							text: "Tài khoản này đã tồn tại, vui lòng chọn tài khoản khác!",
							type: "error",
							confirmButtonText: "OK",
					  })
					});
					
					</script>
					';
            } else {
                $kiemtra = _query($txt);
                if ($kiemtra) {
                    echo '
						<script type="text/javascript">
						
						$(document).ready(function(){
						
						  swal({
								title: "Thành công",
								text: "Đăng kí thành công!",
								type: "success",
								confirmButtonText: "OK",
						  })
						});
						
						</script>
						';
                } else {
                    echo '
						<script type="text/javascript">
						
						$(document).ready(function(){
						
						  swal({
								title: "Thất bại",
								text: "Đã có lỗi gì đó xảy ra, đăng kí thất bại!",
								type: "error",
								confirmButtonText: "OK",
						  })
						});
						
						</script>
						';

                }
            }
        } else {
            echo '
				<script type="text/javascript">
				
				$(document).ready(function(){
				
				  swal({
						title: "Thất bại",
						text: "Hai mật khẩu không khớp nhau, vui lòng kiểm tra lại!",
						type: "error",
						confirmButtonText: "OK",
				  })
				});
				
				</script>
				';
        }

    }
} else {
    header('location:/user.php');
}
?>
<main class="flex-grow-1 flex-shrink-1">


    <div class="container pb-5">
        <form class="form-signin" method="POST">
            <input type="hidden" name="_token" value="JEGpj39vMoqzUAPDoHWTY8Y4jJiy4t0mhPST9nds">
            <br>
            <h1 class="h3 mb-3 font-weight-normal text-center">Nhập thông tin đăng ký</h1>
            <?php echo $_alert; ?>
            <div class="form-group">
                <label>Tài khoản</label>
                <input type="text" class="form-control" placeholder="Tài khoản" required="" name="username" value="">
            </div>
            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" class="form-control" placeholder="Số điện thoại" required="" name="phone" value="">
            </div>

            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" class="form-control" placeholder="Mật khẩu" required="" name="password">
            </div>
            <div class="form-group">
                <label>Nhập lại mật khẩu</label>
                <input type="password" class="form-control" placeholder="Mật khẩu" required="" name="repassword">
            </div>


            <button type="submit" class="btn btn-info btn-block">Đăng ký</button>

            <div class="text-center pt-2">
                Bạn đã có tài khoản? <a href="/login">Đăng nhập ngay</a>
            </div>
        </form>
        <style>
            .form-signin {
                width: 100%;
                max-width: 400px;
                padding: 15px;
                margin: 0 auto;
            }

            .form-signin .checkbox {
                font-weight: 400;
            }
        </style>
        <?php
        include_once 'end.php';
        ?>
</main>
