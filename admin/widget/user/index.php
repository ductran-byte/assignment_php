<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <h4 class="title" style="color: white; margin-bottom: 20px;">Tài khoản người dùng</h4>
                    <style>
                        .btn-all {
                            color: white;
                            height: 45px;
                            padding-left: 10px;
                            padding-right: 10px;
                            border: none;
                            border-radius: 10px;
                            box-shadow: 0px 3px 3px black;
                            margin: 5px;
                            font-weight: 600;
                        }
                    </style>
                    <div class="header">
                        <button id="unActiveAll" type="submit" name="unActiveAll" class="btn-all btn-danger"><i
                                    class="ti-lock"></i> Huỷ kích hoạt toàn bộ tài khoản
                        </button>
                        <button id="activeAll" type="submit" name="activeAll" class="btn-all btn-success"><i
                                    class="ti-unlock"></i> Kích hoạt toàn bộ tài khoản
                        </button>
                        <button id="deleteNV" type="submit" name="deleteNV" class="btn-all btn-warning"><i
                                    class="ti-trash"></i> Xoá toàn bộ Nhân vật
                        </button>
                        <button id="deletePlayer" type="submit" name="deletePlayer" class="btn-all btn-danger"><i
                                    class="ti-trash"></i> Xoá tài khoản không có nhân vật & chưa kích hoạt
                        </button>
                    </div>

                    <div class="header">
                        <?php
                        $read = fetch_row("SELECT COUNT(*) FROM `isplayer`", 0);
                        $result = fetch_row("SELECT COUNT(*) FROM `isplayer` WHERE `status`='0'", 0);
                        if ($read > 0) {
                            $soacc = $read;
                        } else {
                            $soacc = 0;
                        }
                        if ($result > 0) {
                            $soacckh = $result;
                        } else {
                            $soacckh = 0;
                        }
                        ?>
                        <p class="category">Tổng số tài khoản trên server: <b class="text-danger"><?= $soacc; ?> tài
                                khoản</b></p>
                        <p class="category">Tổng số tài khoản đã kích hoạt: <b class="text-danger"><?= $soacckh; ?> tài
                                khoản</b></p>
                        <?php include('./error.php'); ?>
                        <?php include('./success.php'); ?>
                    </div>

                    <div class="content">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <th class="text-center">ID</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Password</th>
                                <th class="text-center">Kích hoạt</th>
                                <th class="text-center">Cài đặt</th>
                                </thead>
                                <tbody>
                                <?php
                                $sql_get = "SELECT * FROM `isplayer`";
                                foreach (fetch_assoc($sql_get, 0) as $key => $data) {
                                    ?>
                                    <tr>
                                        <td class="text-center"><?= $data["id"]; ?></td>
                                        <td class="text-center"><?= $data["username"]; ?></td>
                                        <td class="text-center"><?= $data["password"]; ?></td>
                                        <td class="text-center">
                                            <?php if ($data['status'] == '1') {
                                                echo '<font color="red">OFF</font>';
                                            } else {
                                                echo '<font color="green">ON</font>';
                                            } ?>
                                        </td>
                                        <td class="text-center">
                                            <style>
                                                .btn-right {
                                                    color: white;
                                                    margin-right: 5px;
                                                    padding-left: 10px;
                                                    padding-right: 10px;
                                                    height: 30px;
                                                    border-radius: 5px;
                                                    font-weight: 600;
                                                }
                                            </style>
                                            <div style="display: flex;">
                                                <form action="/admin/truy-van-user" method="post">
                                                    <?php if ($data['status'] == '1') {
                                                        echo '<button type="submit" name="activeUser" value="' . $data['id'] . '" class="btn-right btn-danger">Active</button>';
                                                    } else {
                                                        echo '<button type="submit" name="activeUser" value="' . $data['id'] . '" class="btn-right btn-success">Unactive</button>';
                                                    } ?>
                                                </form>
                                                <a href="/admin/?widget=user_view&id=<?= $data['id']; ?>">
                                                    <button class="btn-right btn-info">View</button>
                                                </a>
                                                <a href="/admin/?widget=user_edit&id=<?= $data['id']; ?>">
                                                    <button class="btn-right btn-warning">Edit</button>
                                                </a>
                                                <form action="/admin/truy-van-user" method="POST">
                                                    <button id="deleteTk" type="submit" name="deleteUser" value="<?= $data['id']; ?>"
                                                            class="btn-right btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?');">Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

