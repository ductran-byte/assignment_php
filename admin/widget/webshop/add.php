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
                            <style>
                                .card-title {font-size: 1.8rem;text-align: left;padding-top: 10px;padding-bottom: 5px;border-bottom: 2px solid black;margin-bottom: 10px;}
                                .card label {font-size: 20px;}
                                .text {font-size: 1.2rem;}
                                .mb-2 {margin-bottom: 20px;}
                            </style>
                            <?php include('./error.php'); ?>
                            <?php include('./success.php'); ?>
                            <h1 class="card-title">Thêm vật phẩm shop</h1>
                            <form action="/admin/truy-van-shop" enctype="multipart/form-data" method="POST">
                                <div class="mb-2 text">
                                    <label>Tên item:</label> 
                                    <input type="text" name="tenitem" value="" class="form-control" placeholder="Nhập tên vật phẩm..." require>
                                </div>
                                <div class="mb-2 text">
                                    <label>Phân loại:</label> 
                                    <select class="form-control" name="type" required>
                                        <option value="" disabled selected>--- Chọn loại item ---</option>
                                        <option value="1">Vũ khí</option>
                                        <option value="2">Thời trang</option>
                                        <option value="3">Linh tinh</option>
                                    </select>
                                </div>
                                <div class="mb-2 text">
                                    <label>Chỉ số web:</label> 
                                    <input type="text" name="chisoweb" value="" class="form-control" placeholder="Nhập chỉ số hiển thị..." require>
                                </div>
                                <div class="mb-2 text">
                                    <label>Chỉ số game:</label> 
                                    <input type="text" name="chisogame" value='' class="form-control" placeholder="Nhập chỉ số game..." require>
                                </div>
                                <div class="mb-2 text">
                                    <label>Giá coin:</label> 
                                    <input type="text" name="giacoin" value="" class="form-control number" placeholder="Nhập giá vật phẩm..." require>
                                </div>
                                <div class="mb-2 text">
                                    <label>Đường dẫn:</label> 
                                    <input type="file" name="images" class="form-control" require>
                                </div>
                                
                                <div class="mb-2 text">
                                    <button type="submit" name="addShop" class="btn-prev">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

