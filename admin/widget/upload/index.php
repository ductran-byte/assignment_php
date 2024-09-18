<div class="content">
        <div class="container-fluid">
            <style>.btn-prev {color: white;font-weight: 600;width: 120px;height: 35px;background-color: teal;border: none;border-radius: 5px;}</style>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="content">
                            <div class="btn-group btn-group-justified">
                                <div style="padding: 10px 10px 10px 0"><a href="/admin/upload-file/add"><button class="btn-prev"><i class="fa fa-pencil-square-o"></i> ADD FILE</button></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title" style="color: white; margin-bottom: 20px;">File upload</h4>
                            <?php include('./error.php'); ?>
                            <?php include('./success.php'); ?>
                        </div>
                        <div class="content">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Kiểu file</th>
                                        <th>Tên file</th>
                                        <th>Nội dung</th>
                                        <th>Đường dẫn</th>
                                        <th>Thời hạn</th>
                                        <th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $sql = "SELECT * FROM file_upload ";
                                        if($db->num_rows($sql) > 0) { 
                                            if ($list_file = $db->fetch_assoc($sql,0)) {
                                                foreach ($list_file as $file) { ?>
                                                    <tr>
                                                        <td><?= $file['id']; ?></td>
                                                        <td>
                                                            <?php if($file['type'] == '0') { echo'<span>File TXT</span>'; }
                                                                else if($file['type'] == '1') {echo'<span style="color: red;">File JAR</span>';}
                                                                else if($file['type'] == '2') {echo'<span style="color: red;">File APK</span>';}
                                                                else {echo'<span style="color: blue;">File ZIP</span>';}
                                                            ?>
                                                        </td>
                                                        <td><?= $file['title']; ?></td>
                                                        <td><?= $file['content']; ?></td>
                                                        <td><?= $file['link']; ?></td>
                                                        <td><?= $file['time']; ?></td>
                                                        <td>
                                                            <form action="/admin/truy-van-upload" method="post">
                                                                <a href="/admin/?widget=file_edit&id=<?= $file['id']; ?>" class="btn btn-warning">Sửa</a>
                                                                <button type="submit" name="fileDelete" value="<?= $file['id']; ?>" class="btn btn-danger">Xoá</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php }
                                            }
                                        } else {
                                                echo "<center>Không có mã quà tăng nào được tìm thấy.</center>";
                                        }$db->close(); ?>
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