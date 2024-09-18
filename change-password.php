<?php
include_once 'head.php';
$_alert = null;
if ($_login == null) {
    header("location:/");
}
if (isset($_POST['password'])) {
    $old_pass = isset_sql($_POST['password']);
    $new_pass = isset_sql($_POST['new_password']);
    $re_pass = isset_sql($_POST['new_password_confirmation']);
    if ($old_pass != $_password) {
        echo '<script>
		document.addEventListener("DOMContentLoaded", function() {
			var modal = document.getElementById("doiluongThatBai");
			var modalContent = document.getElementById("doiluongThatBaiContent");
			modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #ff0000;\">Mật khẩu hiện tại không đúng</span>";
			modal.style.display = "block";
		});
	</script>';
    } else {
        if ($new_pass != $re_pass) {
            echo '<script>
			document.addEventListener("DOMContentLoaded", function() {
				var modal = document.getElementById("doiluongThatBai");
				var modalContent = document.getElementById("doiluongThatBaiContent");
				modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #ff0000;\">Mật khẩu mới không trùng nhau</span>";
				modal.style.display = "block";
			});
		</script>';
        } else {
            $query = _query(_update('isplayer', "password='$new_pass'", "username='$_username'"));
            if ($query) {
                echo '<script>
				document.addEventListener("DOMContentLoaded", function() {
					var modal = document.getElementById("doiluongThanhCong");
					var modalContent = document.getElementById("doiluongThanhCongContent");
					modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #198754;\">Đổi mật khẩu thành công</span>";
					modal.style.display = "block";
				});
			</script>';
            } else {
                echo '<script>
				document.addEventListener("DOMContentLoaded", function() {
					var modal = document.getElementById("doiluongThatBai");
					var modalContent = document.getElementById("doiluongThatBaiContent");
					modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #ff0000;\">Có lỗi gì đó xảy ra, LH ADMIN</span>";
					modal.style.display = "block";
				});
			</script>';
            }
        }
    }
}
?>
<!-- Modal HTML -->
<div id="doiluongThanhCong" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <span class="close" onclick="closeDoiluongThanhcong()">&times;</span>
            <div class="modal-body text-center">
                <a href="/"><img class="logo" alt="Logo" src="/images/logo.png" style="max-width: 250px;"></a>
                <h2>Thành Công</h2>
                <p id="doiluongThanhCongContent"></p>
                <button class="modal-close-btn" onclick="closeDoiluongThanhCong()">OK</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal HTML -->
<div id="doiluongThatBai" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <span class="close" onclick="closeDoiluongThatBai()">&times;</span>
            <div class="modal-body text-center">
                <a href="/"><img class="logo" alt="Logo" src="/images/logo.png" style="max-width: 250px;"></a>
                <h2>Thất Bại</h2>
                <p id="doiluongThatBaiContent"></p>
                <button class="modal-close-btn" onclick="closeDoiluongThatBai()">OK</button>
            </div>
        </div>
    </div>
</div>


<style>


    /* CSS cho modal */
    .modal {
        /* ... */
        transition: opacity 0.3s ease-in-out; /* Thêm transition cho modal */
    }

    .modal.show {
        opacity: 1; /* Hiển thị modal mượt mà */
    }

    /* CSS cho nút OK */
    .modal-close-btn {
        background-color: #007BFF;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 10px;
        transition: background-color 0.3s ease-in-out; /* Thêm transition cho nút OK */
    }

    /* Khi hover vào nút đóng */
    .modal-close-btn:hover {
        background-color: #0056b3;
    }
</style>


<script>

    function openDoiluongThatBai() {
        var doiluongThatBai = document.getElementById('doiluongThatBai');
        doiluongThatBai.style.display = 'block';
    }

    function closeDoiluongThatBai() {
        var doiluongThatBai = document.getElementById('doiluongThatBai');
        doiluongThatBai.style.display = 'none';
    }


    function openDoiluongThanhCong() {
        var doiluongThanhCong = document.getElementById('doiluongThanhCong');
        doiluongThanhcong.style.display = 'block';
    }

    function closeDoiluongThanhCong() {
        var doiluongThanhCong = document.getElementById('doiluongThanhCong');
        doiluongThanhCong.style.display = 'none';
    }

</script>
<!--
<main class="flex-grow-1 flex-shrink-1">
</br>
	<div class="container pb-5">

	<div class="col-md-12">
            <h3 class="mt-0 mb-20">Thay đổi mật khẩu</h3>
            <form method="POST">
                <div class="mb-3">
				<label class="font-weight-bold">Mật khẩu hiện tại</label>
						<input type="text" class="form-control " name="password" id="password" placeholder="Mật khẩu hiện tại" required>
                </div>

                <div class="mb-3">
				<label class="font-weight-bold">Mật khẩu mới</label>
                    <input type="text" class="form-control " name="new_password" id="new_password" placeholder="Mật khẩu mới" required>
                </div>

                <div class="mb-3">
				<label class="font-weight-bold">Nhập lại mật khẩu</label>
                    <input type="text" class="form-control " name="new_password_confirmation" id="new_password_confirmation" placeholder="Xác nhận mật khẩu mới" required>
                </div>
                <button class="btn btn-info btn-block" type="submit">Thực hiện</button>
            </form>
        </div>

-->


<div class="card" style="">
    <div class="card-body">
        <div class="mb-3">
            <div class="row text-center justify-content-center row-cols-3 row-cols-lg-6 g-1 g-lg-1">
                <div class="col">
                    <a class="btn btn-sm btn-success w-100 fw-semibold active" href="/user"
                       style="background-color: rgb(101, 173, 109);">Tài khoản</a>
                </div>
                <div class="col">
                    <a class="btn btn-sm btn-success w-100 fw-semibold false" href="/lich-su"
                       style="background-color: rgb(101, 173, 109);">Lịch sử GD</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="w-100 d-flex justify-content-center">
            <form method="POST" class="pb-3" style="width: 26rem;">
                <div class="fs-5 fw-bold text-center mb-3">Đổi mật khẩu</div>
                <div class="mb-2">
                    <?php echo $_alert; ?>
                    <div class="input-group">
                        <input name="password" type="text" autocomplete="off" placeholder="Nhập mật khẩu hiện tại"
                               class="form-control form-control-solid" value="">
                    </div>
                </div>
                <div class="mb-2">
                    <div class="input-group">
                        <input name="new_password" type="password" autocomplete="off" placeholder="Mật khẩu"
                               class="form-control form-control-solid" value="" oninput="validatePassword(this)">
                    </div>
                </div>
                <div class="mb-2">
                    <div class="input-group">
                        <input name="new_password_confirmation" type="password" autocomplete="off"
                               placeholder="Nhập lại mật khẩu" class="form-control form-control-solid" value=""
                               oninput="validatePassword(this)">
                    </div>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="me-3 btn btn-success" id="btn">Đổi mật khẩu</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function validatePassword(input) {
        // Sử dụng biểu thức chính quy để kiểm tra mật khẩu
        var pattern = /^[a-z0-9]{4,}$/;
        var isValid = pattern.test(input.value);

        if (!isValid) {
            input.setCustomValidity("Mật khẩu không hợp lệ. Mật khẩu chỉ được chứa ký tự chữ thường và số, ít nhất 4 ký tự và không có khoảng trắng.");
        } else {
            input.setCustomValidity("");
        }
    }
</script>


<?php
include_once 'end.php';
?>
</div>

</main>
