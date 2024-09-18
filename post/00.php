<?php 
include '../head.php'
?>
<div class="card">
<div class="card-body">
                        
<?php
// IDD bạn muốn truy vấn
$idd = 1;

// Câu truy vấn SQL
$sql = "SELECT title, view, content, created_at FROM diendan WHERE idd = $idd";

// Thực hiện truy vấn và lấy kết quả
$result = mysqli_query($config, $sql);

if ($result) {
    // Kiểm tra xem có dữ liệu trả về hay không
    if (mysqli_num_rows($result) > 0) {
        // Lặp qua các hàng kết quả
        while ($row = mysqli_fetch_assoc($result)) {
            // Lấy dữ liệu từ cột 'title' và 'view' và in ra
            $tieude = $row['title'];
            $view = $row['view'];
            $date = $row['created_at'];
            $hoandz = $row['content'];


        }
    } else {
        echo "Không có kết quả.";
    }
} else {
    echo "Lỗi truy vấn: " . mysqli_error($config, $sql);
}

?>


<div class="d-flex align-items-center">
   <div class="post-image d-none d-sm-block">
   <a href="<?php echo $lienket ?>">
        <img src="/images/avatar.png" style="max-width: 50px; alt="GiftCode Khủng">
    </a>
      <div class="post-author">Admin</div>
   </div>
   <div class="post-detail flex-fill">
      <div class="fw-bold text-primary"><?php $tieude = _fetch("SELECT * FROM diendan WHERE idd='1'"); echo $tieude['title']; ?></div>
      <div class="post-date"><?php $date = _fetch("SELECT * FROM diendan WHERE idd='1'"); echo $date['created_at']; ?></div>
      <div class="post-content"><!--nội dung sql by hoandz-->
      <?php $hoandz = _fetch("SELECT * FROM diendan WHERE idd='1'"); echo $hoandz['content']; ?>
      <div class="post-info mt-2"><?php $view = _fetch("SELECT * FROM diendan WHERE idd='1'"); echo " " .$view['view']; ?> lượt xem, <span class="fb-comments-count" data-href="<?php echo $lienket ?>">0</span> bình luận</div>
   </div>
</div>
</div>
</div>

<?php include '../end.php' ?>
</body>
</html>