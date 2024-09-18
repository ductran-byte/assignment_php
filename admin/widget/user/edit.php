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
                        <div class="container-fluid" style="padding-top: 10px;">
                            <?php 
                                $iduser = mysqli_real_escape_string($config, GET('id'));
                                $user = fetch_assoc("SELECT * FROM isplayer WHERE id = '$iduser'", 1);
                            ?>
                            <style>
                                .card-title {font-size: 1.8rem;text-align: left;padding-top: 10px;padding-bottom: 5px;border-bottom: 2px solid black;margin-bottom: 10px;}
                                .card label {font-size: 20px;}
                                .text {font-size: 1.2rem;}
                                .mb-2 {margin-bottom: 20px;}
                            </style>
                            <?php include('./error.php'); ?>
                            <?php include('./success.php'); ?>
                            <h1 class="card-title">Chỉnh sửa tài khoản</h1>
                            <form action="/admin/truy-van-user" method="POST">
                                <div class="mb-2 text">
                                    <label>ID:</label> 
                                    <input type="text" name="id" value="<?= $user['id'] ?>" class="form-control">
                                </div>
                                <div class="mb-2 text">
                                    <label>Username:</label> 
                                    <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control">
                                </div>
                                <div class="mb-2 text">
                                    <label>Password:</label> 
                                    <input type="text" name="password" value="<?= $user['password'] ?>" class="form-control">
                                </div>
                                <div class="mb-2 text">
                                    <label>Ban:</label> 
                                    <input type="text" name="ban" value="<?= $user['ban'] ?>" class="form-control number">
                                </div>
                                <div class="mb-2 text">
                                    <label>Kích hoạt:</label> 
                                    <input type="text" name="status" value="<?= $user['status'] ?>" class="form-control number">
                                </div>
                                <div class="mb-2 text">
                                    <label>Nhân vật:</label> 
                                    <input type="text" name="name" value="<?= trim($user['isNinja'], '[""]') ?>" class="form-control" disabled>
                                </div>
                                <div class="mb-2 text">
                                    <label>Role:</label> 
                                    <input type="text" name="role" value="<?= $user['role'] ?>" class="form-control number">
                                </div>
                                <div class="mb-2 text">
                                    <label>Vip:</label> 
                                    <input type="text" name="vip" value="<?= $user['vip'] ?>" class="form-control number">
                                </div>
                                <div class="mb-2 text">
                                    <button type="submit" name="editUser" class="btn-prev">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>