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
                        <h4 class="title" style="color: white;"><b>Thông tin</b></h4> </h4>
                        <hr>
                    </div>
                    <div class="content"> 
                        <?php 
                            $idninja = mysqli_real_escape_string($config, GET('id'));
                            $ninja = fetch_assoc("SELECT * FROM ninja WHERE id = '$idninja'", 1);
                        ?>
                        <?php include('./error.php'); ?>
                        <?php include('./success.php'); ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="code">name:</label>
                                    <input type="text" class="form-control border-input" value="<?= $ninja['name']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="itemid">Level:</label>
                                    <input type="text" class="form-control border-input" value="<?= $ninja['level']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="itemquantity">Exp:</label>
                                    <input type="text" class="form-control border-input" value="<?= number_format($ninja['exp']); ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="itemid">Điểm tiềm năng:</label>
                                    <input type="text" class="form-control border-input" value="<?= $ninja['ppoint']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="itemid">Điểm 1:</label>
                                    <input type="text" class="form-control border-input" value="<?= $ninja['potential0']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="itemid">Điểm 2:</label>
                                    <input type="text" class="form-control border-input" value="<?= $ninja['potential1']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="itemid">Điểm 3:</label>
                                    <input type="text" class="form-control border-input" value="<?= $ninja['potential2']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="itemid">Điểm 4:</label>
                                    <input type="text" class="form-control border-input" value="<?= $ninja['potential3']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="itemid">Điểm kỹ năng:</label>
                                    <input type="text" class="form-control border-input" value="<?= $ninja['spoint']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="itemid">Xu:</label>
                                    <input type="text" class="form-control border-input" value="<?= number_format($ninja['xu']); ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="itemid">Xu rương:</label>
                                    <input type="text" class="form-control border-input" value="<?= number_format($ninja['xuBox']); ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="itemid">Yên:</label>
                                    <input type="text" class="form-control border-input" value="<?= number_format($ninja['yen']); ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>