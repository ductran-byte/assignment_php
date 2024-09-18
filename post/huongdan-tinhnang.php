<?php 
include '../head.php'
?>
<div class="card">
<div class="card-body">
                        


<div class="d-flex align-items-center">
   <div class="post-image d-none d-sm-block">
       <a href="<?php /** @var TYPE_NAME $lienket */
   echo $lienket ?>">
        <img src="/images/avatar.png" style="max-width: 50px; alt="GiftCode Khủng">
    </a>
      <div class="post-author">Admin</div>
   </div>
   <div class="post-detail flex-fill">
      <div class="fw-bold text-primary"><?php $tieude = _fetch("SELECT * FROM diendan WHERE idd='4'"); echo $tieude['title']; ?></div>
      <div class="post-date"><?php $date = _fetch("SELECT * FROM diendan WHERE idd='4'"); echo $date['created_at']; ?></div>
      <div class="post-content"><!--nội dung sql by hoandz-->

      <?php $hoandz = _fetch("SELECT * FROM diendan WHERE idd='4'"); echo $hoandz['content']; ?>
      <div class="post-info mt-2"><?php $view = _fetch("SELECT * FROM diendan WHERE idd='4'"); echo " " .$view['view']; ?> lượt xem, <span class="fb-comments-count" data-href="<?php echo $lienket ?>">0</span> bình luận</div>
   </div>
</div>
</div>
</div>

<style>
        .loading-text {
            color: red;
            font-size: 19px;
            position: relative;
        }

        .loading-text::after {
            content: "...";
            position: absolute;
            animation: loading 1.5s infinite steps(4);
        }

        @keyframes loading {
            0%, 100% {
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
        }
</style>
<script>
// Khởi tạo biến đếm
var viewCount = 0;

// Hàm để cập nhật và hiển thị số lượt xem
function updateViewCount() {
    viewCount++; // Tăng giá trị lượt xem lên 1 mỗi khi gọi hàm này
    document.getElementById('count').textContent = viewCount; // Hiển thị giá trị lên trang
}

// Gọi hàm updateViewCount mỗi khi có lượt truy cập mới
updateViewCount();

</script>
<?php include '../end.php' ?>
</div>
</html>