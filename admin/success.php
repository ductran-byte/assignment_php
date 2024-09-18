<?php 
    if(isset($_SESSION['success'])) :
?>
        <style>
            .alert-warning {color: #1ba404;}
        </style>
        <div class="alert alert-success" role="alert">
            <strong><i class="ti-check-box"></i> Thành công : <?= $_SESSION['success']; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php 
    unset($_SESSION['success']);
    endif;
?>