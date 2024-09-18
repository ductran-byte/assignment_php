<?php
require_once('../../set.php');

if(!is_admin()){die();}
/** Hàm thực thi lệnh USER*/
if(!$_POST){load_url('/');}

if(isset($_POST['activeUser']))
{
    $id_user = mysqli_real_escape_string($config, $_POST['activeUser']);
    $read = _select("*",'isplayer',"id='$id_user'");
    $checkuser = _fetch($read);
    if ($checkuser['status'] == '1') {
        $up =  _query(_update('isplayer',"status='0'","id='$id_user'"));
        $_SESSION['success'] = "Kích hoạt thành công tài khoản ".$checkuser['username']."";
        header("Location: /admin/tai-khoan");
        exit(0);
    } else {
        $up1 =  _query(_update('isplayer',"status='1'","id='$id_user'"));
        $_SESSION['success'] = "<font color='red'>Xóa kích hoạt</font> thành công tài khoản ".$checkuser['username']."";
        header("Location: /admin/tai-khoan");
        exit(0);
    }
}

if(isset($_POST['deleteUser']))
{
    $id_user = mysqli_real_escape_string($config ,$_POST['deleteUser']);
    $read = _select("*",'isplayer',"id='$id_user'");
    $checkuser = _fetch($read);
    $query = "DELETE FROM isplayer WHERE id='$id_user' ";
    $query_run = _query($query);
    if($query_run)
    {
        $_SESSION['success'] = "Đã xóa tài khoản ".$checkuser['username']."";
        header("Location: /admin/tai-khoan");
        exit(0);
    }
    else
    {
        $_SESSION['error'] = "Không thể xóa tài khoản ".$checkuser['username']."";
        header("Location: /admin/tai-khoan");
        exit(0);
    }
}


/** hàm thực thi All  */

if(isset($_POST['unActiveAll']))
{
    $up =  _query(_update('isplayer',"status='1'","status='0'"));
    $_SESSION['success'] = "Đã hủy kích hoạt toàn bộ tài khoản.";
    header("Location: /admin/tai-khoan");
    exit(0);
}

if(isset($_POST['activeAll']))
{
    $up =  _query(_update('isplayer',"status='0'","status='1'"));
    $_SESSION['success'] = "Đã kích hoạt toàn bộ tài khoản.";
    header("Location: /admin/tai-khoan");
    exit(0);
}

if(isset($_POST['deleteNV']))
{
    $up1 =  _query("TRUNCATE TABLE `teddy_account`.`ninja`");
    $up2 =  _query("TRUNCATE TABLE `teddy_account`.`clone_ninja`");
    $_SESSION['success'] = "Đã xóa toàn bộ nhân vật.";
    header("Location: /admin/tai-khoan");
    exit(0);
}

if(isset($_POST['deletePlayer']))
{
    $read_sql = _fetch(_select("*",'isplayer',"status='1'"));
    //$sql = "SELECT * FROM player WHERE character_id IS NULL AND activated = 0";
    $replace1 = str_replace('"', '', $read_sql['isNinja']);
    $replace2 = str_replace('[', '', $replace1);
    $replace = str_replace(']', '', $replace2);
    if(strlen($replace) == 0 && $read_sql['status'] == '1') {
        $up1 = _query("DELETE FROM isplayer WHERE status='1' ");
        $_SESSION['success'] = "Đã xóa các tài khoản không có nhân vật & chưa kích hoạt.";
        header("Location: /admin/tai-khoan");
        exit(0);
    } else {
        $_SESSION['error'] = "Không tìm thấy tài khoản nào chưa lập nhân vật và chưa kích hoạt";
        header("Location: /admin/tai-khoan");
        exit(0);
    }
}


if(isset($_POST['addcoin'])) {
    $iduser = addslashes(strtolower(mysqli_real_escape_string($config, $_POST['addcoin'])));
    $coinnhap = addslashes(strtolower(mysqli_real_escape_string($config, $_POST['congcoin'])));
    $user = fetch_assoc("SELECT * FROM isplayer WHERE id = '$iduser'", 1);

    //cộng coin đã nhập và coin đang có lại
    $coincong = $user['coin'] + $coinnhap;
    //cập nhật số coin đã cộng lại
    _query("UPDATE `isplayer` SET `coin` = '$coincong' WHERE `id` = '$iduser'");
    $_SESSION['success'] = "Đã +".number_format($coinnhap)." Coin vào tài khoản ".$user['username'].".";
    header("Location: /admin/?widget=user_view&id=$iduser");
    exit(0);
}

if(isset($_POST['addluong'])) {
    $iduser = addslashes(strtolower(mysqli_real_escape_string($config, $_POST['addluong'])));
    $luongnhap = addslashes(strtolower(mysqli_real_escape_string($config, $_POST['congluong'])));
    $user = fetch_assoc("SELECT * FROM isplayer WHERE id = '$iduser'", 1);

    //cộng coin đã nhập và coin đang có lại
    $luongcong = $luongnhap + $user['luong'];
    //cập nhật số coin đã cộng lại
    _query("UPDATE `isplayer` SET `luong` = '$luongcong' WHERE `id` = '$iduser'");
    $_SESSION['success'] = "Đã +".number_format($luongnhap)." lượng vào tài khoản ".$user['username'].".";
    header("Location: /admin/?widget=user_view&id=$iduser");
    exit(0);
}

if(isset($_POST['editUser'])) {
    $iduser = addslashes(strtolower(mysqli_real_escape_string($config, $_POST['id'])));
    $username = addslashes(strtolower(mysqli_real_escape_string($config, $_POST['username'])));
    $password = addslashes(strtolower(mysqli_real_escape_string($config, $_POST['password'])));
    $ban = addslashes(strtolower(mysqli_real_escape_string($config, $_POST['ban'])));
    $status = addslashes(strtolower(mysqli_real_escape_string($config, $_POST['status'])));
    $role = addslashes(strtolower(mysqli_real_escape_string($config, $_POST['role'])));
    $vip = addslashes(strtolower(mysqli_real_escape_string($config, $_POST['vip'])));

    _query("UPDATE `isplayer` SET `username` = '$username',
                                    `password` = '$password',
                                    `ban` = '$ban',
                                    `status` = '$status',
                                    `role` = '$role',
                                    `vip` = '$vip'
                                    WHERE `id` = '$iduser'");
    $_SESSION['success'] = "Cập nhật thành công tài khoản $username.";
    header("Location: /admin/?widget=user_edit&id=$iduser");
    exit(0);

}
?>