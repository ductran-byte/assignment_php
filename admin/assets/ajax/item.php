<?php

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
if(!is_admin()){ die(); }

// Kết nối đến cơ sở dữ liệu nso_data
/** @var TYPE_NAME $db */
$db->select_db('nso_data');

$page = (int)POST("page");
$id = POST("id");
$where = "`id` != '0'";

/** @var TYPE_NAME $db */
$total_record = $db->fetch_row("SELECT COUNT(id) FROM `item` WHERE ".$where." LIMIT 1");

// config phân trang
$config = array(
    "current_page" => $page,
    "total_record" => $total_record,
    "limit" => "100",
    "range" => "10",
    "link_first" => "",
    "link_full" => "?page={page}"
);

$paging = new Pagination;
$paging->init($config);
$sql_get = "SELECT * FROM `item` WHERE ".$where." LIMIT ".$paging->getConfig()['start'].", ".$paging->getConfig()['limit'];

// Nếu có
if ($total_record) { ?>
    <div class="table-body table-responsive">
        <table class="table table-striped">
            <thead>
            <th class="text-center">ID</th>
            <th class="text-center">Tên item</th>
            </thead>
            <tbody>
            <?php foreach ($db->fetch_assoc($sql_get, 0) as $key => $data) { ?>
                <tr style="color: black;">
                    <td class="text-center"><?=$data["id"]; ?></td>
                    <td class="text-center"><?=$data["name"]; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
    echo $paging->html_list(); // page
} else { ?>
    <div class="alert alert-info">Không có dữ liệu !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>
<?php } ?>
