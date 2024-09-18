<?php
global $_login, $config;
include_once 'set.php';


$alert = null;

if ($_login == null) {
    if (isset($_POST['username'])) {
        $user = htmlspecialchars($_POST['username']);
        $pass = htmlspecialchars($_POST['password']);
        $select = _fetch(_select("*", 'isplayer', "username='$user'"));

        if (mysqli_num_rows(mysqli_query($config, "SELECT * FROM `isplayer` WHERE `username` = '$user'")) == 0) {
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    var modal = document.getElementById("loginFailModal");
                    var modalContent = document.getElementById("loginFailModalContent");
                    modalContent.innerHTML = "Tài khoản này không có";
                    modal.style.display = "block";
                });
            </script>';
        } else {
            if ($select['password'] == $pass) {
                $_SESSION['user'] = $user;
                header('location:/');
            } else {
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var modal = document.getElementById("loginFailModal");
                        var modalContent = document.getElementById("loginFailModalContent");
                        modalContent.innerHTML = "Thông tin đăng nhập không chính xác!";
                        modal.style.display = "block";
                    });
                </script>';
            }
        }
    }
} else {
    header("location:/");
}


$_alert = null;
if ($_login == null) {
    if (isset($_POST['regname'])) {
        // Lấy giá trị tài khoản và mật khẩu từ biểu mẫu
        $users = isset_sql($_POST['regname']);
        $pass = isset_sql($_POST['regpass']);
        $repass = isset_sql($_POST['regrepass']);
        //  $email = isset_sql($_POST['email']);
        $phone = isset_sql($_POST['regphone']); // Lấy giá trị số điện thoại từ biểu mẫu
        //    $captcha = $_POST['g-recaptcha-response'];//captcha

        // Kiểm tra tài khoản chỉ chứa chữ thường và không có chữ hoa
        if ($users !== strtolower($users) || !preg_match('/^[a-z0-9]{4,}$/', $users)) {
            $_alert = _alert('err', "Tài khoản không hợp lệ. Tài khoản chỉ được chứa ký tự chữ thường và số, ít nhất 4 ký tự.");
        } elseif ($pass == $repass) {
            // Kiểm tra mật khẩu chỉ chứa chữ thường và không có chữ hoa
            if ($pass !== strtolower($pass) || !preg_match('/^[a-z0-9]{4,}$/', $pass)) {
                $_alert = _alert('err', "Mật khẩu không hợp lệ. Mật khẩu chỉ được chứa ký tự chữ thường và số, ít nhất 4 ký tự.");
            } else {
                // Kiểm tra email đã tồn tại trong cơ sở dữ liệu hay chưa
                //    $emailCheckQuery = _select("COUNT(*) as emailCount", 'users', "email='$email'");
                //  $emailCheckResult = _fetch($emailCheckQuery);

                // Kiểm tra số điện thoại đã tồn tại trong cơ sở dữ liệu hay chưa
                $phoneCheckQuery = _select("COUNT(*) as phoneCount", 'isplayer', "phone='$phone'");
                $phoneCheckResult = _fetch($phoneCheckQuery);

                // Kiểm tra tài khoản đã tồn tại trong cơ sở dữ liệu hay chưa
                $usernameCheckQuery = _select("COUNT(*) as usernameCount", 'isplayer', "username='$users'");
                $usernameCheckResult = _fetch($usernameCheckQuery);

                //  if ($emailCheckResult['emailCount'] > 0) {
                //      $_alert = _alert('err', "Địa Chỉ Email Đã Tồn Tại. Vui Lòng Chọn Địa Chỉ Email Khác. Lưu ý rằng email sẽ dùng để lấy lại mật khẩu nếu quên!");
                if ($phoneCheckResult['phoneCount'] > 0) {
                    echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var modal = document.getElementById("regFailModal");
                        var modalContent = document.getElementById("regFailModalContent");
                        modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #ff0000;\">Số điện thoại đã tồn tại trên hệ thống</span>";
                        modal.style.display = "block";
                    });
                </script>';
                } elseif ($usernameCheckResult['usernameCount'] > 0) {
                    echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var modal = document.getElementById("regFailModal");
                        var modalContent = document.getElementById("regFailModalContent");
                        modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #ff0000;\">Tài khoản đã tồn tại, Vui lòng chọn tài khoản khác.</span>";
                        modal.style.display = "block";
                    });
                </script>';
                } //trường hợp test trên local

                else {
                    $ngayThamGia = date("Y-m-d H:i:s");


                    $txt = _insert('isplayer', "username, password, coin, luong, status, phone, ngaythamgia, nhomkhachhang", "'$users', '$pass', '11000', '0', 'wait', '$phone', '$ngayThamGia', '0'");
                    $kiemtra = _query($txt);
                    if ($kiemtra) {
                        echo '<script>
                           document.addEventListener("DOMContentLoaded", function() {
                               var modal = document.getElementById("regOK");
                               var modalContent = document.getElementById("regOKContent");
                               modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #198754;\">Đăng ký thành công</span>";
                               modal.style.display = "block";
                           });
                       </script>';
                    } else {
                        echo '<script>
                           document.addEventListener("DOMContentLoaded", function() {
                               var modal = document.getElementById("regFailModal");
                               var modalContent = document.getElementById("regFailModalContent");
                               modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #ff0000;\">Lỗi nặng, làm ơn liên hệ ngay với <span class="text-success fw-bold" href="echo $lienket">Admin</span></span>";
                               modal.style.display = "block";
                           });
                       </script>';
                    }
                }
            }
        } else {
            echo '<script>
               document.addEventListener("DOMContentLoaded", function() {
                   var modal = document.getElementById("regFailModal");
                   var modalContent = document.getElementById("regFailModalContent");
                   modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #ff0000;\">Mật khẩu nhập lại không khớp</span>";
                   modal.style.display = "block";
               });
           </script>';
        }
    }
} else {
    header('location:/account.php');
}
//end trường hợp test trên local
/*
else {


    $secret = '6Le3NDUoAAAAAP_9PTmj_ZFx6-E5ObTZ_-augn9K'; //Thay bằng mã Secret Key của bạn
    $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$captcha);
    $response_data = json_decode($verify_response);
    if($response_data->success)
    {
        $txt = _insert('isplayer', "username, password, coin, luong, status, phone", "'$users', '$pass', '99999999', '0', '1', '$phone'");
        $kiemtra = _query($txt);
        if ($kiemtra) {
            echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                var modal = document.getElementById("regOK");
                var modalContent = document.getElementById("regOKContent");
                modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #198754;\">Đăng ký thành công</span>";
                modal.style.display = "block";
            });
        </script>';
        } else {
            echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                var modal = document.getElementById("regFailModal");
                var modalContent = document.getElementById("regFailModalContent");
                modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #ff0000;\">Lỗi nặng, làm ơn liên hệ ngay với <span class="text-success fw-bold" href="echo $lienket">Admin</span></span>";
                modal.style.display = "block";
            });
        </script>';
        }
    }
    else
    {
        echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            var modal = document.getElementById("regFailModal");
            var modalContent = document.getElementById("regFailModalContent");
            modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #ff0000;\">Xác minh mã Captcha không thành công, vui lòng kiểm tra lại.</span>";
            modal.style.display = "block";
        });
    </script>';
    }

 //   $ngayThamGia = date("Y-m-d H:i:s");

    // Thêm tài khoản với status='wait', email và số điện thoại



}
}
} else {
echo '<script>
document.addEventListener("DOMContentLoaded", function() {
var modal = document.getElementById("regFailModal");
var modalContent = document.getElementById("regFailModalContent");
modalContent.innerHTML = "<span style=\"font-size: 18px; font-weight: bold; color: #ff0000;\">Mật khẩu nhập lại không khớp</span>";
modal.style.display = "block";
});
</script>';
}
}
} else {
header('location:/account.php');
}
*/

?>
<body>
<main class="flex-grow-1 flex-shrink-1">
    <!-- Modal HTML -->
    <div id="regOK" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <span class="close" onclick="closeRegOK()">&times;</span>
                <div class="modal-body text-center">
                    <a href="/"><img class="logo" alt="Logo" src="/images/logo12.png" style="max-width: 250px;"></a>
                    <h2>Đăng Ký thành công</h2>
                    <p id="regOKContent"></p>
                    <button class="modal-close-btn" onclick="closeRegOK()">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal HTML -->
    <div id="regFailModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <span class="close" onclick="closeRegFailModal()">&times;</span>
                <div class="modal-body text-center">
                    <a href="/"><img class="logo" alt="Logo" src="/images/logo12.png" style="max-width: 250px;"></a>
                    <h2>Đăng ký thất bại</h2>
                    <p id="regFailModalContent"></p>
                    <button class="modal-close-btn" onclick="closeRegFailModal()">OK</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal HTML -->
    <div id="loginFailModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <span class="close" onclick="closeLoginFailModal()">&times;</span>
                <div class="modal-body text-center">
                    <a href="/"><img class="logo" alt="Logo" src="/images/logo12.png" style="max-width: 250px;"></a>
                    <h2>Đăng nhập thất bại</h2>
                    <p id="loginFailModalContent"></p>
                    <button class="modal-close-btn" onclick="closeLoginFailModal()">OK</button>
                </div>
            </div>
        </div>
    </div>


    <script>

        function openRegOK() {
            var regOK = document.getElementById('regOK');
            regOK.style.display = 'block';
        }

        function closeRegOK() {
            var regOK = document.getElementById('regOK');
            regOK.style.display = 'none';
        }

        function openRegFailModal() {
            var regFailModal = document.getElementById('regFailModal');
            regFailModal.style.display = 'block';
        }

        function closeRegFailModal() {
            var regFailModal = document.getElementById('regFailModal');
            regFailModal.style.display = 'none';
        }

        function openLoginFailModal() {
            var loginFailModal = document.getElementById('loginFailModal');
            loginFailModal.style.display = 'block';
        }

        function closeLoginFailModal() {
            var loginFailModal = document.getElementById('loginFailModal');
            loginFailModal.style.display = 'none';
        }
    </script>


    <!--<main class="flex-grow-1 flex-shrink-1">

   <div class="container pb-5">
        <form class="form-signin" method="POST">
            <input type="hidden" name="_token" value="JEGpj39vMoqzUAPDoHWTY8Y4jJiy4t0mhPST9nds">
<br><h1 class="h3 mb-3 font-weight-normal text-center">Vui lòng đăng nhập</h1>
            <?php echo $alert; ?>
            <label class="sr-only">Tài khoản</label>
            <input type="text" class="form-control" placeholder="Tài khoản" required="" name="username">
            <label class="sr-only">Mật khẩu</label>
            <input type="password" class="form-control" placeholder="Mật khẩu" required="" name="password">
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember" value="forever"> Nhớ đăng nhập
                </label>
            </div>
            <button class="btn btn-info btn-block" type="submit">Đăng nhập</button>
            <div class="text-center pt-2">
                Bạn chưa có tài khoản? <a href="/register">Đăng ký ngay</a>
            </div>
        </form>-->

    <a class="mt-3" data-bs-toggle="modal" data-bs-target="#modalLogin"><span
                class="mb-3 px-2 py-1 fw-semibold text-dark bg-success bg-opacity-25 border border-success border-opacity-75 rounded-2 link-success cursor-pointer">Đăng nhập ngay ?</span></a>
    <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="my-2">
                        <div class="text-center"><a href="/"><img class="logo" alt="Logo" src="images/logo12.png"
                                                                  style="max-width: 250px;"></a></div>
                    </div>
                    <form action="#" method="post" class="py-3 mx-3 needs-validation" id="login" novalidate>

                        <?php echo $alert; ?>
                        <div class="mb-2">
                            <div class="input-group">
                                <input name="username" id="username" type="text" autocomplete="off"
                                       placeholder="Tên đăng nhập" class="form-control form-control-solid" value=""
                                       minlength="5" required>
                                <div class="invalid-feedback">Không được bỏ trống</div>
                            </div>

                        </div>
                        <div class="mb-2">
                            <div class="input-group">
                                <input name="password" id="password" type="password" autocomplete="off"
                                       placeholder="Mật khẩu" class="form-control form-control-solid" value=""
                                       minlength="5" required>
                                <div class="invalid-feedback">Không được bỏ trống</div>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="me-3 btn btn-primary">Đăng nhập</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Hủy
                                bỏ
                            </button>
                            <div class="pt-3">Bạn chưa có tài khoản? <a data-bs-toggle="modal"
                                                                        data-bs-target="#modalRegister"
                                                                        class="link-primary cursor-pointer">Đăng ký
                                    ngay</a></div>
                            <div><a data-bs-toggle="modal" data-bs-target="#modalForgotPass"
                                    class="link-primary cursor-pointer">Quên mật khẩu</a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!---->
    <div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="modalRegisterLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="my-2">
                        <div class="text-center"><a href="/"><img class="logo" alt="Logo" src="images/logo12.png"
                                                                  style="max-width: 250px;"></a></div>
                    </div>
                    <form action="#" method="post" class="py-3 mx-3 needs-validation" id="register">
                        <?php echo $_alert; ?><!--thông báo đăng ký-->
                        <div class="mb-2">
                            <label class="fw-semibold">Tên đăng nhập</label>
                            <div class="input-group"><input name="regname" id="regname" type="text" autocomplete="off"
                                                            placeholder="Nhập tên đăng nhập"
                                                            class="form-control form-control-solid" value=""
                                                            oninput="validateUsername(this)"></div>
                            <div class="invalid-feedback">Không được bỏ trống</div>
                        </div>
                        <div class="mb-2">
                            <label class="fw-semibold">Số điện thoại</label>

                            <div class="input-group"><input name="regphone" id="regphone" type="tel" autocomplete="off"
                                                            placeholder="Nhập số điện thoại" pattern="[0-9]+"
                                                            title="Số điện thoại chỉ được chứa số. Vui lòng không sử dụng ký tự đặc biệt."
                                                            class="form-control form-control-solid" value=""></div>
                            <div class="invalid-feedback">Không được bỏ trống</div>
                        </div>
                        <!-- <div class="mb-2">
                            <label class="fw-semibold">Địa chỉ mail</label>
                            <div class="input-group"><input name="email" id="email" type="email" autocomplete="off" placeholder="Nhập mail" class="form-control form-control-solid" value="@gmail.com"></div>
                                   <div class="invalid-feedback">Không được bỏ trống</div>
                         </div>-->
                        <div class="mb-2">
                            <label class="fw-semibold">Mật khẩu</label>
                            <div class="input-group"><input name="regpass" id="regpassregpass" type="password"
                                                            autocomplete="off" placeholder="Nhập mật khẩu"
                                                            class="form-control form-control-solid" value=""
                                                            oninput="validatePassword(this)"></div>
                            <div class="invalid-feedback">Không được bỏ trống</div>
                        </div>
                        <div class="mb-2">
                            <label class="fw-semibold">Nhập lại mật khẩu</label>
                            <div class="input-group"><input name="regrepass" id="regrepass" type="password"
                                                            autocomplete="off" placeholder="Nhập mật khẩu"
                                                            class="form-control form-control-solid" value=""
                                                            oninput="validatePassword(this)"></div>
                            <div class="invalid-feedback">Không được bỏ trống</div>
                        </div>
                        <!--captcha by HMOD-->
                        <!--   <div class="g-recaptcha" data-sitekey="6Le3NDUoAAAAADH2N_vnNYFKRbr7GNzJ5SGAZshE"></div>-->
                        <!--end_captcha by HMOD-->
                        <div class="text-center mt-3">
                            <button type="submit" class="me-3 btn btn-primary">Đăng ký</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Hủy
                                bỏ
                            </button>
                            <div class="pt-3">Bạn đã có tài khoản? <a data-bs-toggle="modal"
                                                                      data-bs-target="#modalLogin"
                                                                      class="link-primary cursor-pointer">Đăng nhập
                                    ngay</a></div>
                            <div><a data-bs-toggle="modal" data-bs-target="#modalForgotPass"
                                    class="link-primary cursor-pointer">Quên mật khẩu</a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function validateUsername(input) {
                // Sử dụng biểu thức chính quy để kiểm tra tài khoản
                var pattern = /^[a-z0-9]{4,}$/;
                var isValid = pattern.test(input.value);

                if (!isValid) {
                    input.setCustomValidity("Tài khoản không hợp lệ. Tài khoản chỉ được chứa ký tự chữ thường và số, ít nhất 4 ký tự và không có khoảng trắng.");
                } else {
                    input.setCustomValidity("");
                }
            }

            function validatePassword(input) {
                // Sử dụng biểu thức chính quy để kiểm tra mật khẩu
                var pattern = /^[a-z0-9]{4,}$/;
                var isValid = pattern.test(input.value);

                if (!isValid) {
                    input.setCustomValidity("Mật khẩu không hợp lệ. Mật khẩu chỉ được chứa ký tự chữ thường và số, ít nhất 4 ký tự và không có khoảng trắng.");
                } else {
                    input.setCustomValidity("");
                }
            }

        </script>

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
        <!--       .form-signin {
                   width: 100%;
                   max-width: 400px;
                   padding: 15px;
                   margin: 0 auto;
               }

               .form-signin .checkbox {
                   font-weight: 400;
               }

               .form-signin .form-control {
                   position: relative;
                   box-sizing: border-box;
                   height: auto;
                   padding: 10px;
                   font-size: 16px;
               }

               .form-signin .form-control:focus {
                   z-index: 2;
               }

               .form-signin input[type="email"] {
                   margin-bottom: -1px;
                   border-bottom-right-radius: 0;
                   border-bottom-left-radius: 0;
               }

               .form-signin input[type="password"] {
                   margin-bottom: 10px;
                   border-top-left-radius: 0;
                   border-top-right-radius: 0;
               }
           -->


</main>
</body>