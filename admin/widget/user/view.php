
<div class="content">
    <div class="container-fluid">
        <style>.btn-prev {color: white;font-weight: 600;width: 120px;height: 35px;background-color: teal;border: none;border-radius: 5px;}</style>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content">
                        <div class="btn-group btn-group-justified">
                            <div style="padding: 10px 10px 10px 0"><a href="/admin/tai-khoan"><button class="btn-prev"><i class="ti-angle-double-left"></i> Quay về</button></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container-fluid">
                            <?php 
                                $iduser = mysqli_real_escape_string($config, GET('id'));
                                $user = fetch_assoc("SELECT * FROM isplayer WHERE id = '$iduser'", 1);
                            ?>
                            <style>
                                .card-title {font-size: 1.8rem;text-align: left;padding-top: 10px;padding-bottom: 5px;border-bottom: 2px solid black;margin-bottom: 10px;}
                                .card label {font-size: 20px;}
                                .text {font-size: 1.2rem;}
                            </style>
                            <h1 class="card-title">Thông tin tài khoản</h1>
                            <div class="mb-2 text"><label>Tài khoản:</label> <?= $user['username'] ?></div>
                            <div class="mb-2 text"><label>Mật khẩu:</label> <?= $user['password'] ?></div>
                            <div class="mb-2 text"><label>Nhân vật:</label> <?= trim($user['isNinja'], '[""]') ?></div>
                            <div class="mb-2 text"><label>Trạng thái :</label> 
                            <?php if($user['status'] == 1) {
                                echo '<span style="color: red;">Chưa kích hoạt</span>';
                            } else {
                                echo '<span style="color: green;">Đã kích hoạt</span>';
                            } ?>
                            </div>
                            <div class="mb-2 text"><label>Ngày tham gia :</label> <?= $user['ngaythamgia'] ?></div>
                            <div class="mb-2 text"><label>Tài khoản bị khóa :</label> 
                            <?php if($user['ban'] == 1) {
                                echo '<span style="color: red;">Có</span>';
                            } else {
                                echo '<span style="color: green;">Không</span>';
                            } ?>
                            </div>
                            <?php include('./error.php'); ?>
                            <?php include('./success.php'); ?>
                            <div class="mb-2" style="background: beige; padding: 10px; margin-top: 10px; margin-bottom: 10px;">
                                <form action="/admin/truy-van-user" method="POST" class="d-inline">
                                    <label>Số coin: <span style="font-size: 1.1rem; color:blueviolet"><b><?= number_format($user['coin']) ?> coin</b></span></label>
                                    <input type="number" name="congcoin" class="form-control" required="" placeholder="Nhập coin...">
                                    <button type="submit" name="addcoin" value="<?= $user['id']; ?>" style="margin-top: 10px; background: #9eff9a; border-radius: 5px;">Cộng Coin</button>
                                </form>
                            </div>
                            <div class="mb-2" style="background: beige; padding: 10px; margin-top: 10px; margin-bottom: 10px;">
                                <form action="/admin/truy-van-user" method="POST" class="d-inline">
                                    <label>Số lượng: <span style="font-size: 1.1rem; color:blueviolet"><b><?= number_format($user['luong']) ?> lượng</b></span></label>
                                    <input type="number" name="congluong" class="form-control" required="" placeholder="Nhập lượng...">
                                    <button type="submit" name="addluong" value="<?= $user['id']; ?>" style="margin-top: 10px; background: #9eff9a; border-radius: 5px;">Cộng Lượng</button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>