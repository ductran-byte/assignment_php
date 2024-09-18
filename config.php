<?php
include_once 'cauhinh.php';
$config = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if(!$config)
{
	die("KHONG THE KET NOI DEN CSDL ! VUI LONG KIEM TRA LAI");
}
else
{
	mysqli_set_charset($config,'utf8mb4');
}

//==================================================================

// xác nhận người dùng
function is_client() {
    $username = isset($_SESSION["user"]) ? $_SESSION["user"] : false;
    if ($username) {
        return true;
    }
    return false;
}

function is_admin() {
    if (is_client()) {
        $id_admin = 'admin';   //Điền tên đăng nhập admin tại đây
        if ($_SESSION["user"] == $id_admin) {
            return true;
        }
        return false;
    }
    return false;
}

// Anti Xss 
function Anti_xss($text) {
    return htmlentities(strip_tags($text), ENT_QUOTES, 'UTF-8');
}

// Chống xss
class Anti_xss {
    public function clean_up($text) {
    	return htmlentities(strip_tags($text), ENT_QUOTES, 'UTF-8');
    }
} 

// gọn hơn :v
function load_url($url = "") {
    header("Location: ".$url);
    exit();
}

// $_GET 
function GET($key) {
    return isset($_GET[$key]) ? htmlentities(strip_tags($_GET[$key]), ENT_QUOTES, 'UTF-8') : false; 
}

// $_POST
function POST($key) {
    return isset($_POST[$key]) ? htmlentities(strip_tags($_POST[$key]), ENT_QUOTES, 'UTF-8') : false; 
}

function _randomgift() {
	$code = 'TEST' . strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 5));
	$string = "$code";
	return $string;
}

//==================================================================

function _query($sql) {
	GLOBAL $config;
//    var_dump($sql);
//    die();
	return mysqli_query($config,$sql);
}

function fetch_row($sql) 
{
	$query = _query($sql);
	if ($query)
	{
		$row = $query->fetch_row();
		return $row[0];
	}       
}

function fetch_assoc($sql, $type)
{
	$query = _query($sql);
	if ($query)
	{
		if ($type == 0)
		{
			// Lấy nhiều dữ liệu gán vào mảng
			while ($row = mysqli_fetch_assoc($query))
			{
				$data[] = $row;
			}
			return $data;
		}
		else if ($type == 1)
		{
			// Lấy một hàng dữ liệu gán vào biến
			$data = mysqli_fetch_assoc($query);
			return $data;
		}
	} 
}
function _fetch($sql) {
	return mysqli_fetch_array(_query($sql));
}
function isset_sql($txt) {
	GLOBAL $config;
	return mysqli_real_escape_string($config,$txt);
}
function _insert($table,$input,$output) {
	return "INSERT INTO $table($input) VALUES($output)";
}
function _select($select,$from,$where) {
	return "SELECT $select FROM $from WHERE $where";
}
function _update($tabname,$input_output,$where) {
	return "UPDATE $tabname SET $input_output WHERE $where";
}



$_succ = '<div class="success">';
$_err = '<div class="error">';
$_end = '</div>';
function _alert($txt,$txt1) {
	GLOBAL $_succ,$_err,$_end;
	switch ($txt) {
		case 'succ':
		return "$_succ $txt1 $_end";
		break;
		
		case 'err':
		return "$_err $txt1 $_end";
		break;
	}
}
function _console($txt){
	return "<script>console.log('".htmlspecialchars($txt)."')</script>";
}
function _randtxt(){
	$string = "";
	$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	for($i=1; $i<=9; $i++) {
		$position = rand() % strlen($chars);
		$string .= substr($chars, $position, 1);
	}
	return $string;
}
if(date("d") == '30' && date("H") == '23'){
	_query(_update('isplayer',"tongthang='0'","id > '0'"));
}
?>