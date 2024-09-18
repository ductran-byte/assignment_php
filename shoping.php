<?php

global $config, $_coin;
include_once "head.php";

if (isset($_POST['buyWebshop'])) {
    if (!$_POST) {
        header("Location: /");
    }
    $itemid = mysqli_real_escape_string($config, $_POST['buyWebshop']);
    $idninja = mysqli_real_escape_string($config, $_POST['playername']);

    $read = mysqli_query($config, "SELECT * FROM shop WHERE id = '$itemid'");
    $item = mysqli_fetch_array($read);

    $result1 = mysqli_query($config, "SELECT * FROM isNinja WHERE id = '$idninja'");
    $isNinja = mysqli_fetch_array($result1);
    if ($isNinja['id'] == 0) {
        echo '
        <script type="text/javascript">
        $(document).ready(function(){
            swal({
                title: "Thất bại",
                text: "Tài Khoản Chưa Tạo Nhân Vật Không Thể Sử Dụng Chức Năng Này!",
                type: "error",
                confirmButtonText: "OK",
            })
        });
        </script>
        ';
        exit(0);
    } else {
        if ($idninja == '') {
            echo '
            <script type="text/javascript">
            $(document).ready(function(){
                swal({
                    title: "Thất Bại",
                    text: "Chưa Chọn Nhân Vật!",
                    type: "error",
                    confirmButtonText: "OK",
                })
            });
            </script>
            ';
            exit(0);
        } else {
            $giacoin = $item['gia_coin'];
            if ($_coin < $giacoin) {
                echo '
                <script type="text/javascript">
                $(document).ready(function(){
                    swal({
                        title: "Thất bại",
                        text: "Tài Khoản Không Đủ Coin , Nạp Thêm Coin Liên Hệ Admin Nhé!",
                        type: "error",
                        confirmButtonText: "OK",
                    })
                });
                </script>
                ';
                exit(0);
            } else {


                $ItemBag = $isNinja['ItemBag'];
                //sẽ giải mã chuỗi JSON trong thuộc tính "ItemBag" của đối tượng $nininjaa thành một mảng liên kết và gán cho biến $bag.
                $bag = json_decode($ItemBag, true);
                //kiểm tra xem số lượng phần tử trong mảng $bag có vượt quá giới hạn được đặt trong thuộc tính "maxluggage" của đối tượng $ninja hay không
                if ($isNinja['maxluggage'] <= count($bag)) {
                    echo '
                    <script type="text/javascript">
                    $(document).ready(function(){
                        swal({
                            title: "Thất Bại",
                            text: "Hành Trang Không Đủ Chỗ Trống!",
                            type: "error",
                            confirmButtonText: "OK",
                        })
                    });
                    </script>
                    ';
                    exit(0);
                } else {

                    for ($i = 0; $i < count($bag); $i++) {
                        $bag[$i]["index"] = $i;
                    }
                    $webitem = $item['chi_so_game'];
                    $tenitem = $item['ten_item'];
                    $temp = json_decode($webitem, true);
                    //gán giá trị bằng số lượng phần tử trong mảng $bag cho thuộc tính "index" của mảng $temp.
                    $temp["index"] = count($bag);
                    //thêm mảng $temp vào cuối mảng $bag.
                    $bag[] = $temp;
                    //mã hóa mảng $bag thành chuỗi JSON và gán lại cho thuộc tính "ItemBag" của đối tượng $ninja.
                    $isNinja['ItemBag'] = json_encode($bag);

                    $itembuy = $isNinja['ItemBag']; //item đã được thêm vào
                    $ninjaid = $isNinja['id']; //lấy id ninja
                    $cointru = $_coin - $giacoin;
                    /** @var TYPE_NAME $_id */
                    $up = _query(_update('isplayer', "coin='$cointru'", "id='$_id'"));
                    $up = _query(_update('isNinja', "ItemBag='$itembuy'", "id='$ninjaid'"));

                    echo '
                    <script type="text/javascript">
                    $(document).ready(function(){
                        swal({
                            title: "Thành công",
                            text: "Đã Mua Item ' . $tenitem . ' với giá: ' . $giacoin . ' Coin Vui Lòng Đợi Thêm 30s Mới Vào Game.",
                            type: "success",
                            confirmButtonText: "OK",
                        })
                    });
                    </script>
                    ';
                }
            }
        }
    }
}

?>
    <link rel="stylesheet" href="/static/css/webshop.css">
    <style>
        .demo {
            background-color: #a0c49d;
            border: 2px solid #198754;
            border-radius: 5px;
            height: 34.5px;
            width: 100%;
        }

        .active {
            background-color: cornsilk;
        }

        @media (max-width: 520px) {
            .demo {
                height: 48.5px;
            }

        }
    </style>

    <div class="box" style="background-color: #198754;">
        <div class="box-content">
            <p style="font-size: 1.7rem;text-align: center;">Web shop</p>
            <ul class="nav nav-justified" id="tabRanking" role="tablist">
                <li class="nav-item" role="presentation">
                    <button type="button" id="fill-tab-example-tab-1" role="tab" data-rr-ui-event-key="1"
                            aria-controls="fill-tab-example-tabpane-1" aria-selected="false"
                            class="nav-link1 btlr-5 demo active" data-bs-toggle="tab"
                            data-bs-target="#fill-tab-example-tabpane-1">Vũ Khí
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button type="button" id="fill-tab-example-tab-2" role="tab" data-rr-ui-event-key="2"
                            aria-controls="fill-tab-example-tabpane-2" aria-selected="false" class="nav-link1 demo"
                            data-bs-toggle="tab" data-bs-target="#fill-tab-example-tabpane-2">Thời Trang
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button type="button" id="fill-tab-example-tab-3" role="tab" data-rr-ui-event-key="3"
                            aria-controls="fill-tab-example-tabpane-3" aria-selected="false"
                            class="nav-link1 demo btrr-5" data-bs-toggle="tab"
                            data-bs-target="#fill-tab-example-tabpane-3">Linh Tinh
                    </button>
                </li>
            </ul>
        </div>
    </div>

    <div>
        <div class="tab-content" id="tabRankingContent">
            <div role="tabpanel" id="fill-tab-example-tabpane-1" aria-labelledby="fill-tab-example-tab-1"
                 class="fade tab-pane">
                <?php
                $query = _query("SELECT * FROM shop WHERE loai='1'");
                while ($row = mysqli_fetch_array($query)) { ?>
                    <div class="item" style="background: #FDF8DA;">
                        <div class="item-img"><img src="<?= $row['image']; ?>" alt="" srcset=""></div>
                        <div class="item-title">
                            <p style="color: black;"># <?= $row['ten_item']; ?></p>
                            <p style="color: #95954d; font-size: 14px; font-weight: 400;">Giá
                                : <?= number_format($row['gia_coin']); ?> Coin</p>
                        </div>
                        <div class="item-btn">
                            <button style="background-color: #a0c49d;" id="btn-view" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample<?= $row['id']; ?>" aria-expanded="false"
                                    aria-controls="collapseExample">Xem
                            </button>
                        </div>
                    </div>
                    <div class="collapse" id="collapseExample<?= $row['id']; ?>">
                        <div class="box-collap" style="background: #FDF8DA;">
                            <p><span style="color: #000;"><?= $row['ten_item']; ?></span></p>
                            <p><span style="color: #7a7a7a; font-size: 13px; font-weight: 600;">Không Khóa</span></p>
                            <p>
                                <span style="color: #d500f9; font-size: 13px; font-weight: 700;">Giá Bán: <?= number_format($row['gia_coin']); ?> Coin</span>
                            </p>
                            <p>
                                <span style="color: #ff3d00; font-size: 13px; font-weight: 600;"><?= $row['chi_so_web']; ?></span>
                            </p>
                            <div class="item-btn-coll">
                                <button type="submit" name="" value="" class="btn btn-success btnBuy<?= $row['id']; ?>">
                                    MUA
                                </button>
                                <!-- <form action="" method="POST" >
                            <button type="submit" name="buyWebshop" value="<?= $row['id']; ?>"  class="btn btn-success">MUA</button>
                        </form> -->
                            </div>
                        </div>
                    </div>
                    <script>
                        if (window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>
                    <div class="box-alert item<?= $row['id']; ?> hide">
                        <div class="alert-content"
                             style="background: #e1ecc8; border: 2px solid #198754; border-radius: 15px;">
                            <div class="alert-header">
                                <h2 class="alert-title" style="display: flex;">Xác Nhận Mua Vật Phẩm</h2>
                            </div>
                            <div class="alert-text">
                                <div style="display: block;">Hãy Chắc Chắn Bạn Đã ĐĂNG XUẤT Và THOÁT KHỎI GAME Trước Khi
                                    Thực Hiện Giao Dịch . Nếu Chưa Thoát Khỏi Game Và Cố Tình Mua Item , Bị Lỗi Chúng
                                    Tôi Không Chịu Trách Nhiệm Và Không Hoàn Trả Bất Cứ Vật Phẩm Hay Coin . Mong Các
                                    Ninja Lưu Ý..
                                </div>
                            </div>
                            <div class="alert-action" style="display: flex;">
                                <form action="" method="POST">
                                    <label class="font-weight-bolder text-danger" for="playername">Chọn Nhân Vật</label>
                                    <select class="form-control " name="playername" required>
                                        <?php
                                        $read_sql = _fetch(_select("*", 'isplayer', "id='$_id'"));
                                        $replace1 = str_replace('"', '', $read_sql['isNinja']);
                                        $replace2 = str_replace('[', '', $replace1);
                                        $replace = str_replace(']', '', $replace2);
                                        $query1 = _query(_select('*', 'isNinja', "name='$replace'"));
                                        if (mysqli_num_rows($query1) > 0) {
                                            echo '<option value="" disabled selected>--- Chọn nhân vật ---</option>';
                                            foreach ($query1 as $ninjaname) {
                                                ?>
                                                <option value="<?= $ninjaname['id']; ?>"><?= $ninjaname['name']; ?></option>
                                                <?php
                                            }
                                        } else {
                                            echo '<option value="">Chưa tạo nhân vật</option>';
                                        }
                                        ?>
                                    </select>
                                    <button type="submit" name="buyWebshop" value="<?= $row['id']; ?>"
                                            class="swal2-confirm swal2-styled"
                                            style="background-color: #198754cc; border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">
                                        Xác Nhận
                                    </button>
                                    <button type="button" class="swal2-cancel swal2-styled cancel<?= $row['id']; ?>"
                                            style="display: inline-block; background-color: rgb(221 51 51 / 89%);">Không
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <script>
                        $('.btnBuy<?= $row['id']; ?>').click(function (e) {
                            e.preventDefault();
                            $('.item<?= $row['id']; ?>').fadeIn(300);
                        });
                        $('.cancel<?= $row['id']; ?>').click(function () {
                            $('.item<?= $row['id']; ?>').fadeOut(300);
                        });
                    </script>
                <?php }
                $query->close(); ?>
            </div>

            <div role="tabpanel" id="fill-tab-example-tabpane-2" aria-labelledby="fill-tab-example-tab-2"
                 class="fade tab-pane active show">
                <?php
                $query = $config->query("SELECT * FROM shop WHERE loai='2'");
                while ($row = mysqli_fetch_array($query)) { ?>
                    <div class="item" style="background: #FDF8DA;">
                        <div class="item-img"><img src="<?= $row['image']; ?>" alt="" srcset=""></div>
                        <div class="item-title">
                            <p style="color: black;"># <?= $row['ten_item']; ?></p>
                            <p style="color: #95954d; font-size: 14px; font-weight: 400;">Giá
                                : <?= number_format($row['gia_coin']); ?> Coin</p>
                        </div>
                        <div class="item-btn">
                            <button style="background-color: #a0c49d;" id="btn-view" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample<?= $row['id']; ?>" aria-expanded="false"
                                    aria-controls="collapseExample">Xem
                            </button>
                        </div>
                    </div>
                    <div class="collapse" id="collapseExample<?= $row['id']; ?>">
                        <div class="box-collap" style="background: #FDF8DA;">
                            <p><span style="color: #000;"><?= $row['ten_item']; ?></span></p>
                            <p><span style="color: #7a7a7a; font-size: 13px; font-weight: 400;">Không Khóa</span></p>
                            <p>
                                <span style="color: #ab0202; font-size: 13px; font-weight: 400;">Giá Bán: <?= number_format($row['gia_coin']); ?> Coin</span>
                            </p>
                            <p>
                                <span style="color: #06800e; font-size: 13px; font-weight: 400;"><?= $row['chi_so_web']; ?></span>
                            </p>
                            <div class="item-btn-coll">
                                <button type="submit" name="" value="" class="btn btn-success btnBuy<?= $row['id']; ?>">
                                    MUA
                                </button>
                                <!-- <form action="" method="POST" >
                            <button type="submit" name="buyWebshop" value="<?= $row['id']; ?>"  class="btn btn-success">MUA</button>
                        </form> -->
                            </div>
                        </div>
                    </div>
                    <script>
                        if (window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>
                    <div class="box-alert item<?= $row['id']; ?> hide">
                        <div class="alert-content"
                             style="background: #e1ecc8; border: 2px solid #198754; border-radius: 15px;">
                            <div class="alert-header">
                                <h2 class="alert-title" style="display: flex;">Xác Nhận Mua Vật Phẩm</h2>
                            </div>
                            <div class="alert-text">
                                <div style="display: block;">Hãy Chắc Chắn Bạn Đã ĐĂNG XUẤT Và THOÁT KHỎI GAME Trước Khi
                                    Thực Hiện Giao Dịch . Nếu Chưa Thoát Khỏi Game Và Cố Tình Mua Item , Bị Lỗi Chúng
                                    Tôi Không Chịu Trách Nhiệm Và Không Hoàn Trả Bất Cứ Vật Phẩm Hay Coin . Mong Các
                                    Ninja Lưu Ý..
                                </div>
                            </div>
                            <div class="alert-action" style="display: flex;">
                                <form action="" method="POST">
                                    <label class="font-weight-bolder text-danger" for="playername">Chọn Nhân Vật</label>
                                    <select class="form-control " name="playername" required>
                                        <?php
                                        $read_sql = _fetch(_select("*", 'isplayer', "id='$_id'"));
                                        $replace1 = str_replace('"', '', $read_sql['isNinja']);
                                        $replace2 = str_replace('[', '', $replace1);
                                        $replace = str_replace(']', '', $replace2);
                                        $query1 = _query(_select('*', 'isNinja', "name='$replace'"));
                                        if (mysqli_num_rows($query1) > 0) {
                                            echo '<option value="" disabled selected>--- Chọn nhân vật ---</option>';
                                            foreach ($query1 as $ninjaname) {
                                                ?>
                                                <option value="<?= $ninjaname['id']; ?>"><?= $ninjaname['name']; ?></option>
                                                <?php
                                            }
                                        } else {
                                            echo '<option value="">Chưa tạo nhân vật</option>';
                                        }
                                        ?>
                                    </select>
                                    <button type="submit" name="buyWebshop" value="<?= $row['id']; ?>"
                                            class="swal2-confirm swal2-styled"
                                            style="background-color: #198754cc; border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">
                                        Xác Nhận
                                    </button>
                                    <button type="button" class="swal2-cancel swal2-styled cancel<?= $row['id']; ?>"
                                            style="display: inline-block; background-color: rgb(221 51 51 / 89%);">Không
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <script>
                        $('.btnBuy<?= $row['id']; ?>').click(function (e) {
                            e.preventDefault();
                            $('.item<?= $row['id']; ?>').fadeIn(300);
                        });
                        $('.cancel<?= $row['id']; ?>').click(function () {
                            $('.item<?= $row['id']; ?>').fadeOut(300);
                        });
                    </script>
                <?php }
                $query->close(); ?>
            </div>

            <div role="tabpanel" id="fill-tab-example-tabpane-3" aria-labelledby="fill-tab-example-tab-3"
                 class="fade tab-pane active show">
                <?php
                $query = $config->query("SELECT * FROM shop WHERE loai='3'");
                while ($row = mysqli_fetch_array($query)) { ?>
                    <div class="item" style="background: #FDF8DA;">
                        <div class="item-img"><img src="<?= $row['image']; ?>" alt="" srcset=""></div>
                        <div class="item-title">
                            <p style="color: black;"># <?= $row['ten_item']; ?></p>
                            <p style="color: #95954d; font-size: 14px; font-weight: 400;">Giá
                                : <?= number_format($row['gia_coin']); ?> Coin</p>
                        </div>
                        <div class="item-btn">
                            <button style="background-color: #a0c49d;" id="btn-view" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample<?= $row['id']; ?>" aria-expanded="false"
                                    aria-controls="collapseExample">Xem
                            </button>
                        </div>
                    </div>
                    <div class="collapse" id="collapseExample<?= $row['id']; ?>">
                        <div class="box-collap" style="background: #FDF8DA;">
                            <p><span style="color: #000;"><?= $row['ten_item']; ?></span></p>
                            <p><span style="color: #7a7a7a; font-size: 13px; font-weight: 400;">Không Khóa</span></p>
                            <p>
                                <span style="color: #ab0202; font-size: 13px; font-weight: 400;">Giá Bán: <?= number_format($row['gia_coin']); ?> Coin</span>
                            </p>
                            <p>
                                <span style="color: #06800e; font-size: 13px; font-weight: 400;"><?= $row['chi_so_web']; ?></span>
                            </p>
                            <div class="item-btn-coll">
                                <button type="submit" name="" value="" class="btn btn-success btnBuy<?= $row['id']; ?>">
                                    MUA
                                </button>
                                <!-- <form action="" method="POST" >
                            <button type="submit" name="buyWebshop" value="<?= $row['id']; ?>"  class="btn btn-success">MUA</button>
                        </form> -->
                            </div>
                        </div>
                    </div>
                    <script>
                        if (window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>
                    <div class="box-alert item<?= $row['id']; ?> hide">
                        <div class="alert-content"
                             style="background: #e1ecc8; border: 2px solid #198754; border-radius: 15px;">
                            <div class="alert-header">
                                <h2 class="alert-title" style="display: flex;">Xác Nhận Mua Vật Phẩm</h2>
                            </div>
                            <div class="alert-text">
                                <div style="display: block;">Hãy Chắc Chắn Bạn Đã ĐĂNG XUẤT Và THOÁT KHỎI GAME Trước Khi
                                    Thực Hiện Giao Dịch . Nếu Chưa Thoát Khỏi Game Và Cố Tình Mua Item , Bị Lỗi Chúng
                                    Tôi Không Chịu Trách Nhiệm Và Không Hoàn Trả Bất Cứ Vật Phẩm Hay Coin . Mong Các
                                    Ninja Lưu Ý..
                                </div>
                            </div>
                            <div class="alert-action" style="display: flex;">
                                <form action="" method="POST">
                                    <label class="font-weight-bolder text-danger" for="playername">Chọn Nhân Vật</label>
                                    <select class="form-control " name="playername" required>
                                        <?php
                                        $read_sql = _fetch(_select("*", 'isplayer', "id='$_id'"));
                                        $replace1 = str_replace('"', '', $read_sql['isNinja']);
                                        $replace2 = str_replace('[', '', $replace1);
                                        $replace = str_replace(']', '', $replace2);
                                        $query1 = _query(_select('*', 'isNinja', "name='$replace'"));
                                        if (mysqli_num_rows($query1) > 0) {
                                            echo '<option value="" disabled selected>--- Chọn nhân vật ---</option>';
                                            foreach ($query1 as $ninjaname) {
                                                ?>
                                                <option value="<?= $ninjaname['id']; ?>"><?= $ninjaname['name']; ?></option>
                                                <?php
                                            }
                                        } else {
                                            echo '<option value="">Chưa tạo nhân vật</option>';
                                        }
                                        ?>
                                    </select>
                                    <button type="submit" name="buyWebshop" value="<?= $row['id']; ?>"
                                            class="swal2-confirm swal2-styled"
                                            style="background-color: #198754cc; border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">
                                        Xác Nhận
                                    </button>
                                    <button type="button" class="swal2-cancel swal2-styled cancel<?= $row['id']; ?>"
                                            style="display: inline-block; background-color: rgb(221 51 51 / 89%);">Không
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <script>
                        $('.btnBuy<?= $row['id']; ?>').click(function (e) {
                            e.preventDefault();
                            $('.item<?= $row['id']; ?>').fadeIn(300);
                        });
                        $('.cancel<?= $row['id']; ?>').click(function () {
                            $('.item<?= $row['id']; ?>').fadeOut(300);
                        });
                    </script>
                <?php }
                $query->close(); ?>
            </div>
        </div>
    </div>


    <!-- Vui lòng để lại dòng này để tôn trọng quyền tác giả -->
    <div class="box-content-end"
         style="font-weight: 400;font-family: math;text-shadow: 0 0 #c0ae77;height: 22px;color: cornsilk;text-align: center;"></div>
    <br>

<?php include_once 'end.php'; ?>