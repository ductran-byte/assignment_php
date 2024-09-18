<?php
ob_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include_once 'cauhinh.php';
include_once 'config.php';
include_once 'set.php';
//$read_sql = _fetch(_select("*", 'isplayer', "username='$_user'"));
// $_coin = $read_sql['coin'];
$_active = isset($_active) ? $_active : null;

?>
<?php
$id = 1;

$sql = "SELECT social, link FROM linksocialnetwork WHERE id = $id";

$result = mysqli_query($config, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $loai = $row['social'];
            $lienket = $row['link'];


        }
    } else {
        echo "Không có kết quả.";
    }
} else {
    echo "Lỗi truy vấn: " . mysqli_error($config, $sql);
}
?>


<?php if ($_login == null) { ?>
    <?php
    $read_sql = _fetch(_select("*", 'isplayer', "username='$_user'"));
    ?>
    <!--phù phiếm-->
<?php } else { ?>


    <?php
    $read_sql = _fetch(_select("*", 'isplayer', "username='$_user'"));
    $_coin = $read_sql['coin'];
    ?>
<?php } ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="images/hmod.png">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="theme-color" content="#000000">
    <meta name="title" content="Ninja BOBA - Ninja School Online">
    <meta name="description" content="Ninja BOBA - Tham gia trường học ninja để trở thành một nhẫn giả">
    <meta name="keywords"
          content="Nso, ninja, ninja school, ninja school online, nsocan, ninja lậu, nsoz, nsoplus, nsoeco, eco, Ninja BOBA">
    <meta name="author" content="Ninja BOBA">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://NSOBOBA.XYZ/">
    <meta property="og:title" content="Ninja BOBA - Ninja School Online">
    <meta property="og:description" content="Tham gia trường học ninja để trở thành một nhẫn giả thực thụ">
    <meta property="og:image" content="thumbnail.png">
    <meta property="og:image:alt" content="NSOBOBA.XYZ">
    <link rel="apple-touch-icon" href="logo12.png">
    <link rel="manifest" href="manifest.json">
    <title>Ninja BOBA - Ninja School Online</title>
    <script defer="defer" src="static/js/main.e3a7ead0.js"></script>
    <link href="static/css/main.6c29eda0.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles1.css">
    <link rel="stylesheet" type="text/css" href="css/styles2.css">

    <!-- Bootstrap core CSS -->

    <!--   <script src="/js/notice1.js"></script>
       <script src="/js/notice2.js"></script>
       <script src="static/js/jquery.min.js"></script>
       <script language="javascript" src="https://code.jquery.com/jquery-2.0.0.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.min.js"></script>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.min.css">-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!--<style>
        html {
        font-size: 14px;
        }
        @media (min-width: 768px) {
        html {
        font-size: 16px;
        }
        }
        .container {
        max-width: 960px;
        }
        .pricing-header {
        max-width: 700px;
        }
        .card-deck .card {
        min-width: 220px;
        }
        .border-top {
        border-top: 1px solid #e5e5e5;
        }
        .border-bottom {
        border-bottom: 1px solid #e5e5e5;
        }
        .box-shadow {
        box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
        }



     </style>-->
</head>
<body>
<div id="root">
    <div class="container">
        <div class="main">
            <div class="text-center card">
                <div class="card-body">
                    <div class="">
                        <a href="/">
                            <img class="logo" alt="Logo" src="images/logo12.png" style="max-width: 250px;">
                        </a>
                    </div>
                    <div class="mt-3">
                        <div class="mt-3">
                            <?php if ($_login == null) { ?>

                            <?php include_once 'login.php' ?>
                        </div>
                        <div class="mt-3">
                            <a class="mb-3 px-2 py-1 fw-semibold text-danger bg-danger bg-opacity-25 border border-danger border-opacity-50 rounded-2 cursor-pointer"
                               href="/download">
                                TẢI GAME
                                <svg fill="#000000" height="800px" width="800px" version="1.1" id="Capa_1"
                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     viewBox="0 0 29.978 29.978" xml:space="preserve" class="download-icon">
              <g>
                  <path d="M25.462,19.105v6.848H4.515v-6.848H0.489v8.861c0,1.111,0.9,2.012,2.016,2.012h24.967c1.115,0,2.016-0.9,2.016-2.012
                    v-8.861H25.462z"></path>

                  <path d="M14.62,18.426l-5.764-6.965c0,0-0.877-0.828,0.074-0.828s3.248,0,3.248,0s0-0.557,0-1.416c0-2.449,0-6.906,0-8.723
                    c0,0-0.129-0.494,0.615-0.494c0.75,0,4.035,0,4.572,0c0.536,0,0.524,0.416,0.524,0.416c0,1.762,0,6.373,0,8.742
                    c0,0.768,0,1.266,0,1.266s1.842,0,2.998,0c1.154,0,0.285,0.867,0.285,0.867s-4.904,6.51-5.588,7.193
                    C15.092,18.979,14.62,18.426,14.62,18.426z"></path>
              </g>

           </svg>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="row text-center justify-content-center row-cols-2 row-cols-lg-6 g-2 g-lg-2 mt-1">
                    <div class="col">
                        <div class="px-2"><a class="btn btn-menu btn-success w-100 fw-semibold false" href="/">Trang
                                chủ</a></div>
                    </div>
                    <div class="col">
                        <div class="px-2">
                            <a class="btn btn-menu btn-success w-100 fw-semibold false" data-bs-toggle="modal"
                               data-bs-target="#modalLogin">Nạp tiền</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="px-2">
                            <a class="btn btn-menu btn-success w-100 fw-semibold false" data-bs-toggle="modal"
                               data-bs-target="#modalLogin">Cửa hàng</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="px-2">
                            <a class="btn btn-menu btn-success w-100 fw-semibold false" data-bs-toggle="modal"
                               data-bs-target="#modalLogin">Đổi lượng</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="px-2"><a class="btn btn-menu btn-success w-100 fw-semibold false"
                                             href="<?php echo $lienket ?>">Box Zalo</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <a class="mb-3 px-2 py-1 fw-semibold text-dark bg-success bg-opacity-25 border border-success border-opacity-75 rounded-2 link-success cursor-pointer"
               href="/user">
                <span><?php echo $_username . ' - ' . $_coin . ' C'; ?> </span>
            </a><span>&nbsp;</span><a
                    class="mb-3 px-2 py-1 fw-semibold text-dark bg-success bg-opacity-25 border border-success border-opacity-75 rounded-2 link-success cursor-pointer"
                    href="/?out"><span>Đăng xuất</span></a>
        </div>
        <?php

        if ($_lock == "wait") {
            echo '<div class="mt-2"><small class="text-danger fw-semibold mt-3">Tài khoản của bạn chưa được kích hoạt, click vào phía dưới để kích hoạt.</small></div><div class="mt-2"> <span class="mb-3 px-2 py-1 fw-semibold text-secondary bg-danger bg-opacity-25 border border-danger border-opacity-75 rounded-2 link-success cursor-pointer" data-bs-toggle="modal" data-bs-target="#modalActive">Kích hoạt tài khoản</span></div>';
        } elseif ($_lock == "block") {
            echo '<div class="mt-2"><small class="text-danger fw-semibold mt-3">Tài Khoản Của Bạn Đang Bị Khóa</small></div><div class="mt-2"> <span class="mb-3 px-2 py-1 fw-semibold text-secondary bg-danger bg-opacity-25 border border-danger border-opacity-75 rounded-2 link-success cursor-pointer" data-bs-toggle="modal" data-bs-target="#modalUnlock">Mở Khóa Tài Khoản</span></div>';
        }
        ?>
        <div class="mt-3">
            <a class="mb-3 px-2 py-1 fw-semibold text-danger bg-danger bg-opacity-25 border border-danger border-opacity-50 rounded-2 cursor-pointer"
               href="/download">
                TẢI GAME
                <svg fill="#000000" height="800px" width="800px" version="1.1" id="Capa_1"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     viewBox="0 0 29.978 29.978" xml:space="preserve" class="download-icon">
              <g>
                  <path d="M25.462,19.105v6.848H4.515v-6.848H0.489v8.861c0,1.111,0.9,2.012,2.016,2.012h24.967c1.115,0,2.016-0.9,2.016-2.012
                    v-8.861H25.462z"></path>

                  <path d="M14.62,18.426l-5.764-6.965c0,0-0.877-0.828,0.074-0.828s3.248,0,3.248,0s0-0.557,0-1.416c0-2.449,0-6.906,0-8.723
                    c0,0-0.129-0.494,0.615-0.494c0.75,0,4.035,0,4.572,0c0.536,0,0.524,0.416,0.524,0.416c0,1.762,0,6.373,0,8.742
                    c0,0.768,0,1.266,0,1.266s1.842,0,2.998,0c1.154,0,0.285,0.867,0.285,0.867s-4.904,6.51-5.588,7.193
                    C15.092,18.979,14.62,18.426,14.62,18.426z"></path>
              </g>

           </svg>

            </a>
        </div>
    </div>
</div>
</div>
<div class="mb-2">
    <div class="row text-center justify-content-center row-cols-2 row-cols-lg-6 g-2 g-lg-2 mt-1">
        <div class="col">
            <div class="px-2"><a class="btn btn-menu btn-success w-100 fw-semibold false" href="/">Trang chủ</a>
            </div>
        </div>
        <div class="col">
            <div class="px-2">
                <a class="btn btn-menu btn-success w-100 fw-semibold false" href="/nap-tien">Nạp tiền</a>
            </div>
        </div>
        <div class="col">
            <div class="px-2">
                <a class="btn btn-menu btn-success w-100 fw-semibold false" href="/cua-hang-tien-loi">Cửa hàng</a>
            </div>
        </div>
        <div class="col">
            <div class="px-2">
                <a class="btn btn-menu btn-success w-100 fw-semibold false" href="/exchange">Đổi lượng</a>
            </div>
        </div>
        <div class="col">
            <div class="px-2"><a class="btn btn-menu btn-success w-100 fw-semibold false" href="<?php echo $lienket ?>">Box
                    Zalo</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<div class="modal fade" id="modalActive" tabindex="-1" aria-labelledby="modalActiveLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="my-2">
                    <div class="text-center"><a href="index.html"><img class="logo" alt="Logo" src="images/logo12.png"
                                                                       style="max-width: 250px;"></a></div>
                </div>
                <div class="text-center fw-semibold">
                    <div class="fs-6 mb-2">Xác nhận kích hoạt tài khoản</div>
                    <div id="noti-active"></div>
                    <span>Vui lòng thoát game trước khi xác nhận kích hoạt</span>
                    <span>Sau khi kích hoạt, bạn sẽ mở khóa các tính năng giao dịch</span>
                    <div class="text-success fw-bold">Phí kích hoạt: 10000 PCoin</div>
                    <div class="mt-2"><a type="submit" id="active" class="btn-rounded btn btn-primary btn-sm"
                                         href="/active">Kích hoạt ngay</a></div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUnlock" tabindex="-1" aria-labelledby="modalUnlockLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="my-2">
                    <div class="text-center"><a href="/"><img class="logo" alt="Logo" src="images/logo12.png"
                                                              style="max-width: 250px;"></a></div>
                </div>
                <div class="text-center fw-semibold">
                    <div class="fs-6 mb-2">Để mở khóa tài khoản</div>
                    <div id="noti-active"></div>
                    <span>Bạn cần liên hệ <a class="text-success fw-bold" href="<?php echo $lienket ?>">Admin</a> để được hỗ trợ.</span>
                    <span>Bạn phải làm cái gì thì mới bị khóa chứ, Đúng không</span>
                    <!--<div class="text-success fw-bold">Phí kích hoạt: 10000 PCoin</div>-->
                    <div class="mt-2"><a type="submit" id="active" class="btn-rounded btn btn-primary btn-sm"
                                         href="<?php echo $lienket ?>">Thanh minh với Admin</a></div>

                </div>
            </div>
        </div>
    </div>
</div>
<div z-index="1" class="modal fade" id="modalForgotPass" tabindex="-1" aria-labelledby="modalForgotPassLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="my-2">
                    <div class="text-center"><a href="home.php"><img class="logo" alt="Logo" src="images/logo12.png"
                                                                     style="max-width: 250px;"></a></div>
                </div>
                <form method="post" class="py-3 mx-3 needs-validation" id="forgotpass">
                    <div class="mt-2"><a class="text-danger fw-semibold mt-3">Tính năng lấy lại tài khoản hiện đang bảo
                            trì, Vui lòng liên hệ <a class="text-success fw-bold"
                                                     href="<?php echo $lienket ?>">Admin</a> <a
                                    class="text-danger fw-semibold mt-3">nhé!</a></a></div>
                    <div class="mb-2 tuan1">
                        <label class="fw-semibold">Tên đăng nhập</label>
                        <div class="input-group"><input name="username" id="username" type="text" autocomplete="off"
                                                        placeholder="Nhập tên đăng nhập"
                                                        class="form-control form-control-solid" value=""></div>
                    </div>
                    <div class="mb-2 tuan1">
                        <label class="fw-semibold">Địa chỉ mail đăng ký</label>
                        <div class="input-group"><input name="fmail" id="fmail" type="email" autocomplete="off"
                                                        placeholder="Nhập địa chỉ mail đăng ký"
                                                        class="form-control form-control-solid" value=""></div>
                    </div>
                    <div class="mb-2">
                        <label class="fw-semibold">Mã OTP</label>
                        <div class="input-group"><input name="fcode" id="fcode" type="text" autocomplete="off"
                                                        placeholder="Nhập mã OTP đã nhận"
                                                        class="form-control form-control-solid" maxlength="6" value="">
                            <a class="btn btn-danger" href="javascript:void(0)" onclick="sendOTP();" type="button">Gửi
                                mã OTP</a></div>
                    </div>
                    <!-- <div class="mb-2 tuan2">
                       <label class="fw-semibold">Số điện thoại đăng ký</label>
                       <div class="input-group"><input name="fphone" id="fphone" type="text" autocomplete="off" placeholder="Nhập số điện thoại đăng ký" class="form-control form-control-solid" value=""></div>
                    </div> -->
                    <!-- <div class="d-flex justify-content-center tuan3"><div id="recaptcha-container"></div></div> -->
                    <!-- <div class="mb-2">
                       <label class="fw-semibold">Mã OTP</label>
                       <div class="input-group"><input name="fcode" id="fcode" type="text" autocomplete="off" placeholder="Nhập mã OTP đã nhận" class="form-control form-control-solid" pattern="\d*" maxlength="6" value="">
                       <a class="btn btn-danger" href="javascript:void(0)" onclick="sendOTP();" type="button">Gửi mã OTP</a></div>
                    </div> -->
                    <!-- <div style="margin-top: -10px;"></div> -->
                    <div class="text-center mt-3">
                        <!--<button type="submit" class="me-3 btn btn-primary" href="https://zalo.me/0342163040">Xác nhận</button>-->
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Hủy bỏ
                        </button>
                        <div class="pt-3">Bạn đã có tài khoản? <a data-bs-toggle="modal" data-bs-target="#modalLogin"
                                                                  class="link-primary cursor-pointer">Đăng nhập ngay</a>
                        </div>
                    </div>
                </form>
                <form method="post" class="py-3 mx-3 needs-validation" id="changePass">
                </form>
            </div>
        </div>
    </div>
</div>


<script src="static/js/jquery.min.js"></script>
<script src="static/js/popper.min.js"></script>
<script src="static/js/bootstrap.min.js"></script>
