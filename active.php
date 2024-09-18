<?php

include_once 'head.php';

$read_sql = _fetch(_select("*", 'isplayer', "username='$_username'"));
$_coin = $read_sql['coin'];
if($_login == null) {header("location:/");}
if($_lock == 'active') {
	$_active = _alert('succ',"Tài Khoản Của Bạn Đã Được Kích Hoạt");
}
elseif($_lock == 'wait' && $_coin < 10000)
{
	echo '<script>
	document.addEventListener("DOMContentLoaded", function() {
		var modal = document.getElementById("activeThatBai");
		var modalContent = document.getElementById("activeThatBaiContent");
		modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #ff0000;\">Số dư không đủ để kích hoạt, Vui lòng nạp thêm lúa!</span>";
		modal.style.display = "block";
	});
</script>';
}
elseif($_lock == 'block' && $_coin < 10000)
{
	echo '<script>
	document.addEventListener("DOMContentLoaded", function() {
		var modal = document.getElementById("activeThatBai");
		var modalContent = document.getElementById("activeThatBaiContent");
		modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #ff0000;\">Số dư không đủ để mở khóa, Vui lòng nạp thêm lúa!</span>";
		modal.style.display = "block";
	});
</script>';
}
elseif($_lock == 'wait' && $_coin >= 10000) {
	$coin = $_coin - 10000;
	$query = _query(_update('isplayer',"status='active',coin='$coin'","username='$_username'"));
	if($query)
	{
		echo '<script>
		document.addEventListener("DOMContentLoaded", function() {
			var modal = document.getElementById("activeThanhCong");
			var modalContent = document.getElementById("activeThanhCongContent");
			modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #198754;\">Kích hoạt tài khoản thành công. Chúc bạn chơi game vui vẻ</span>";
			modal.style.display = "block";
		});
	</script>';
	}
	else
	{
		echo '<script>
		document.addEventListener("DOMContentLoaded", function() {
			var modal = document.getElementById("activeThatBai");
			var modalContent = document.getElementById("activeThatBaiContent");
			modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #ff0000;\">Có lỗi gì đó xảy ra. Liên Hệ Admin ngay để nhận đền bù</span>";
			modal.style.display = "block";
		});
	</script>';
	}
}
elseif($_lock == 'block' && $_coin >= 10000) {
	$coin = $_coin - 10000;
	$query = _query(_update('isplayer',"status='active',coin='$coin'","username='$_username'"));
	if($query)
	{
		echo '<script>
		document.addEventListener("DOMContentLoaded", function() {
			var modal = document.getElementById("activeThanhCong");
			var modalContent = document.getElementById("activeThanhCongContent");
			modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #198754;\">Tài khoản của bạn đã được mở khóa</span>";
			modal.style.display = "block";
		});
	</script>';
	}
	else
	{
		echo '<script>
		document.addEventListener("DOMContentLoaded", function() {
			var modal = document.getElementById("activeThatBai");
			var modalContent = document.getElementById("activeThatBaiContent");
			modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #ff0000;\">Có lỗi gì đó xảy ra. Vui lòng liên hệ Admin để nhận đền bù</span>";
			modal.style.display = "block";
		});
	</script>';
	}
}
/*
if($_login == null) {header("location:/");}
if($_lock == 'active') {
	echo '<script>
	document.addEventListener("DOMContentLoaded", function() {
		var modal = document.getElementById("activeThatBai");
		var modalContent = document.getElementById("activeThatBaiContent");
		modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #2289f8;\">Tài khoản của bạn đã được kích hoạt trước đó rồi</span>";
		modal.style.display = "block";
	});
</script>';
}
elseif($_lock == 'wait' && $_coin < 10000)
{
	echo '<script>
	document.addEventListener("DOMContentLoaded", function() {
		var modal = document.getElementById("activeThatBai");
		var modalContent = document.getElementById("activeThatBaiContent");
		modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #ff0000;\">Số dư không đủ để kích hoạt, Vui lòng nạp thêm lúa!</span>";
		modal.style.display = "block";
	});
</script>';
}
elseif($_lock == 'block' && $_coin < 10000)
{
	echo '<script>
	document.addEventListener("DOMContentLoaded", function() {
		var modal = document.getElementById("activeThatBai");
		var modalContent = document.getElementById("activeThatBaiContent");
		modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #ff0000;\">Số dư không đủ để mở khóa, Vui lòng nạp thêm lúa!</span>";
		modal.style.display = "block";
	});
</script>';
}
elseif($_lock == 'active' && $_coin >= 10000) {
	$coin = $_coin - 10000;
	//$coin_old = $_coin_old - 10000;
	$query = _query(_update('isplayer',"status='active',coin='$coin'","username='$_username'"));
	if($query)
	{
		echo '<script>
		document.addEventListener("DOMContentLoaded", function() {
			var modal = document.getElementById("activeThanhCong");
			var modalContent = document.getElementById("activeThanhCongContent");
			modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #198754;\">Kích hoạt tài khoản thành công. Bây giờ bạn đã có thể đăng nhập vào game</span>";
			modal.style.display = "block";
		});
	</script>';
	}
	else
	{
		echo '<script>
		document.addEventListener("DOMContentLoaded", function() {
			var modal = document.getElementById("activeThatBai");
			var modalContent = document.getElementById("activeThatBaiContent");
			modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #ff0000;\">Có lỗi gì đó xảy ra. Liên Hệ Admin ngay</span>";
			modal.style.display = "block";
		});
	</script>';
	}
}
elseif($_lock == 'active' && $_coin >= 10000) {
	$coin = $_coin - 10000;
//	$coin_old = $_coin_old - 10000;
	$query = _query(_update('isplayer',"status='active',coin='$coin'","username='$_username'"));
	if($query)
	{
		echo '<script>
		document.addEventListener("DOMContentLoaded", function() {
			var modal = document.getElementById("activeThanhCong");
			var modalContent = document.getElementById("activeThanhCongContent");
			modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #198754;\">Tài khoản của bạn đã được mở khóa</span>";
			modal.style.display = "block";
		});
	</script>';
	}
	else
	{
		echo '<script>
		document.addEventListener("DOMContentLoaded", function() {
			var modal = document.getElementById("activeThatBai");
			var modalContent = document.getElementById("activeThatBaiContent");
			modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #ff0000;\">Có lỗi gì đó xảy ra. Vui lòng liên hệ Admin!</span>";
			modal.style.display = "block";
		});
	</script>';
	}
}*/
//include_once 'profile.php';
include_once 'index.php';
?>
<body>
	<!-- Modal HTML -->
<div id="activeThanhCong" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <span class="close" onclick="closeActiveThanhcong()">&times;</span>
            <div class="modal-body text-center">
                <a href="/"><img class="logo" alt="Logo" src="/images/logo.png" style="max-width: 200px;"></a>
				<h2 style="color: #4285F4;">Thành Công</h2>
                <p id="activeThanhCongContent"></p>
                <button class="modal-close-btn" onclick="closeActiveThanhCong()">OK</button>
            </div>
        </div>
    </div>
</div>




<!-- Modal HTML -->
<div id="activeThatBai" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <span class="close" onclick="closeActiveThatBai()">&times;</span>
            <div class="modal-body text-center">
                <a href="/"><img class="logo" alt="Logo" src="/images/logo.png" style="max-width: 200px;"></a>
				<h2 style="color: #E83F33;">Thất Bại</h2>
                <p id="activeThatBaiContent"></p>
                <button class="modal-close-btn" onclick="closeActiveThatBai()">OK</button>
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
    

function openActiveThanhCong() {
    var activeThanhCong = document.getElementById('activeThanhCong');
    activeThanhcong.style.display = 'block';
}

function closeActiveThanhCong() {
    var activeThanhCong = document.getElementById('activeThanhCong');
    activeThanhCong.style.display = 'none';
}
function openActiveThatBai() {
    var activeThatBai = document.getElementById('activeThatBai');
    activeThatBai.style.display = 'block';
}

function closeActiveThatBai() {
    var activeThatBai = document.getElementById('activeThatBai');
    activeThatBai.style.display = 'none';
}
</script>
</body>