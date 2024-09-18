<?php

require_once('../../set.php');
$path = "/images/img/";
$path2 = $root . "/images/img/";
if (!is_admin()) {
    die();
}
/** Hàm thực thi lệnh gift*/
if (!$_POST) {
    load_url('/');
}

if (isset($_POST['editShop'])) {
    $id = mysqli_real_escape_string($config, POST('editShop'));
    $tenitem = $_POST['tenitem'];
    $chisoweb = mysqli_real_escape_string($config, POST('chisoweb'));
    $type = mysqli_real_escape_string($config, POST('type'));
    $chisogame = $_POST['chisogame'];
    $giacoin = mysqli_real_escape_string($config, POST('giacoin'));
    $image = mysqli_real_escape_string($config, POST('image'));
    $img_loc = $_FILES['images']['tmp_name'];
    $img_name = $_FILES['images']['name'];
    $img_des = $path . $img_name;
    $img_des2 = $path2 . $img_name;

    if ($tenitem == '') {
        $_SESSION['error'] = "Tên item không được bỏ trống.";
        header("Location: /admin/?widget=webshop_edit&id=$id");
        exit(0);
    } else if ($type == '') {
        $_SESSION['error'] = "Loại item không được bỏ trống.";
        header("Location: /admin/?widget=webshop_edit&id=$id");
        exit(0);
    } else if ($chisoweb == '') {
        $_SESSION['error'] = "Chi so item không được bỏ trống.";
        header("Location: /admin/?widget=webshop_edit&id=$id");
        exit(0);
    } else if ($chisogame == '') {
        $_SESSION['error'] = "Chi so game không được bỏ trống.";
        header("Location: /admin/?widget=webshop_edit&id=$id");
        exit(0);
    } else if ($giacoin == '') {
        $_SESSION['error'] = "Gia coin không được bỏ trống.";
        header("Location: /admin/?widget=webshop_edit&id=$id");
        exit(0);
    } else if ($img_name == '') {
        _query("UPDATE `shop` SET `ten_item` = '$tenitem',
        `chi_so_web` = '$chisoweb',
        `chi_so_game` = '$chisogame',
        `gia_coin` = '$giacoin',
        `image` = '$image' 
        WHERE `id` = '$id'");
        $_SESSION['success'] = "Cập nhật vật phẩm $tenitem.";
        header("Location: /admin/?widget=webshop_edit&id=$id");
        exit(0);
    } else {
        move_uploaded_file($img_loc, $img_des2);
        _query("UPDATE `shop` SET `ten_item` = '$tenitem',
        `chi_so_web` = '$chisoweb',
        `chi_so_game` = '$chisogame',
        `gia_coin` = '$giacoin',
        `image` = '$img_des',
        `loai` = '$type'
        WHERE `id` = '$id'");
        $_SESSION['success'] = "Cập nhật vật phẩm $tenitem.";
        header("Location: /admin/?widget=webshop_edit&id=$id");
        exit(0);
    }
}

if (isset($_POST['addShop'])) {
    $tenitem = $_POST['tenitem'];
    $chisoweb = mysqli_real_escape_string($config, POST('chisoweb'));
    $type = mysqli_real_escape_string($config, POST('type'));
    $chisogame = $_POST['chisogame'];
    $giacoin = mysqli_real_escape_string($config, POST('giacoin'));

    $img_loc = $_FILES['images']['tmp_name'];
    $img_name = $_FILES['images']['name'];
    $img_des = $path . $img_name;
    $img_des2 = $path2 . $img_name;

    if ($tenitem == '') {
        $_SESSION['error'] = "Tên item không được bỏ trống.";
        header("Location: /admin/?widget=webshop_add");
        exit(0);
    } else if ($type == '') {
        $_SESSION['error'] = "Loại item không được bỏ trống.";
        header("Location: /admin/?widget=webshop_add");
        exit(0);
    } else if ($chisoweb == '') {
        $_SESSION['error'] = "Chi so item không được bỏ trống.";
        header("Location: /admin/?widget=webshop_add");
        exit(0);
    } else if ($chisogame == '') {
        $_SESSION['error'] = "Chi so game không được bỏ trống.";
        header("Location: /admin/?widget=webshop_add");
        exit(0);
    } else if ($giacoin == '') {
        $_SESSION['error'] = "Gia coin không được bỏ trống.";
        header("Location: /admin/?widget=webshop_add");
        exit(0);
    } else if ($img_name == '') {
        $_SESSION['error'] = "Link image không được bỏ trống.";
        header("Location: /admin/?widget=webshop_add");
        exit(0);
    } else {
        move_uploaded_file($img_loc, $img_des2);
        _query("INSERT INTO `shop` (`ten_item`,`chi_so_web`,`chi_so_game`,`gia_coin`,`image`,`loai`) VALUES ('$tenitem','$chisoweb','$chisogame','$giacoin','$img_des','$type')");
        $_SESSION['success'] = "Add vật phẩm $tenitem vào shop";
        header("Location: /admin/cua-hang");
        exit(0);
    }
}

if (isset($_POST['deleteShop'])) {
    $id = mysqli_real_escape_string($config, POST('deleteShop'));
    $item = fetch_assoc("SELECT * FROM `shop` WHERE `id` = '$id'", 1);
    _query("DELETE FROM shop WHERE id='$id'");
    $_SESSION['success'] = "Đã xóa vật phẩm: " . $item['ten_item'] . "";
    header("Location: /admin/cua-hang");
    exit(0);
}


?>