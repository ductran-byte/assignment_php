<?php 
$_alert = null;

include_once 'head.php';
if($_login == null) {header("location:/login");}
if(isset($_GET['act']))
{
	$act = htmlspecialchars($_GET['act']);
	if($act=='card')
	{
		$tenthe = isset_sql($_POST['cardType']);
		$menhgia = isset_sql($_POST['cardAmount']);
		$seril = isset_sql($_POST['cardSerial']);
		$manap = isset_sql($_POST['cardCode']);
		$read = _fetch(_select('*','topup',"code='$manap' && name='$tenthe' && seri='$seril'"));
			$txt = _insert('topup',"type,name,code,seri,number,user,time_in,status","'card','$tenthe','$manap','$seril','$menhgia','$_username','".time()."','wait'");
			$add = _query($txt);
			if($add)
			{
				$_alert = _alert('succ','Đã thêm thẻ, vui lòng đợi kết quả');
			}
			else
			{
				$_alert = _alert('err','Có lỗi gì đó xảy ra, vui lòng kiểm tra thẻ hoặc liên hệ với admin !');
			}
		}
}
?>
<style>
    #NotiflixLoadingWrap{
        position: fixed;
        margin: auto;
        /*height: 2em;*/
        /*width: 2em;*/
        width: 0;
        height: 0;
        overflow: show;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
    }
    /* Transparent Overlay */
    #NotiflixLoadingWrap:before {
        content: '';
        display: block;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(rgba(20, 20, 20,.1), rgba(0, 0, 0, .1));
    }
    
    .hide {
        display: none!important;
    }

</style>

<!------>

<script>
        function onClickNav(goto){
            let isLogged = true 
            if(!isLogged){
                $("#modalLogin").modal("show");
            } else {
                window.location.href = goto;
            }
        }
    </script>                
<div class="card">
                    
    <div class="card-body">
                        
<div class="d-inline d-sm-flex justify-content-center">
   <div class="col-md-8 mb-5 mb-sm-4">
      <div class="d-flex align-items-center justify-content-between"><a href="ranking.php"><small class="fw-semibold">Xem ưu đãi</small></a><small class="fw-semibold">Tích lũy: 0%</small></div>
      <div class="recharge-progress">
         <div class="progress-container">
            <div class="progress-main">
               <div class="progress-bar" style="width: 0%;"></div>
               <div class="progress-bg"></div>
            </div>
         </div>
         <div class="_3Ne69qQgMJvF7eNZAIsp_D">
            <div class="_38CkBz1hYpnEmyQwHHSmEJ">
               <div class="NusvrwidhtE2W6NagO43R">
                  <div class="_1e8_XixJTleoS7HwwmyB-E">
                     <div class="_2kr5hlXQo0VVTYXPaqefA3 _2Nf9YEDFm2GHONqPnNHRWH" style="left: 1%;">
                        <div class="_12VQKhFQP9a0Wy-denB6p6">
                           <div>0</div>
                           <div class="_3toQ_1IrcIyWvRGrIm2fHJ"></div>
                        </div>
                     </div>
                     <div class="_2kr5hlXQo0VVTYXPaqefA3" style="left: 33.3333%;">
                        <div class="_12VQKhFQP9a0Wy-denB6p6">
                           <div class="_3KQP4x4OyaOj6NIpgE7cKm"><img alt="" class="_2KchEf_H4jouWwDFDPi5hm" src="images/silver.png"></div>
                           <div>1Tr</div>
                        </div>
                        <div class="_3toQ_1IrcIyWvRGrIm2fHJ"></div>
                     </div>
                     <div class="_2kr5hlXQo0VVTYXPaqefA3" style="left: 66.6667%;">
                        <div class="_12VQKhFQP9a0Wy-denB6p6">
                           <div class="_3KQP4x4OyaOj6NIpgE7cKm"><img alt="" class="_2KchEf_H4jouWwDFDPi5hm" src="images/gold.png"></div>
                           <div>2Tr</div>
                        </div>
                        <div class="_3toQ_1IrcIyWvRGrIm2fHJ"></div>
                     </div>
                     <div class="_2kr5hlXQo0VVTYXPaqefA3" style="left: 99%;">
                        <div class="_12VQKhFQP9a0Wy-denB6p6">
                           <div class="_3KQP4x4OyaOj6NIpgE7cKm"><img alt="" class="_2KchEf_H4jouWwDFDPi5hm" src="images/diamond.png"></div>
                           <div>5Tr</div>
                        </div>
                        <div class="_3toQ_1IrcIyWvRGrIm2fHJ"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div>
   <div class="fs-5 fw-semibold text-center">Chọn hình thức nạp</div>
   <div class="row text-center justify-content-center row-cols-2 row-cols-lg-5 g-2 g-lg-2 my-1 mb-2">
      <div class="col">
         <a class="w-100 fw-semibold" href="/nap-tien">
            <div class="recharge-method-item active"><img alt="method" src="/images/momo.png" data-pin-no-hover="true"></div>
         </a>
      </div>
      <div class="col">
         <a class="w-100 fw-semibold" href="/nap-card">
            <div class="recharge-method-item false"><img alt="method" src="/images/card.png" data-pin-no-hover="true"></div>
         </a>
      </div>
   </div>
</div>
<div class="d-flex justify-content-center">
   <div class="col-md-8 mt-3">
         
      <div id="list" class="fs-5 fw-semibold text-center">Chọn mốc nạp</div>
      <div>
      <div id="noti" class="hide" style="text-align: center;">
         <div class="alert alert-danger" id="error">Chưa chọn mốc nạp </div>
      </div>
         <div id="list_amt" class="row text-center justify-content-center row-cols-2 row-cols-lg-3 g-2 g-lg-2 my-1 mb-2">
            <div>
                     <div class="col">
                        <div class="w-100 fw-semibold cursor-pointer">
                           <div class="recharge-method-item position-relative false" style="height: 90px;">
                              <div>10,000 đ</div>
                              <div class="center-text text-danger"><span>Nhận</span></div>
                              <div class="text-primary">12,500 P </div>
                              <span class="text-white position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index: 1;">+25%</span>
                           </div>
                        </div>
                     </div>
                  </div><div>
                     <div class="col">
                        <div class="w-100 fw-semibold cursor-pointer">
                           <div class="recharge-method-item position-relative false" style="height: 90px;">
                              <div>50,000 đ</div>
                              <div class="center-text text-danger"><span>Nhận</span></div>
                              <div class="text-primary">62,500 P </div>
                              <span class="text-white position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index: 1;">+25%</span>
                           </div>
                        </div>
                     </div>
                  </div><div>
                     <div class="col">
                        <div class="w-100 fw-semibold cursor-pointer">
                           <div class="recharge-method-item position-relative false" style="height: 90px;">
                              <div>100,000 đ</div>
                              <div class="center-text text-danger"><span>Nhận</span></div>
                              <div class="text-primary">125,000 P </div>
                              <span class="text-white position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index: 1;">+25%</span>
                           </div>
                        </div>
                     </div>
                  </div><div>
                     <div class="col">
                        <div class="w-100 fw-semibold cursor-pointer">
                           <div class="recharge-method-item position-relative false" style="height: 90px;">
                              <div>200,000 đ</div>
                              <div class="center-text text-danger"><span>Nhận</span></div>
                              <div class="text-primary">250,000 P </div>
                              <span class="text-white position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index: 1;">+25%</span>
                           </div>
                        </div>
                     </div>
                  </div><div>
                     <div class="col">
                        <div class="w-100 fw-semibold cursor-pointer">
                           <div class="recharge-method-item position-relative false" style="height: 90px;">
                              <div>500,000 đ</div>
                              <div class="center-text text-danger"><span>Nhận</span></div>
                              <div class="text-primary">625,000 P </div>
                              <span class="text-white position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index: 1;">+25%</span>
                           </div>
                        </div>
                     </div>
                  </div><div>
                     <div class="col">
                        <div class="w-100 fw-semibold cursor-pointer">
                           <div class="recharge-method-item position-relative false" style="height: 90px;">
                              <div>1,000,000 đ</div>
                              <div class="center-text text-danger"><span>Nhận</span></div>
                              <div class="text-primary">1,270,000 P </div>
                              <span class="text-white position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index: 1;">+27%</span>
                           </div>
                        </div>
                     </div>
                  </div><div>
                     <div class="col">
                        <div class="w-100 fw-semibold cursor-pointer">
                           <div class="recharge-method-item position-relative false" style="height: 90px;">
                              <div>2,000,000 đ</div>
                              <div class="center-text text-danger"><span>Nhận</span></div>
                              <div class="text-primary">2,600,000 P </div>
                              <span class="text-white position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index: 1;">+30%</span>
                           </div>
                        </div>
                     </div>
                  </div><div>
                     <div class="col">
                        <div class="w-100 fw-semibold cursor-pointer">
                           <div class="recharge-method-item position-relative false" style="height: 90px;">
                              <div>5,000,000 đ</div>
                              <div class="center-text text-danger"><span>Nhận</span></div>
                              <div class="text-primary">6,800,000 P </div>
                              <span class="text-white position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index: 1;">+36%</span>
                           </div>
                        </div>
                     </div>
                  </div><div>
                     <div class="col">
                        <div class="w-100 fw-semibold cursor-pointer">
                           <div class="recharge-method-item position-relative false" style="height: 90px;">
                              <div>10,000,000 đ</div>
                              <div class="center-text text-danger"><span>Nhận</span></div>
                              <div class="text-primary">14,500,000 P </div>
                              <span class="text-white position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index: 1;">+45%</span>
                           </div>
                        </div>
                     </div>
                  </div>         
               </div>
         <div id="momo_info">
         </div>
		 <div class="accordion" id="topupList">
				<div class="list-group list-group-flush">
						<div class="text-center mt-3 momo-btn">
							<!--	<div type="button"  class="w-50 rounded-3 btn btn-primary btn-sm" data-toggle="collapse" data-target="#momo">Nạp qua ví MoMo</div>-->
						</div>
					</button>
					<div id="momo" class="collapse" data-parent="#topupList">
						<div class="card-body border-bottom">
							<h5>Cách 1: Nạp qua tin nhắn</h5>
							<p><i>1.</i> Đăng nhập ví Momo - Chọn số tiền bạn muốn nạp vào tài khoản</p>
							<p><i>2.</i> Nhập lời nhắn: <b style="color:blue;"><?php echo /*$w_cuphap_momo.' '.*/$_username; ?></b> (* Kiểm tra kĩ lời nhắn, nếu sai vui lòng liên hệ admin để được giải quyết.)</p>
							<p><i>3.</i> Chuyển số tiền bạn muốn nạp tới số <b style="color:red;"><?php echo $_phonemomo; ?></b></p>
						<!--	<p><i>Khi chuyển tiền xong làm mới trang sau 1 - 3 phút để cập nhật Coin.</i></p>-->
							<h5>Cách 2: Quét mã QR</h5>
							<center>
								<img src="/images/momo1.png<?php /*echo $_qrmomo;*/ ?>" style="max-width: 250px;">
								<p style="font-size: 12px;">Quét mã QR trên, nhập số tiền bạn cần nạp và nhập lời nhắn <b style="color:blue;"><?php echo /*$w_cuphap_momo.' '.*/$_username; ?></b> </p>
							</center>
						<!--	<p><i>Khi chuyển tiền xong làm mới trang sau 1 - 3 phút để cập nhật Coin.</i></p>-->
						</div>
					</div>
				</div>
	</div>

























         <div class="text-center mt-3 momo-btn">
			
            <button type="button" id="payment_momo" class="w-50 rounded-3 btn btn-primary btn-sm" data-toggle="collapse" data-target="#momo">Thanh toán</button>
            <button type="button" id="confirm_payment_momo" class="w-50 rounded-3 btn btn-primary btn-sm hide">Xác nhận (<span id="count"></span>)</button>
            <div class="mt-2"><small class="fw-semibold"><a href="/lich-su">Lịch sử giao dịch</a>
         </small>
      </div>
            <div class="mt-4"><small class="fw-semibold">
               Chức năng nạp tự động hiện chưa khả dụng, Tuy nhiên vẫn có thể chuyển khoản trực tiếp qua <a target="_blank" href="nap-tien" style="color: red;">momo</a>. Chỉ là duyệt tay thui mà hjx hjx
               <!--Lưu ý khi thanh toán: Giao dịch trên hoàn toàn được kiểm duyệt tự động, 
               yêu cầu kiểm tra kỹ nội dung chuyển tiền trước khi thực hiện chuyển. 
               Nếu ghi thiếu, sai hoặc quá 10 phút không thấy cộng tiền, 
               các bạn hãy liên hệ với <a target="_blank" href="https://www.facebook.com/" rel="noreferrer">Fanpage</a> để được hỗ trợ-->
            </small>
            </div>
         </div>
      </div>
   </div>
</div>

<?php
$userValue = $_user; // Lấy giá trị từ biến $_user
?>
      

<script>
   (function () {
   'use strict'
      var selected = -1;
      $("#list_amt div.recharge-method-item").each(function() {
         var item = this;
         item.addEventListener("click", function() {
            event.preventDefault();
            console.log($("#list_amt div.recharge-method-item").index(this))
            selected = $("#list_amt div.recharge-method-item").index(this)
            $("#list_amt div.recharge-method-item").removeClass("active")
            $("#list_amt div.recharge-method-item").addClass("false")
            $(this).removeClass("false")
            $(this).addClass("active")
         })
      })
      var btnPaymentMomo = $("button#payment_momo");
      var btnConfirmPaymentMomo = $("button#confirm_payment_momo");
      var spanCountdown = $("button#confirm_payment_momo span#count");
      var infoPaymentMomo = $("div#momo_info");
      var err = $("#noti");
      var counter = 60;
      btnPaymentMomo.click(() => {
         if(selected >= 0){
            err.addClass("hide");
            $("#list_amt").addClass('hide');
            $("#list").addClass('hide');
            var data = {
               coin: selected,
            };
            if (selected == 0) {
               infoPaymentMomo.append('<div>'+
                                       '<div class="table-responsive-sm">'+
                                          '<table class="fw-semibold mt-3 table">'+
                                             '<tbody>'+
                                                '<tr>'+
                                                   '<td>Chủ tài khoản</td>'+
                                                   '<td>TRAN VAN DUC</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Số điện thoại</td>'+
                                                   '<td>0931353598</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Số tiền</td>'+
                                                   '<td>10.000đ</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Nội dung</td>'+
                                                   '<td><?php echo $userValue; ?></td>'+
                                                '</tr>'+
                                             '</tbody>'+
                                          '</table>'+
                                       '</div>'+
                                       '<div class="text-center fw-semibold fs-5">Quét mã để thanh toán</div>'+
                                       '<div class="text-center mt-2">'+
                                          '<img src="#" alt="">'+
                                       '</div>'+
                                    '</div>')
            } else if (selected == 1) {   
               infoPaymentMomo.append('<div>'+
                                       '<div class="table-responsive-sm">'+
                                          '<table class="fw-semibold mt-3 table">'+
                                             '<tbody>'+
                                                '<tr>'+
                                                   '<td>Chủ tài khoản</td>'+
                                                   '<td>TRAN VAN DUC</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Số điện thoại</td>'+
                                                   '<td>0931353598</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Số tiền</td>'+
                                                   '<td>50.000đ</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Nội dung</td>'+
                                                   '<td><?php echo $userValue; ?></td>'+
                                                '</tr>'+
                                             '</tbody>'+
                                          '</table>'+
                                       '</div>'+
                                       '<div class="text-center fw-semibold fs-5">Quét mã để thanh toán</div>'+
                                       '<div class="text-center mt-2">'+
                                          '<img src="#" alt="">'+
                                       '</div>'+
                                    '</div>')
            } else if (selected == 2) {   
               infoPaymentMomo.append('<div>'+
                                       '<div class="table-responsive-sm">'+
                                          '<table class="fw-semibold mt-3 table">'+
                                             '<tbody>'+
                                                '<tr>'+
                                                   '<td>Chủ tài khoản</td>'+
                                                   '<td>TRAN VAN DUC</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Số điện thoại</td>'+
                                                   '<td>0931353598</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Số tiền</td>'+
                                                   '<td>100.000đ</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Nội dung</td>'+
                                                   '<td><?php echo $userValue; ?></td>'+
                                                '</tr>'+
                                             '</tbody>'+
                                          '</table>'+
                                       '</div>'+
                                       '<div class="text-center fw-semibold fs-5">Quét mã để thanh toán</div>'+
                                       '<div class="text-center mt-2">'+
                                          '<img src="#" alt="">'+
                                       '</div>'+
                                    '</div>')
            } else if (selected == 3) {   
               infoPaymentMomo.append('<div>'+
                                       '<div class="table-responsive-sm">'+
                                          '<table class="fw-semibold mt-3 table">'+
                                             '<tbody>'+
                                                '<tr>'+
                                                   '<td>Chủ tài khoản</td>'+
                                                   '<td>TRAN VAN DUC</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Số điện thoại</td>'+
                                                   '<td>0931353598</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Số tiền</td>'+
                                                   '<td>200.000đ</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Nội dung</td>'+
                                                   '<td><?php echo $userValue; ?></td>'+
                                                '</tr>'+
                                             '</tbody>'+
                                          '</table>'+
                                       '</div>'+
                                       '<div class="text-center fw-semibold fs-5">Quét mã để thanh toán</div>'+
                                       '<div class="text-center mt-2">'+
                                          '<img src="#" alt="">'+
                                       '</div>'+
                                    '</div>')
            } else if (selected == 4) {   
               infoPaymentMomo.append('<div>'+
                                       '<div class="table-responsive-sm">'+
                                          '<table class="fw-semibold mt-3 table">'+
                                             '<tbody>'+
                                                '<tr>'+
                                                   '<td>Chủ tài khoản</td>'+
                                                   '<td>TRAN VAN DUC</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Số điện thoại</td>'+
                                                   '<td>0931353598</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Số tiền</td>'+
                                                   '<td>500.000đ</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Nội dung</td>'+
                                                   '<td><?php echo $userValue; ?></td>'+
                                                '</tr>'+
                                             '</tbody>'+
                                          '</table>'+
                                       '</div>'+
                                       '<div class="text-center fw-semibold fs-5">Quét mã để thanh toán</div>'+
                                       '<div class="text-center mt-2">'+
                                          '<img src="#" alt="">'+
                                       '</div>'+
                                    '</div>')
            } else if (selected == 5) {   
               infoPaymentMomo.append('<div>'+
                                       '<div class="table-responsive-sm">'+
                                          '<table class="fw-semibold mt-3 table">'+
                                             '<tbody>'+
                                                '<tr>'+
                                                   '<td>Chủ tài khoản</td>'+
                                                   '<td>TRAN VAN DUC</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Số điện thoại</td>'+
                                                   '<td>0931353598</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Số tiền</td>'+
                                                   '<td>1.000.000đ</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Nội dung</td>'+
                                                   '<td><?php echo $userValue; ?></td>'+
                                                '</tr>'+
                                             '</tbody>'+
                                          '</table>'+
                                       '</div>'+
                                       '<div class="text-center fw-semibold fs-5">Quét mã để thanh toán</div>'+
                                       '<div class="text-center mt-2">'+
                                          '<img src="#" alt="">'+
                                       '</div>'+
                                    '</div>')
            } else if (selected == 6) {   
               infoPaymentMomo.append('<div>'+
                                       '<div class="table-responsive-sm">'+
                                          '<table class="fw-semibold mt-3 table">'+
                                             '<tbody>'+
                                                '<tr>'+
                                                   '<td>Chủ tài khoản</td>'+
                                                   '<td>TRAN VAN DUC</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Số điện thoại</td>'+
                                                   '<td>0931353598</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Số tiền</td>'+
                                                   '<td>2.000.000đ</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Nội dung</td>'+
                                                   '<td><?php echo $userValue; ?></td>'+
                                                '</tr>'+
                                             '</tbody>'+
                                          '</table>'+
                                       '</div>'+
                                       '<div class="text-center fw-semibold fs-5">Quét mã để thanh toán</div>'+
                                       '<div class="text-center mt-2">'+
                                          '<img src="#" alt="">'+
                                       '</div>'+
                                    '</div>')
            } else if (selected == 7) {   
               infoPaymentMomo.append('<div>'+
                                       '<div class="table-responsive-sm">'+
                                          '<table class="fw-semibold mt-3 table">'+
                                             '<tbody>'+
                                                '<tr>'+
                                                   '<td>Chủ tài khoản</td>'+
                                                   '<td>TRAN VAN DUC</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Số điện thoại</td>'+
                                                   '<td>0931353598</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Số tiền</td>'+
                                                   '<td>5.000.000đ</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Nội dung</td>'+
                                                   '<td><?php echo $userValue; ?></td>'+
                                                '</tr>'+
                                             '</tbody>'+
                                          '</table>'+
                                       '</div>'+
                                       '<div class="text-center fw-semibold fs-5">Quét mã để thanh toán</div>'+
                                       '<div class="text-center mt-2">'+
                                          '<img src="#" alt="">'+
                                       '</div>'+
                                    '</div>')
            } else {   
               infoPaymentMomo.append('<div>'+
                                       '<div class="table-responsive-sm">'+
                                          '<table class="fw-semibold mt-3 table">'+
                                             '<tbody>'+
                                                '<tr>'+
                                                   '<td>Chủ tài khoản</td>'+
                                                   '<td>TRAN VAN DUC</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Số điện thoại</td>'+
                                                   '<td>0931353598</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Số tiền</td>'+
                                                   '<td>10.000.000đ</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                   '<td>Nội dung</td>'+
                                                   '<td><?php echo $userValue; ?></td>'+
                                                '</tr>'+
                                             '</tbody>'+
                                          '</table>'+
                                       '</div>'+
                                       '<div class="text-center fw-semibold fs-5">Quét mã để thanh toán</div>'+
                                       '<div class="text-center mt-2">'+
                                          '<img src="#" alt="">'+
                                       '</div>'+
                                    '</div>')
            }

            btnPaymentMomo.addClass("hide");
            btnConfirmPaymentMomo.removeClass("hide");
            counter = 60;
            setInterval(function() {
               counter--;
               if (counter >= 0) {
                  spanCountdown.html(counter);
               }
               if (counter === 0) {
                  // $("div#momo_info").empty();
                  btnPaymentMomo.removeClass("hide");
                  btnConfirmPaymentMomo.addClass("hide");
                  clearInterval(counter);
               }
            }, 1000);
         } else {
            err.removeClass("hide");
         }
         
      });

      btnConfirmPaymentMomo.click(() => {
         $("#list_amt").removeClass('hide');
         $("#list").removeClass('hide');
         infoPaymentMomo.addClass('hide');
         btnPaymentMomo.removeClass("hide");
         btnConfirmPaymentMomo.addClass("hide");
         window.location.reload();
      })
   })()
</script>

</div>
</div>
<!--
<main class="flex-grow-1 flex-shrink-1">
</br>
	<div class="container">

		<div class="card border-bottom-0 mb-3">
			<?php echo $_alert; ?>
			<div class="card-header">Chọn phương thức nạp</div>
			<div class="accordion" id="topupList">
				<div class="list-group list-group-flush">
					<button type="button" class="list-group-item list-group-item-action">
						<div class="d-flex align-items-center" data-toggle="collapse" data-target="#momo">
							<div class="mr-3"><img src="/img/ic-momo.png" width="40"></div>
							<div>
								<div class="h6 mb-1">Nạp qua ví MoMo</div>
								<div class="small">Nạp tự động với Momo, hoàn thành trong 1-3 phút. Không chiết khấu</div>
							</div>
						</div>
					</button>
					<div id="momo" class="collapse" data-parent="#topupList">
						<div class="card-body border-bottom">
							<h4>Cách 1: Nạp qua tin nhắn</h4>
							<p><i>1.</i> Đăng nhập ví Momo - Chọn số tiền bạn muốn nạp vào tài khoản</p>
							<p><i>2.</i> Nhập lời nhắn: <b style="color:blue;"><?php echo $w_cuphap_momo.' '.$_username; ?></b> (* Kiểm tra kĩ lời nhắn, nếu sai vui lòng liên hệ admin để được giải quyết.)</p>
							<p><i>3.</i> Chuyển số tiền bạn muốn nạp tới số <b style="color:red;"><?php echo $_phonemomo; ?></b></p>
							<p><i>Khi chuyển tiền xong làm mới trang sau 1 - 3 phút để cập nhật Coin.</i></p>
							<h4>Cách 2: Quét mã QR</h4>
							<center>
								<img src="<?php echo $_qrmomo; ?>" style="max-width: 200px;">
								<p style="font-size: 12px;">Quét mã QR trên, nhập số tiền bạn cần nạp và nhập lời nhắn <b style="color:blue;"><?php echo $w_cuphap_momo.' '.$_username; ?></b> </p>
							</center>
							<p><i>Khi chuyển tiền xong làm mới trang sau 1 - 3 phút để cập nhật Coin.</i></p>
						</div>
					</div>
				</div>-->
				
				<!-- code nạp thẻ -->

				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>

				<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.all.js"></script>

				<!--<script>
					$(document).ready(function(){
						$('#napthe').click(function() {
							
							$('#napthe').html('Đang thực hiện...');
							$('#napthe').prop('disabled', true);
							var formData = {
								'namenap': "<?=$_username;?>",
								'serial'              : $('input[name=cardSerial]').val(),
								'code'              : $('input[name=cardCode]').val(),
								'telco'              : $('select[name=cardType]').val(),
								'amount'              : $('select[name=cardAmount]').val(),
							};
							$.post("/shopluong_api.php", formData,
								function (data) {
									if(data.status == '1'){
										swal('Thông báo', data.msg, 'error');
										$('#napthe').html('Nạp ngay');
										$('#napthe').prop('disabled', false);
									}else{
			     swal('Thông báo', data.msg, 'success');
			     $('#napthe').html('Nạp ngay');
			     $('#napthe').prop('disabled', false);
			 }
			}, "json");
						});
					});

				</script>
				<div class="list-group list-group-flush">
					<button type="button" class="list-group-item list-group-item-action">
						<div class="d-flex align-items-center" data-toggle="collapse" data-target="#card">
							<div class="mr-3"><img src="/img/ic-telco.png" width="40"></div>
							<div>
								<div class="h6 mb-1">Nạp qua thẻ cào</div>
								<div class="small">Nạp qua thẻ cào, hoàn thành trong 3-5 phút. Phí giao dịch 20-30%.</div>
							</div>
						</div>
					</button>
					<div id="card" class="collapse " data-parent="#topupList">
						<div class="card-body border-bottom">
							<form action="/topup.php?act=card" method="post">
								<div class="form-group">
									<label class="font-weight-bolder" for="cardType">Loại thẻ</label>
									<select id="cardType" name="cardType" class="form-control " required>
										<option value="">Chọn loại thẻ</option>
										<option value="VIETTEL">VIETTEL</option>
										<option value="MOBIFONE">MOBIFONE</option>
										<option value="VINAPHONE">VINAPHONE</option>
									</select>
								</div>
								<div class="form-group">
									<label class="font-weight-bolder" for="cardAmount">Mệnh giá</label>
									<select id="cardAmount" name="cardAmount" class="form-control " required>
										<option value="">Chọn mệnh giá</option>
										<option value="10000">10,000 - Nhận 7,500 DCoin</option>
										<option value="20000">20,000 - Nhận 15,000 DCoin</option>
										<option value="50000">50,000 - Nhận 40,000 DCoin</option>
										<option value="100000">100,000 - Nhận 75,000 DCoin</option>
										<option value="200000">200,000 - Nhận 150,000 DCoin</option>
										<option value="300000">300,000 - Nhận 225,000 DCoin</option>
										<option value="500000">500,000 - Nhận 375,000 DCoin</option>
										<option value="1000000">1,000,000 - Nhận 750,000 DCoin</option>
									</select>
									<small id="emailHelp" class="form-text text-muted">Chọn sai mệnh giá mất thẻ và không được cộng tiền.</small>
								</div>
								<div class="form-group">
									<label class="font-weight-bolder" for="cardSerial">Mã serial</label>
									<input type="text" name="cardSerial" class="form-control " id="cardSerial" value="" placeholder="Nhập mã serial" required>
								</div>
								<div class="form-group">
									<label class="font-weight-bolder" for="cardCode">Mã thẻ</label>
									<input type="text" name="cardCode" class="form-control " id="cardCode" value="" placeholder="Nhập mã thẻ" required>
								</div>
								<button id="napthe" type="submit" class="btn btn-info btn-block-primary">Nạp thẻ</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>-->
		<?php
		
	/*	function get_string_tinhtrangthe($tinhtrangthe) {
			switch ($tinhtrangthe) {
				case 0:
				$str = '<span class="btn btn-warning form-fontrol">Chờ xử lý</span>';
				break;
				case 1:
				$str = '<span class="btn btn-success form-fontrol">Nạp Thành Công</span>';
				break;
				case 2:
				$str = '<div class="btn" style="background-color:red;color:#fff; ">Thẻ Sai</div>';
				break;
				default:
				$str = '<span class="btn btn-danger form-fontrol">Lỗi Chưa Xác Định</span>';
				break;
			}
			return $str;
		}
		?>
		<div class="card mb-3">
			<div class="card-header">Lịch sử nạp Coin</div>
			<div class="py-3 text-center">
			<div class="table-responsive">
            	<table class="table table-bordered table-hover">
						<tr>
							<th>ID</th>
							<th>LOẠI</th>
							<th>TRẠNG THÁI</th>
							<th>MỆNH GIÁ</th>
							<th>THỜI GIAN</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$data = _query(_select("*","naptien","uid='$_username' ORDER BY id DESC"));
						while($row = mysqli_fetch_array($data))
						{
								?>

								<tr>
									<td><?php echo htmlspecialchars($row['id']); ?></td>
									<td><?php echo htmlspecialchars($row['loaithe']); ?></td>
									<td><?php echo get_string_tinhtrangthe($row['tinhtrang']); ?></td>
									<td><?php echo number_format($row['sotien']);?> đ</td>
									<td><?php echo date("H:i - d/m/Y", $row['time']); ?></td>
								</tr>

							<?php }
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

			<div class="modal fade" id="modalMomo" data-backdrop="static" data-keyboard="false" tabindex="-1">
				<div class="modal-dialog modal-lg modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h6 class="modal-title">Ví MoMo</h6>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form id="checkResultMomo" action="#" method="post">
								
							</form>
							<div class="row">
								<div class="col-md-5 text-center mb-3">
									<img id="momoQRCode" class="d-block mw-100 mx-auto" src="" width="240" alt="Mã QRCode Momo">
									<div class="mt-2">Nội dung chuyển tiền: <span id="momoContent" class="font-weight-bold text-warning"></span></div>
								</div>
								<div class="col-md-7">
									<p><b>Thực hiện theo hướng dẫn sau để thanh toán:</b></p>
									<p>Bước 1: Mở ứng dụng <b>Ví MoMo</b></p>
									<p>Bước 2: Chọn "Quét mã"  và quét mã QR code đơn nạp</p>
									<p>Bước 3: Chuyển đúng số tiền cần nạp và nhập nội dung chuyển tiền dưới mã QR</p>
									<p>Sau khi hoàn tất chuyển khoản, vui lòng nhấp vào "Đã chuyển tiền" bên dưới để hệ thống kiểm tra. Quá 30 phút vẫn không được cộng tiền vui lòng báo cho Admin để được xử lý.</p>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button id="checkMomo" type="button" class="btn btn-primary">Đã chuyển tiền</button>
						</div>
					</div>
				</div>
			</div>
			<?php*/

include_once 'end.php';
?>
		</div>
	</main>
