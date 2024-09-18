<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$_link_download_game = "bạn sửa link download game ở đây";
$_domain = '127.0.0.1';
$_tientogioithieu = '';
$_name_site = ' ';
//mysql
$db_host="127.0.0.1";
$db_user="root";
$db_pass="";

$db_name="nso_acc";


// khuyến mãi nạp tiền 
$khuyenmai = '1'; // mặc định là 1 nếu không bật khuyến mại x2 khuyến mại thì sửa là số 2 (nghiêm cấm để số 0)
//api
$w_api_momo='';
$w_api_momo_id='';
$w_cuphap_momo='nap'; // cú pháp
$_qrmomo='/images/qr-momo.png'; // link ảnh qr code
$_phonemomo='0931353598'; //sđt momo


$shopluong_api='NWsgd2zVYLwEai8HueO0x453jSpvnQAb_bỏ'; // api nạp thẻ


///
//
function curl_get_contents($url)
{
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  $data = curl_exec($curl);
  curl_close($curl);
  return $data;
}
//



