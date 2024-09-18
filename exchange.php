<?php 

include_once 'head.php';
if($_login == null) {header("location:/login");}
$userValue = $_user;
$read_sql = _fetch(_select("*", 'isplayer', "username='$_username'"));
$replace1 = $read_sql['username'];
$replace2 = str_replace('[', '', $replace1);
$replace = str_replace(']', '', $replace2);
$user_id = $read_sql['id'];
$_coin = $read_sql['coin'];
// Thêm khoảng cách giữa hai dấu ngoặc kép
//$replace1 = str_replace('"', '" ', $read_sql['username']);
//$user_id = $read_sql['id'];
//$replace1 = str_replace('"', '', $read_sql['ninja']);



// $replace2 = str_replace('[', '', $replace1);
// $replace = str_replace(']', '', $replace2);
// //

$_alert = null;
if(isset($_POST['playername']))
{
	$playername = htmlspecialchars($_POST['playername']);
	$amount1 = htmlspecialchars($_POST['amount']);
	if($amount1 == 10000)
	{
		$amount2 = 20000;
	}
	if($amount1 == 20000)
	{
		$amount2 = 40000;
	}
	if($amount1 == 50000)
	{
		$amount2 = 100000;
	}
	if($amount1 == 100000)
	{
		$amount2 = 200000;
	}
	if($amount1 == 200000)
	{
		$amount2 = 400000;
	}
	if($amount1 == 500000)
	{
		$amount2 = 1000000;
	}
	if($amount1 == 1000000)
	{
		$amount2 = 2000000;
	}
	if($amount1 == 2000000)
	{
		$amount2 = 4000000;
	}
	if($amount1 == 5000000)
	{
		$amount2 = 9999999;
	}
	$arr = explode(',',$replace);
		if(in_array($playername, $arr))
		{
			echo _console("có");
			if($_coin >= $amount1 )
			{
				$txt = _update('isplayer',"coin=`coin`-$amount1","username='$_username'");
				$txt1 = _update('isplayer',"luong=`luong`+$amount2","username='$_username'");
				$query = _query($txt);
				$query1 = _query($txt1);
				echo '<script>
				document.addEventListener("DOMContentLoaded", function() {
					var modal = document.getElementById("doiluongThanhCong");
					var modalContent = document.getElementById("doiluongThanhCongContent");
					modalContent.innerHTML = "<span style=\"font-size: 24px; font-weight: bold; color: #198754;\">Bạn nhận được ' . $amount2 . ' lượng</span>";
					modal.style.display = "block";
				});
			</script>';
			
			
			}
			else
			{
				echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    var modal = document.getElementById("doiluongThatBai");
                    var modalContent = document.getElementById("doiluongThatBaiContent");
                    modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #ff0000;\">Số dư không đủ để đổi</span>";
                    modal.style.display = "block";
                });
            </script>';
			}
		}
		else
		{
			echo '<script>
			document.addEventListener("DOMContentLoaded", function() {
				var modal = document.getElementById("doiluongThatBai");
				var modalContent = document.getElementById("doiluongThatBaiContent");
				modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #ff0000;\">Không tìm thấy nhân vật</span>";
				modal.style.display = "block";
			});
		</script>';
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
                <h2>Đổi lượng thành công</h2>
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
                <h2>Đổi lượng thất bại</h2>
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

<div class="card">
   <div class="card-body">

<div class="text-center fw-semibold fs-5">Đổi ECoin ra Lượng 
<div class="text-center"><?php echo $_alert; $user_arr_1 = _fetch("SELECT * FROM isplayer Where username='$_user'");?></div>
<form method="POST">   
   
<span class="text-danger"></span>
</div>
<div class="d-flex justify-content-center">
   <div class="col-md-8">
      <div class="row text-center justify-content-center row-cols-2 row-cols-lg-3 g-2 g-lg-2 my-1 mb-2">
         <div >
                      <div class="col">
                         <div  class="w-100 fw-semibold cursor-pointer " onclick="handleClick(10000)">
                            <div id="button-10000" class="recharge-method-item false recharge-method-item" style="height: 90px;" data-value="10000">
                               <div class="text-primary" >10,000E</div>
                               <div class="center-text text-dark"><span>Nhận</span></div>
                               <div class="text-danger">20,000 lượng</div>
                            </div>
                         </div>
                      </div>
                </div><div >
                      <div class="col">
                         <div  class="w-100 fw-semibold cursor-pointer" onclick="handleClick(20000)">
                            <div id="button-20000" class="recharge-method-item false false recharge-method-item" style="height: 90px;" data-value="20000">
                               <div class="text-primary" >20,000E</div>
                               <div class="center-text text-dark"><span>Nhận</span></div>
                               <div class="text-danger">40,000 lượng</div>
                            </div>
                         </div>
                      </div>
                </div><div >
                      <div class="col">
                         <div  class="w-100 fw-semibold cursor-pointer" onclick="handleClick(50000)">
                            <div id="button-50000" class="recharge-method-item false false recharge-method-item" style="height: 90px;" data-value="50000">
                               <div class="text-primary" >50,000E</div>
                               <div class="center-text text-dark"><span>Nhận</span></div>
                               <div class="text-danger">100,000 lượng</div>
                            </div>
                         </div>
                      </div>
                </div><div >
                      <div class="col">
                         <div  class="w-100 fw-semibold cursor-pointer" onclick="handleClick(100000)">
                            <div id="button-100000" class="recharge-method-item false false recharge-method-item" style="height: 90px;" data-value="100000">
                               <div class="text-primary" >100,000E</div>
                               <div class="center-text text-dark"><span>Nhận</span></div>
                               <div class="text-danger">200,000 lượng</div>
                            </div>
                         </div>
                      </div>
                </div><div >
                      <div class="col">
                         <div  class="w-100 fw-semibold cursor-pointer" onclick="handleClick(200000)">
                            <div id="button-200000" class="recharge-method-item false false recharge-method-item" style="height: 90px;" data-value="200000">
                               <div class="text-primary" >200,000E</div>
                               <div class="center-text text-dark"><span>Nhận</span></div>
                               <div class="text-danger">400,000 lượng</div>
                            </div>
                         </div>
                      </div>
                </div><div >
                      <div class="col">
                         <div  class="w-100 fw-semibold cursor-pointer" onclick="handleClick(500000)">
                            <div id="button-500000" class="recharge-method-item false false recharge-method-item" style="height: 90px;" data-value="500000">
                               <div class="text-primary" >500,000E</div>
                               <div class="center-text text-dark"><span>Nhận</span></div>
                               <div class="text-danger">1000,000 lượng</div>
                            </div>
                         </div>
                      </div>
                </div><div >
                      <div class="col">
                         <div  class="w-100 fw-semibold cursor-pointer" onclick="handleClick(1000000)">
                            <div id="button-1000000" class="recharge-method-item false false recharge-method-item" style="height: 90px;" data-value="1000000">
                               <div class="text-primary" >1,000,000E</div>
                               <div class="center-text text-dark"><span>Nhận</span></div>
                               <div class="text-danger">2,000,000 lượng</div>
                            </div>
                         </div>
                      </div>
                </div><div >
                      <div class="col">
                         <div  class="w-100 fw-semibold cursor-pointer" onclick="handleClick(2000000)">
                            <div id="button-2000000" class="recharge-method-item false false recharge-method-item" style="height: 90px;" data-value="2000000">
                               <div class="text-primary" >2,000,000E</div>
                               <div class="center-text text-dark"><span>Nhận</span></div>
                               <div class="text-danger">4,000,000 lượng</div>
                            </div>
                         </div>
                      </div>
                </div><div >
                      <div class="col">
                         <div  class="w-100 fw-semibold cursor-pointer" onclick="handleClick(5000000)">
                            <div id="button-5000000" class="recharge-method-item false false recharge-method-item" style="height: 90px;" data-value="5000000">
                               <div class="text-primary" >5,000,000E</div>
                               <div class="center-text text-dark"><span>Nhận</span></div>
                               <div class="text-danger">9,999,999 lượng</div>
                            </div>
                         </div>
                      </div>
                      <input type="hidden" name="amount" id="selected-amount" required="">
                </div>      
         </div>
<?php
if (strlen($replace) == 0) {
  echo '<div class="text-center">Chưa tạo nhân vật</div>';
} else {
  $arr = explode(',', $replace);
  echo '<div class="centered-container">'; // Bắt đầu một div để căn giữa
  foreach ($arr as $item) {
    echo '<label class="chonnhanvat" style="height: 90px; width: 195px">
            <input type="hidden" name="playername" value="' . $item . '">
            <img src="images/obito.png" alt="Hình ảnh nhân vật">
            <span>' . $item . '</span>
          </label>';
  }
  echo '</div>'; // Kết thúc div để căn giữa
}
?>
 <div class="text-center"<p> Có <?php echo number_format ($user_arr_1['luong']);//hiển thị lượng hiện có ?> Lượng</p></div>
 <!--<div class="text-center"<p> Có <?php echo  $user_arr_1['luong'];//hiển thị lượng hiện có ?> Lượng</p></div>-->


      <!-- <div class="text-center">
         <div class="fw-semibold fs-6">Chọn nhân vật</div>
      </div>
      <div class="text-danger text-center fw-semibold mt-3 mb-2">Tài khoản chưa có nhân vật nào</div> -->
      <div class="text-center mt-4">
         <button id="confirm"  type="button" onclick="onClickExchange()" class="w-50 rounded-3 btn btn-primary btn-sm">Xác nhận</button>

      </div>
         <div class="text-center"><small class="fw-semibold"><a href="/lich-su">Lịch sử giao dịch</a></small></div>
     <!-- </div>
   </div>
</div>-->
<div class="modal fade" id="modalConfirmExchange" tabindex="-1" aria-labelledby="modalConfirmExchangeLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body">
            <div class="my-2">
               <div class="text-center"><a href="/"><img class="logo" alt="Logo" src="/images/logo.png" style="max-width: 200px;"></a></div>
            </div>
            <div class="text-center fw-semibold">
               <div id="noti" style="text-align: center;"></div>
               <div class="text-white text-center mb-2" id="waiting-times"></div>
               <div class="fs-6 mb-2">Bạn thoát game trước khi thực hiện giao dịch chưa?</div>
               <div id="noti-active"></div>
               <span>Bạn phải thoát game trước khi giao dịch rồi vào lại game để tránh phát sinh lỗi trong quá trình cộng tiền</span>
               <div class="mt-2 aci"><button type="submit" id="confirmExchange" onclick="handleConfirm()" class="btn-rounded btn btn-primary btn-sm">Xác nhận đã thoát</button></div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</div>
</div>
</div>
<style>
   .centered-container {
  display: flex;
  justify-content: center;
  align-items: center;

}

.chonnhanvat {
    background-color: #f7ffe5;
    border: 2px solid #339b6b;
    transition: border-color 0.3s, background-color 0.05s;
}

.chonnhanvat:hover {
    border-color: #146c43;
}

.chonnhanvat.selected {
    border-color: #136841;
    background-color: #d2e6a2;
}
.chonnhanvat {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    border-radius: 15px;
    overflow: hidden;
  }
  .chonnhanvat img {
    max-width: 50px; /* Điều chỉnh kích thước ảnh theo ý muốn */
    max-height: 50px; /* Điều chỉnh kích thước ảnh theo ý muốn */
  }
</style>

<script>
  // Sử dụng JavaScript để xử lý việc chọn tùy chọn và cập nhật giá trị trong input ẩn
  const rechargeMethodItems = document.querySelectorAll(".recharge-method-item");
  const selectedAmountInput = document.getElementById("selected-amount");

  rechargeMethodItems.forEach((item) => {
    item.addEventListener("click", () => {
      rechargeMethodItems.forEach((element) => {
        element.classList.remove("selected");
      });

      item.classList.add("selected");
      selectedAmountInput.value = item.getAttribute("data-value");
    });
  });


    function onClickExchange(){
        $("#modalConfirmExchange").modal("show");
    }
   let selected;
   let beforeSelected;
   function handleClick(index){
      selected = index;
      $(`#button-`+selected+``).css('background-color', '#d2e6a2') ;
      if(beforeSelected){
         $(`#button-`+beforeSelected+``).css('background-color', '') ;
      }
      beforeSelected = index;
   }
   
   //nude nhân vật
   document.addEventListener("DOMContentLoaded", function () {
    const rechargeItems = document.querySelectorAll(".chonnhanvat");

    // Lặp qua tất cả các ô lựa chọn và thêm sự kiện click cho mỗi ô
    rechargeItems.forEach(function (item) {
        item.addEventListener("click", function () {
            // Loại bỏ lớp `.selected` từ tất cả các ô lựa chọn
            rechargeItems.forEach(function (item) {
                item.classList.remove("selected");
            });

            // Thêm lớp `.selected` cho ô lựa chọn được chọn
            item.classList.add("selected");
        });
    });
});


</script>                    
</form>
<?php include 'end.php' ?>
</body>
</html>


