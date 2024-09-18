<?php
global $result, $db_user, $db_pass, $db_host, $db_name, $khuyenmai;
include 'cauhinh.php';
$userDB           = $db_user;
$passDB           = $db_pass;
$server           = $db_host;
$DBase            = $db_name;
$khuyenmaix = $khuyenmai;
echo $khuyenmaix;
$conn['host']     = $server;
$conn['dbname']   = $DBase;
$conn['username'] = $userDB;
$conn['password'] = $passDB;
@mysql_connect("{$conn['host']}", "{$conn['username']}", "{$conn['password']}") or die("Ko thể kết nối data ...");
@mysql_select_db("{$conn['dbname']}") or die("chào bạn");
$connect = new mysqli($server, $userDB, $passDB, $DBase);
$connect->set_charset("utf8");
if ($connect->connect_error) {
    die("Bảo trì quay lại sau " . $connect->connect_error);
    exit();
}
date_default_timezone_set("Asia/Ho_Chi_Minh");

//$result = curl_get_contents('https://api.web2m.com/historyapimomo1h/642C1F90-8ABC-DB6D-0E2F-E2FC90C0064A');


        $result = json_decode($result, true);
        foreach ((array) $result['momoMsg']['tranList'] as $data)
        {
            $partnerId      = $data['partnerId'];               // SỐ ĐIỆN THOẠI CHUYỂN
            $comment        = $data['comment'];                 // NỘI DUNG CHUYỂN TIỀN
            $tranId         = $data['tranId'];                  // MÃ GIAO DỊCH
            $partnerName    = $data['partnerName'];             // TÊN CHỦ VÍ
            $thaidz         = $data['amount'];                  // SỐ TIỀN CHUYỂN
            $io         = $data['io'];                  // IO

        if($comment != null){
			$cmd = strtolower($comment);
		}
		$thai = explode('nap ',$cmd);
		$username = $thai[1];
		$amount = $thaidz * $khuyenmaix;

if($io == 1 && strpos($cmd,'nap') !== false){
    if(mysql_num_rows(mysql_query("SELECT tranid FROM naptien WHERE tranid='".$tranId."'")) == 0){
        $time = time();

        @mysql_query("INSERT INTO `naptien`(`uid`, `sotien`, `loaithe`, `time`, `tinhtrang`, `tranid`) VALUES ('$username','$amount','MoMo','$time','1','$tranId');");
        @mysql_query("UPDATE isplayer` SET `coin` = `coin` + '$amount',`coin_old` = `coin_old` + '$amount', `tongnap` = `tongnap` + '$amount' , `tongthang` = `tongthang` + '$amount' WHERE `username` = '$username' ");
        echo' '.$username.' + '.$amount.'vnd <br>';
        }
    }

}

?>