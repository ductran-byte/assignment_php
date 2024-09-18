<?php
   include_once 'set.php';
   include_once 'head.php';
/*
$read_sql = _fetch(_select("*", 'diendan', "idd='$_idd'"));
$replace1 = $read_sql['idd'];
$replace2 = str_replace('[', '', $replace1);
$replace = str_replace(']', '', $replace2);
$tieude = $read_sql['title'];
$_noidung = $read_sql['content'];*/


?>
<!--tìm-->

<!---->
<div class="card">
    <div class="card-body">
        <div class="card-title h5">Bài viết mới</div>
        <hr>
        <div>

<!---->
<?php
// IDD bạn muốn truy vấn
$idd = 1;

// Câu truy vấn SQL
$sql = "SELECT title, view FROM diendan WHERE idd = $idd";

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


        }
    } else {
        echo "Không có kết quả.";
    }
} else {
    echo "Lỗi truy vấn: " . mysqli_error($config, $sql);
}

?>




<!---->




            <div class="post-item d-flex align-items-center my-2">
                <div class="post-image"><img src="/images/avatar.png" alt="🔥🤯<?php $tieude = _fetch("SELECT * FROM diendan WHERE idd='1'"); echo $tieude['title']; ?>🤯🔥">
                </div>
                <div>
                    <a class="fw-bold post-title" href="/post/00">🔥🤯<?php $tieude = _fetch("SELECT * FROM diendan WHERE idd='1'"); echo $tieude['title']; ?>🤯🔥 </a>
                    <div class="text-muted font-weight-bold">Lượt xem:<?php $view = _fetch("SELECT * FROM diendan WHERE idd='1'"); echo " " .$view['view']; ?>, Bình luận: 0</div>
                </div>
            </div>
            <div class="post-item d-flex align-items-center my-2">
                <div class="post-image"><img src="/images/avatar.png" alt="🍃<?php $tieude = _fetch("SELECT * FROM diendan WHERE idd='2'"); echo $tieude['title']; ?>🍃">
                </div>
                <div>
                    <a class="fw-bold post-title" href="/post/01">🍃<?php $tieude = _fetch("SELECT * FROM diendan WHERE idd='2'"); echo $tieude['title']; ?>🍃 </a>
                    <div class="text-muted font-weight-bold">Lượt xem:<?php $view = _fetch("SELECT * FROM diendan WHERE idd='2'"); echo " " .$view['view']; ?>, Bình luận: 0</div>
                </div>
            </div>
            <div class="post-item d-flex align-items-center my-2">
                <div class="post-image">
                    <img src="images/avatar.png" alt="🔥<?php $tieude = _fetch("SELECT * FROM diendan WHERE idd='3'"); echo $tieude['title']; ?>🔥">
                </div>
                <div>
                    <a class="fw-bold post-title" href="/post/02">🔥<?php $tieude = _fetch("SELECT * FROM diendan WHERE idd='3'"); echo $tieude['title']; ?>🔥 </a>
                    <div class="text-muted font-weight-bold">Lượt xem:<?php $view = _fetch("SELECT * FROM diendan WHERE idd='3'"); echo " " .$view['view']; ?>, Bình luận: 0</div>
                </div>
            </div>

            
         <!--   <div class="post-item d-flex align-items-center my-2">
                <div class="post-image"><img src="/images/avatar.png" alt="🔥🤯<?php $tieude = _fetch("SELECT * FROM diendan WHERE idd='1'"); echo $tieude['title']; ?>🤯🔥">
                </div>
                <div>
                    <a class="fw-bold post-title" href="/post/opentest">🔥🤯<?php $tieude = _fetch("SELECT * FROM diendan WHERE idd='1'"); echo $tieude['title']; ?>🤯🔥 </a>
                    <div class="text-muted font-weight-bold">Lượt xem:<?php $view = _fetch("SELECT * FROM diendan WHERE idd='1'"); echo " " .$view['view']; ?>, Bình luận: 0</div>
                </div>
            </div>
            <div class="post-item d-flex align-items-center my-2">
                <div class="post-image"><img src="/images/avatar.png" alt="🍃<?php $tieude = _fetch("SELECT * FROM diendan WHERE idd='2'"); echo $tieude['title']; ?>🍃">
                </div>
                <div>
                    <a class="fw-bold post-title" href="/post/01">🍃<?php $tieude = _fetch("SELECT * FROM diendan WHERE idd='2'"); echo $tieude['title']; ?>🍃 </a>
                    <div class="text-muted font-weight-bold">Lượt xem:<?php $view = _fetch("SELECT * FROM diendan WHERE idd='2'"); echo " " .$view['view']; ?>, Bình luận: 0</div>
                </div>
            </div>
            <div class="post-item d-flex align-items-center my-2">
                <div class="post-image">
                    <img src="images/avatar.png" alt="🔥<?php $tieude = _fetch("SELECT * FROM diendan WHERE idd='3'"); echo $tieude['title']; ?>🔥">
                </div>
                <div>
                    <a class="fw-bold post-title" href="/post/02">🔥<?php $tieude = _fetch("SELECT * FROM diendan WHERE idd='3'"); echo $tieude['title']; ?>🔥 </a>
                    <div class="text-muted font-weight-bold">Lượt xem:<?php $view = _fetch("SELECT * FROM diendan WHERE idd='3'"); echo " " .$view['view']; ?>, Bình luận: 0</div>
                </div>
            </div>-->
    </div>
    <div class="pt-2 card-title h5">Danh mục</div>
    <hr>
    <div>
        <div class="post-item d-flex align-items-center my-2">
            <div class="post-image">
                <img src="images/obito.png" alt="<?php $tieude = _fetch("SELECT * FROM diendan WHERE idd='4'"); echo $tieude['title']; ?>">
            </div>
            <div>
                <a class="fw-bold text-danger" href="/post/huongdan-tinhnang"><?php $tieude = _fetch("SELECT * FROM diendan WHERE idd='4'"); echo $tieude['title']; ?></a>
                <div class="text-muted font-weight-bold">Các bài viết hướng dẫn về tính năng trên GAME</div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="card-title h5">Giới thiệu</div>
        <hr>
        <div class="mx-2 fs-6">Ninja School là một game thế giới mở với chủ đề trường học ninja, nơi người chơi sẽ được trải nghiệm cuộc sống của một ninja thực thụ. Trong game, người chơi có thể tham gia vào các hoạt động giải trí như săn bắn quái vật, khám phá khu rừng bí ẩn, hoặc tham gia đấu trường PvP để thử thách và cạnh tranh với những ninja khác. Ngoài ra, game còn có nhiều nhiệm vụ và thử thách khác nhau cho người chơi hoàn thành, từ đó thu thập được điểm kinh nghiệm và trang bị vũ khí, trang phục mới. Với đồ họa đẹp mắt, âm thanh sống động và nội dung đa dạng, Ninja BOBA sẽ đem đến cho người chơi những trải nghiệm tuyệt vời và thỏa mãn niềm đam mê với văn hóa ninja.

        </div>
    </div>
</div>
</div>



<?php include 'end.php' ?>
</main>
</body>
</html>