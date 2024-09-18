<?php

global $_login;
include_once 'head.php';
if($_login == null) {header("location:/login");}

?>
<main class="flex-grow-1 flex-shrink-1">
<?php
		
		function get_string_tinhtrangthe($tinhtrangthe) {
			switch ($tinhtrangthe) {
				case 0:
				$str = '<span class="btn btn-warning form-fontrol">Chờ xử lý</span>';
				break;
				case 1:
				$str = '<span class="btn btn-success form-fontrol">Nạp Thành Công</span>';
				break;
				case 2:
				$str = '<div class="btn" style="background-color:red;color:#fff; ">Thẻ Sai</div>';
				break;
				default:
				$str = '<span class="btn btn-danger form-fontrol">Lỗi Chưa Xác Định</span>';
				break;
			}
			return $str;
		}
		?>
	<div class="card">
<div class="card-body">
    <div class="mb-3">
        <div class="row text-center justify-content-center row-cols-3 row-cols-lg-6 g-1 g-lg-1">
            <div class="col"><a class="btn btn-sm btn-success w-100 fw-semibold false" href="/user" style="background-color: rgb(101, 173, 109);">Tài khoản</a>
            </div>
            <div class="col"><a class="btn btn-sm btn-success w-100 fw-semibold active" href="/lich-su" style="background-color: rgb(101, 173, 109);">Lịch sử GD</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table align-middle table-row-dashed gy-5 dataTable no-footer" role="table">
            <thead>
                <tr class="text-start fw-bold text-uppercase gs-0">
                    <th colspan="1" role="columnheader" class="table-sort-desc text-primary" style="cursor: pointer;">#ID</th>
                    <th colspan="1" role="columnheader" class="" style="cursor: pointer;">Số tiền</th>
                    <th colspan="1" role="columnheader" class="" style="cursor: default;">Sau G.D</th>
                    <th colspan="1" role="columnheader" class="" style="cursor: default;">Mô tả</th>
                    <th colspan="1" role="columnheader" class="" style="cursor: pointer;">Ngày tạo</th>
                </tr>
            </thead>
            <tbody class="fw-semibold" role="rowgroup">
                <tr>
                    <td colspan="5">
                        <div class="d-flex text-center w-100 align-content-center justify-content-center">Không có bản ghi nào</div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
        <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"><div>
            <ul class="pagination"><li class="page-item">
                <a class="page-link" style="cursor: pointer;">&lt;</a>
            </li>
            <li class="page-item active"><a class="page-link" style="cursor: pointer;">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" style="cursor: pointer;">&gt;</a>
            </li>
        </ul>
    </div>
</div>
</div>
</div>
</div>
<!--
    <div class="container pb-5">

    <br><h4 >Lịch sử giao dịch</h4>
    <div class="py-3 text-center">
			<div class="table-responsive">
            	<table class="table table-bordered table-hover">
						<tr>
							<th>ID</th>
							<th>LOẠI</th>
							<th>TRẠNG THÁI</th>
							<th>MỆNH GIÁ</th>
							<th>THỜI GIAN</th>
						</tr>
					</thead>
					<tbody>-->
						<?php
				/*		$data = _query(_select("*","naptien","uid='$_username' ORDER BY id DESC"));
						while($row = mysqli_fetch_array($data))
						{
								?>

								<tr>
									<td><?php echo htmlspecialchars($row['id']); ?></td>
									<td><?php echo htmlspecialchars($row['loaithe']); ?></td>
									<td><?php echo get_string_tinhtrangthe($row['tinhtrang']); ?></td>
									<td><?php echo number_format($row['sotien']); ?>đ</td>
									<td><?php echo date("H:i - d/m/Y", $row['time']); ?></td>
								</tr>

							<?php }
							?>
						</tbody>
					</table>
				</div>
			</div>*/
            include_once 'end.php';
        ?>
        </main>
        
<!--</main>-->