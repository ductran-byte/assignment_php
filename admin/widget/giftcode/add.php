<div class="content">
    <div class="container-fluid">
        <style>
            .btn-prev {
                color: white;
                font-weight: 600;
                width: 120px;
                height: 35px;
                background-color: teal;
                border: none;
                border-radius: 5px;
            }

            .nut {
                background: darkmagenta;
                color: cyan;
                padding: 3px;
                cursor: pointer;
                border-radius: 5px;
            }

            .hide {
                display: none;
            }

            .table-body {
                max-height: 450px;
                overflow-y: scroll;
                border: 1px solid #ccc;
                background-color: #f2f2f2;
            }
        </style>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content">
                        <div class="btn-group btn-group-justified">
                            <div style="padding: 10px 10px 10px 0"><a href="/admin/ma-qua-tang">
                                    <button class="btn-prev"><i class="ti-angle-double-left"></i> Quay về</button>
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
                        <h4 class="title" style="color: white;"><b>Add Gift code </b></h4> </h4>
                        <hr>
                    </div>
                    <div class="content">
                        <form action="/admin/truy-van-gift" method="POST">
                            <input type="hidden" name="type_gift" value="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="code">Mã gift:</label>
                                        <input type="text" class="form-control border-input" id="code" name="code"
                                               value="<?= _randomgift() ?>" placeholder="Nhập tên mã..." required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="itemid">Danh sách Item:</label>
                                        <span style="color: blue;">Ví Dụ: -3, -2, -1, 1 <a id="viewList"
                                            class="nut guide">Xem id item</a></span>
                                        <input type="text" class="form-control border-input" id="itemid" name="itemid"
                                               value="" placeholder="Nhập id vật phẩm..." required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="itemquantity">Danh sách Số lượng từng item:</label>
                                        <span style="color: blue;">vd: 10000000, 1000000, 1000, 1</span>
                                        <input type="text" class="form-control border-input" id="itemquantity"
                                               name="itemquantity" value="" placeholder="Nhập số lượng item..."
                                               required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="itemisLock">Trạng thái từng item (0: không khoá - 1: khoá)</label>
                                        <span style="color: blue;">vd: 0,0,0,1</span>
                                        <input type="text" class="form-control border-input" id="itemisLock"
                                               name="itemisLock" value="" placeholder="Nhập trạng thái..." required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="itemexpires">Hạn sử dụng từng item (vĩnh viễn: -1 hoặc mili
                                            giây)</label>
                                        <span style="color: blue;">vd: -1, -1, -1, 86400000</span>
                                        <input type="text" class="form-control border-input" id="itemexpires"
                                               name="itemexpires" value="" placeholder="Nhập hạn sử dụng..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr>
                                <button type="submit" name="addGift" class="btn btn-success"><i
                                            class="fa fa-pencil-square-o"></i> CẬP NHẬT
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

