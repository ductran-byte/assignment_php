<?php
session_start();
include_once 'cauhinh.php';

date_default_timezone_set('Asia/Ho_Chi_Minh');
$_login = isset($_login) ? $_login : null;
include_once 'config.php';
$root = $_SERVER["DOCUMENT_ROOT"];
$_user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
if($_user != null)
{
	$_login = "on";
	$user_arr = _fetch("SELECT * FROM isplayer Where username='$_user'");
	if(count($user_arr) <= 0){header("location:/?out");}
	$_id = $user_arr['id'];
	$_username = htmlspecialchars($user_arr['username']);
	$_password = htmlspecialchars($user_arr['password']);
//	$_phone = htmlspecialchars($user_arr['phone']);
// 	$_vnd = $user_arr['vnd'];
	$_luong = $user_arr['luong'];
	$_coin = $user_arr['coin'];	$_type_account = htmlspecialchars($user_arr['nhomkhachhang']);
	switch ($_type_account) {
		case '0': // Loại tài khoản //
			$_type_account_name = '<span style="color:black;font-weight: bold;">Thành Viên';
			break;
		case '1': // Cũng là loại tài khoản //
			$_type_account_name = '<span style="color:#198754;font-weight: bold;">Thành viên bạc';
			break;
		case '2': // Cũng là loại tài khoản //
			$_type_account_name = '<span style="color:yellow;font-weight: bold;">Thành viên Vàng';
			break;
		case '3': // Cũng là loại tài khoản //
			$_type_account_name = '<span style="color:#00ffCc;font-weight: bold;">Thành viên Kim Cương';
			break;	
		case '4': // Cũng là loại tài khoản //
			$_type_account_name = '<span style="color:RED;font-weight: bold;">Bố ADMIN';
			break;			
	}
	$_lock = htmlspecialchars($user_arr['status']); // Kích Hoạt Tài Khoản //
//	$_status = htmlspecialchars($user_arr['status']);
	switch ($_lock) {
		case '0': // Đã Kích Hoạt //
			$_lock = '<span style="color: #198754; font-weight: bold;">Đã Kích Hoạt <i class="checkmark" style="color: #198754; font-size: 18px;">✓</i></span>';
			break;
		
		case '1': // Chưa Kích Hoạt //
			$_lock = '<span style="color:#ff0000;font-weight: bold;">Chưa Kích Hoạt ✕ <i class="fa fa-times-circle-o" style="color: #ff0000; font-size: 18px;"></i></span>';
			break;
		case '2': // Đang Bị Khóa //
			$_lock = '<span style="color:#ff0000;font-weight: bold;">Đang Bị Khóa ⚠';
			break;
	}
}
else
{
	$_login = null;
}
if (isset($_GET['out']))
{
	session_destroy();
	header("location:/");
}
?>