<div class="content">
    <div class="container-fluid">
        <style>.btn-prev {color: white;font-weight: 600;width: 120px;height: 35px;background-color: teal;border: none;border-radius: 5px;}</style>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content">
                        <div class="btn-group btn-group-justified">
                            <div style="padding: 10px 10px 10px 0"><a href="/admin/cua-hang"><button class="btn-prev"><i class="ti-angle-double-left"></i> Quay về</button></a></div>
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
                                $iditem = mysqli_real_escape_string($config, GET('id'));
                                $shop = fetch_assoc("SELECT * FROM shop WHERE id = '$iditem'", 1);
                            ?>
                            <style>
                                .card-title {font-size: 1.8rem;text-align: left;padding-top: 10px;padding-bottom: 5px;border-bottom: 2px solid black;margin-bottom: 10px;}
                                .card label {font-size: 20px;}
                                .text {font-size: 1.2rem;}
                                .mb-2 {margin-bottom: 20px;}
                            </style>
                            <?php include('./error.php'); ?>
                            <?php include('./success.php'); ?>
                            <h1 class="card-title">Thông tin tài khoản</h1>
                            <form action="/admin/truy-van-shop" enctype="multipart/form-data" method="POST">
                                <div class="mb-2 text">
                                    <label>Tên item:</label> 
                                    <input type="text" name="tenitem" value="<?= $shop['ten_item'] ?>" class="form-control">
                                </div>
                                <div class="mb-2 text">
                                    <label>Phân loại:</label> 
                                    <select class="form-control" name="type" required>
                                        <option value="" disabled selected>--- Chọn loại item ---</option>
                                        <option value="1" <?php if($shop['type'] == 1) {echo'selected';} ?>>Vũ khí</option>
                                        <option value="2" <?php if($shop['type'] == 2) {echo'selected';} ?>>Thời trang</option>
                                        <option value="3" <?php if($shop['type'] == 3) {echo'selected';} ?>>Linh tinh</option>
                                    </select>
                                </div>
                                <div class="mb-2 text">
                                    <label>Chỉ số web:</label> 
                                    <input type="text" name="chisoweb" value="<?= $shop['chi_so_web'] ?>" class="form-control">
                                </div>
                                <div class="mb-2 text">
                                    <label>Chỉ số game:</label> 
                                    <input type="text" name="chisogame" value='<?= $shop['chi_so_game'] ?>' class="form-control">
                                </div>
                                <div class="mb-2 text">
                                    <label>Giá coin:</label> 
                                    <input type="text" name="giacoin" value="<?= $shop['gia_coin'] ?>" class="form-control number">
                                </div>
                                <div class="mb-2 text">
                                    <label>Đường dẫn cũ:</label> 
                                    <input type="text" name="image" value="<?= $shop['image'] ?>" class="form-control number">
                                </div>
                                <div class="mb-2 text">
                                    <label>Đường dẫn:</label> 
                                    <input type="file" name="images" class="form-control">
                                </div>
                                
                                <div class="mb-2 text">
                                    <button type="submit" name="editShop" value="<?= $shop['id'] ?>" class="btn-prev">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

