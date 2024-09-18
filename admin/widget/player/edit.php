<div class="content">
    <div class="container-fluid">
        <style>.btn-prev {color: white;font-weight: 600;width: 120px;height: 35px;background-color: teal;border: none;border-radius: 5px;}</style>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content">
                        <div class="btn-group btn-group-justified">
                            <div style="padding: 10px 10px 10px 0"><a href="/admin/nhan-vat"><button class="btn-prev"><i class="ti-angle-double-left"></i> Quay về</button></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style="color: white;"><b>Chỉnh sửa thông tin</b></h4> </h4>
                        <hr>
                    </div>
                    <div class="content"> 
                        <?php 
                            $idninja = mysqli_real_escape_string($config, GET('id'));
                            $ninja = fetch_assoc("SELECT * FROM ninja WHERE id = '$idninja'", 1);
                        ?>
                        <?php include('./error.php'); ?>
                        <?php include('./success.php'); ?>
                        <form action="/admin/truy-van-player" method="POST">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="code">name:</label>
                                        <input type="text" class="form-control border-input" name="name" value="<?= $ninja['name']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="itemid">Level:</label>
                                        <input type="text" class="form-control border-input" name="level" value="<?= $ninja['level']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="itemquantity">Exp:</label>
                                        <input type="text" class="form-control border-input" name="exp" value="<?= $ninja['exp']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="itemid">Điểm tiềm năng:</label>
                                        <input type="text" class="form-control border-input" name="ppoint" value="<?= $ninja['ppoint']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="itemid">Điểm 1:</label>
                                        <input type="text" class="form-control border-input" name="potential0" value="<?= $ninja['potential0']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="itemid">Điểm 2:</label>
                                        <input type="text" class="form-control border-input" name="potential1" value="<?= $ninja['potential1']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="itemid">Điểm 3:</label>
                                        <input type="text" class="form-control border-input" name="potential2" value="<?= $ninja['potential2']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="itemid">Điểm 4:</label>
                                        <input type="text" class="form-control border-input" name="potential3" value="<?= $ninja['potential3']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="itemid">Điểm kỹ năng:</label>
                                        <input type="text" class="form-control border-input" name="spoint" value="<?= $ninja['spoint']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="itemid">Xu:</label>
                                        <input type="text" class="form-control border-input" name="xu" value="<?= $ninja['xu']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="itemid">Xu rương:</label>
                                        <input type="text" class="form-control border-input" name="xuBox" value="<?= $ninja['xuBox']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="itemid">Yên:</label>
                                        <input type="text" class="form-control border-input" name="yen" value="<?= $ninja['yen']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="itemid">Tọa độ:</label>
                                        <input type="text" class="form-control border-input" name="site" value="<?= $ninja['site']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="itemid">Số ô hành trang:</label>
                                        <input type="text" class="form-control border-input" name="maxluggage" value="<?= $ninja['maxluggage']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="itemid">Cấp hành trang:</label>
                                        <input type="text" class="form-control border-input" name="levelBag" value="<?= $ninja['levelBag']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="itemid">Rương đồ:</label>
                                        <textarea type="text" class="form-control border-input" name="ItemBox" style="height: 300px;" required><?= $ninja['ItemBox']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="itemid">Gia tộc:</label>
                                        <input type="text" class="form-control border-input" name="clan" value='<?= $ninja['clan']; ?>' required>
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr>
                                <button type="submit" name="updatePlayer" value="<?= $ninja['id']; ?>" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> CẬP NHẬT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>