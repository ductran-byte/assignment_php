<?php
require_once('../../set.php');

if(!is_admin()){die();}
/** Hàm thực thi lệnh USER*/
if(!$_POST){load_url('/');}

if(isset($_POST['updatePlayer']))
{
    $id = $_POST['updatePlayer'];
    $name = $_POST['name'];
    $level = $_POST['level'];
    $exp = $_POST['exp'];
    $ppoint = $_POST['ppoint'];
    $potential0 = $_POST['potential0'];
    $potential1 = $_POST['potential1'];
    $potential2 = $_POST['potential2'];
    $potential3 = $_POST['potential3'];
    $spoint = $_POST['spoint'];
    $xu = $_POST['xu'];
    $xuBox = $_POST['xuBox'];
    $yen = $_POST['yen'];
    $site = $_POST['site'];
    $maxluggage = $_POST['maxluggage'];
    $levelBag = $_POST['levelBag'];
    $ItemBox = $_POST['ItemBox'];
    $clan = $_POST['clan'];

    _query("UPDATE `isNinja` SET `name` = '$name',`level` = '$level',
                                    `exp` = '$exp',`ppoint` = '$ppoint',
                                    `potential0` = '$potential0',`potential1` = '$potential1',
                                    `potential2` = '$potential2',`potential3` = '$potential3',
                                    `spoint` = '$spoint',`xu` = '$xu',
                                    `xuBox` = '$xuBox',`yen` = '$yen',
                                    `site` = '$site',`maxluggage` = '$maxluggage',
                                    `levelBag` = '$levelBag',`ItemBox` = '$ItemBox',
                                    `clan` = '$clan'
                                    WHERE `id` = '$id'");
    $_SESSION['success'] = "Đã cập nhật nhân vật: $name";
    header("Location: /admin/?widget=player_edit&id=$id");
    exit(0);
}

?>

