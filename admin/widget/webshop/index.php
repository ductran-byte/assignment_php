<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content">
                        <a href="/admin/cua-hang/add">
                            <button style="width: 100%;" type="button" class="btn btn-success btn-block">Thêm Item
                                shop
                            </button>
                        </a>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php
                                $result = fetch_row("SELECT COUNT(*) FROM `shop` WHERE `id` != '0'", 1);
                                if ($result > 0) {
                                    $shop = $result;
                                } else {
                                    $shop = 0;
                                }
                                ?>
                                <p class="category">Số vật phẩm hiện có: <b class="text-danger"><?= $shop; ?> item</b>
                                </p>
                            </div>
                        </div>
                        <style>
                            .search-container {
                                position: relative;
                                margin-bottom: 20px;
                                border: 1px solid #ddd;
                                border-radius: 5px;
                            }

                            .search-container input[type=text] {
                                padding: 6px;
                                margin-top: 8px;
                                font-size: 17px;
                                border: none;
                                width: 100%;
                                border-bottom: 1px solid #ddd;
                            }

                            .search-container .fas {
                                position: absolute;
                                right: 10px;
                                top: 15px;
                                color: #ddd;
                            }
                        </style>
                        <div class="search-container">
                            <input type="text" id="searchInput" placeholder="Nhập Tên Item Cần Tìm"
                                   onkeyup="searchItems()">
                            <i class="fas fa-search"></i>
                        </div>

                        <script>
                            function searchItems() {
                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementById("searchInput");
                                filter = input.value.toUpperCase();
                                table = document.getElementsByClassName("table")[0];
                                tr = table.getElementsByTagName("tr");

                                for (i = 0; i < tr.length; i++) {
                                    td = tr[i].getElementsByTagName("td")[2]; // Assuming the 'Tên item' is in the 3rd column
                                    if (td) {
                                        txtValue = td.textContent || td.innerText;
                                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].style.display = "";
                                        } else {
                                            tr[i].style.display = "none";
                                        }
                                    }
                                }
                            }
                        </script>
                    </div>
                </div>

                <div class="card">
                    <div class="header">
                        <h4 class="title">
                            <center style="font-weight:bold; color: white;">Vật phẩm cửa hàng</center>
                        </h4>
                        <?php include('./error.php'); ?>
                        <?php include('./success.php'); ?>
                    </div>
                    <div class="content">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <th>ID</th>
                                <th>Images</th>
                                <th>Tên item</th>
                                <th>Chỉ số</th>
                                <th>Giá</th>
                                <th>Thao tác</th>
                                </thead>
                                <tbody>
                                <?php
                                $sql_get = "SELECT * FROM `shop`";
                                foreach (fetch_assoc($sql_get, 0) as $key => $data) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data["id"]; ?></td>
                                        <td><img src="<?php echo $data["image"]; ?>" alt=""></td>
                                        <td><?php echo $data["ten_item"]; ?></td>
                                        <td><?php echo $data["chi_so_web"]; ?></td>
                                        <td><?php echo number_format($data["gia_coin"], 0, '.', '.'); ?>đ</td>
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
                                                <a href="/admin/?widget=webshop_edit&id=<?= $data['id']; ?>">
                                                    <button class="btn-right btn-info">Edit</button>
                                                </a>
                                                <form action="/admin/truy-van-shop" method="post"
                                                      onsubmit="return confirm('Bạn có chắc chắn muốn xóa item này?');">
                                                    <button type="submit" name="deleteShop" value="<?= $data['id']; ?>"
                                                            class="btn-right btn-danger">Delete
                                                    </button>
                                                </form>
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
