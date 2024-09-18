<div class="content">
    <div class="container-fluid">
        <style>.btn-prev {
                color: white;
                font-weight: 600;
                width: 120px;
                height: 35px;
                background-color: teal;
                border: none;
                border-radius: 5px;
            }</style>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content">
                        <div class="btn-group btn-group-justified">
                            <div style="padding: 10px 10px 10px 0"><a href="/admin/ma-qua-tang/add">
                                    <button class="btn-prev"><i class="fa fa-pencil-square-o"></i> ADD GIFT</button>
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style="color: white; margin-bottom: 20px;">Mã quà tặng</h4>
                        <?php include('./error.php'); ?>
                        <?php include('./success.php'); ?>
                    </div>
                    <div class="content">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <th>ID</th>
                                <th>Mã gift</th>
                                <th>Item</th>
                                <th>Số lượng</th>
                                <th>Trang thái</th>
                                <th>Thời hạn</th>
                                <th>Chức năng</th>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT * FROM gift_code ";
                                $result = _query($sql);
                                if ($result->num_rows > 0) {
                                    if ($list_gift = fetch_assoc($sql, 0)) {
                                        foreach ($list_gift as $gift) { ?>
                                            <tr>
                                                <td><?= $gift['id']; ?></td>
                                                <td><?= $gift['code']; ?></td>
                                                <td><?= str_replace('","', ',', trim($gift['item_id'], '[""]')); ?></td>
                                                <td><?= str_replace('","', ',', trim($gift['item_quantity'], '[""]')); ?></td>
                                                <td><?= str_replace('","', ',', trim($gift['item_isLock'], '[""]')); ?></td>
                                                <td><?= str_replace('","', ',', trim($gift['item_expires'], '[""]')); ?></td>
                                                <td>
                                                    <form action="/admin/truy-van-gift" method="post">
                                                        <a href="/admin/?widget=giftcode_edit&id=<?= $gift['id']; ?>"
                                                           class="btn btn-warning">Sửa</a>
                                                        <button type="submit" name="giftDelete"
                                                                value="<?= $gift['id']; ?>" class="btn btn-danger">Xoá
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php }
                                    }
                                } else {
                                    echo "<center>Không có mã quà tăng nào được tìm thấy.</center>";
                                }
                                $config->close(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <a href="#"><i class="ti-angle-right"></i> Xem tất cả</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>