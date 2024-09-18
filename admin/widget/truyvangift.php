<?php 

require_once('../../set.php');

if(!is_admin()){die();}
/** Hàm thực thi lệnh gift*/
if(!$_POST){load_url('/');}

if(isset($_POST['addGift']))
{
    $code = mysqli_real_escape_string($config, POST('code'));
    $itemid = mysqli_real_escape_string($config, POST('itemid'));
    $itemquantity = mysqli_real_escape_string($config, POST('itemquantity'));
    $itemisLock = mysqli_real_escape_string($config, POST('itemisLock'));
    $itemexpires = mysqli_real_escape_string($config, POST('itemexpires'));

    $idItem = explode (",",str_replace(" ", "",$itemid));
    $quantityItem = explode (",",str_replace(" ", "",$itemquantity));
    $lockItem = explode (",",str_replace(" ", "",$itemisLock));
    $expiresItem = explode (",",str_replace(" ", "",$itemexpires));


    if($code == '' || $itemid == '' || $itemquantity == '' || $itemisLock == '' || $itemexpires == '') {
        $_SESSION['success'] = "Cập nhật thất bại hãy nhập đầy đủ thông tin.";
        header("Location: admin/ma-qua-tang");
        exit(0);
    } else {
        if(count($idItem) == count($quantityItem) && count($idItem) == count($lockItem) && count($idItem) == count($expiresItem)) {
            //$code = strtoupper($code);
            // $item_id = json_encode($idItem);
            // $item_quantity =json_encode($quantityItem);
            // $item_isLock = json_encode($lockItem);
            // $item_expires = json_encode($expiresItem);
    
            _query("INSERT INTO `gift_code` (`code`,`item_id`,`item_quantity`,`item_isLock`,`item_expires`,`created_at`)
                                         VALUES ('$code','[$itemid]','[$itemquantity]','[$itemisLock]','[$itemexpires]','".date("Y-m-d H:i:s")."')");
            
            $_SESSION['success'] = "Cập nhật thành công giftcode: $code";
            header("Location: /admin/ma-qua-tang");
            exit(0);
        } else {
            $_SESSION['success'] = "Cập nhật thất bại, các chuỗi không khớp nhau!";
            header("Location: admin/ma-qua-tang");
            exit(0);
        }
    }
}

if(isset($_POST['updateGift']))
{
    $id = mysqli_real_escape_string($config, POST('updateGift'));
    $code = mysqli_real_escape_string($config, POST('code'));
    $itemid = mysqli_real_escape_string($config, POST('itemid'));
    $itemquantity = mysqli_real_escape_string($config, POST('itemquantity'));
    $itemisLock = mysqli_real_escape_string($config, POST('itemisLock'));
    $itemexpires = mysqli_real_escape_string($config, POST('itemexpires'));

    $idItem = explode (",",str_replace(" ", "",$itemid));
    $quantityItem = explode (",",str_replace(" ", "",$itemquantity));
    $lockItem = explode (",",str_replace(" ", "",$itemisLock));
    $expiresItem = explode (",",str_replace(" ", "",$itemexpires));

    if($code == '' || $itemid == '' || $itemquantity == '' || $itemisLock == '' || $itemexpires == '') {
        $_SESSION['success'] = "Cập nhật thất bại hãy nhập đầy đủ thông tin.";
        header("Location: /admin/?widget=giftcode_edit&id=$id");
        exit(0);
    } else {
        if(count($idItem) == count($quantityItem) && count($idItem) == count($lockItem) && count($idItem) == count($expiresItem)) {
            // $code = strtoupper($code);
            // $item_id = json_encode($idItem);
            // $item_quantity =json_encode($quantityItem);
            // $item_isLock = json_encode($lockItem);
            // $item_expires = json_encode($expiresItem);
    
            _query("UPDATE `gift_code` SET `code` = '$code', 
                                                `item_id` = '[$itemid]', 
                                                `item_quantity` = '[$itemquantity]',
                                                `item_isLock` = '[$itemisLock]', 
                                                `item_expires` = '[$itemexpires]',
                                                `updated_at` = '".date("Y-m-d H:i:s")."' WHERE `id` = '$id'");
            $_SESSION['success'] = "Cập nhật thành công giftcode: $code";
            header("Location: /admin/ma-qua-tang");
            exit(0);
        } else {
            $_SESSION['error'] = "Cập nhật thất bại, các kí tự không khớp nhau!";
            header("Location: /admin/?widget=giftcode_edit&id=$id");
            exit(0);
        }
    }
}

if(isset($_POST['giftDelete']))
{
    $id = mysqli_real_escape_string($config, POST('giftDelete'));
    $check = fetch_assoc("SELECT * FROM gift_code WHERE id = '$id'", 1);
    $code = $check['code'];
    _query("DELETE FROM gift_code WHERE id='$id' ");
    $_SESSION['success'] = "Xóa thành công giftcode: #$id $code";
    header("Location: /admin/ma-qua-tang");
    exit(0);
}
?>