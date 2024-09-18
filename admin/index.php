<?php 
// Require database  
require_once '../set.php';

if(!is_admin()){load_url("/");}

    $xss = new Anti_xss;
    $widget = $xss->clean_up(GET('widget'));
    
    switch ($widget) {
        case 'upfile':
            $title = "Quản lý file upload";
            $headtitle = 'tensv | '.$title;
            require_once './includes/header.php';
            require_once './widget/upload/index.php';
            break;
            case 'file_edit':
                $title = "Edit file upload";
                $headtitle = 'tensv | '.$title;
                require_once './includes/header.php';
                require_once './widget/upload/edit.php';
                break;
                case 'file_add':
                    $title = "Edit file upload";
                    $headtitle = 'NSO BOBA | '.$title;
                    require_once './includes/header.php';
                    require_once './widget/upload/add.php';
                    break;
        case 'isplayer':
            $title = "Quản lý nhân vật";
            $headtitle = 'NSO BOBA | '.$title;
            require_once './includes/header.php';
            require_once './widget/player/index.php';
            break;
            case 'player_view':
                $title = "Quản lý nhân vật";
                $headtitle = 'NSO BOBA | '.$title;
                require_once './includes/header.php';
                require_once './widget/player/view.php';
                break;
                case 'player_edit':
                    $title = "Quản lý nhân vật";
                    $headtitle = 'NSO BOBA | '.$title;
                    require_once './includes/header.php';
                    require_once './widget/player/edit.php';
                    break;
        case 'webshop':
            $title = "Quản lý cửa hàng";
            $headtitle = 'NSO BOBA | '.$title;
            require_once './includes/header.php';
            require_once './widget/webshop/index.php';
            break;
            case 'webshop_edit':
                $title = "Chỉnh sửa vật phẩm web shop";
                $headtitle = 'NSO BOBA | '.$title;
                require_once './includes/header.php';
                require_once './widget/webshop/edit.php';
                break;
                case 'webshop_add':
                    $title = "Thêm vật phẩm web shop";
                    $headtitle = 'NSO BOBA | '.$title;
                    require_once './includes/header.php';
                    require_once './widget/webshop/add.php';
                    break;
        case 'giftcode':
            $title = "Quản lý mã quà tặng";
            $headtitle = 'NSO BOBA | '.$title;
            require_once './includes/header.php';
            require_once './widget/giftcode/index.php';
            break;
            case 'giftcode_edit':
                $title = "Quản lý mã quà tặng";
                $headtitle = 'NSO BOBA | '.$title;
                require_once './includes/header.php';
                require_once './widget/giftcode/edit.php';
                break;
                case 'giftcode_add':
                    $title = "Quản lý mã quà tặng";
                    $headtitle = 'tensv | '.$title;
                    require_once './includes/header.php';
                    require_once './widget/giftcode/add.php';
                    require_once './widget/giftcode/view-item.php';
                    break;
        case 'user':
            $title = "Quản lý tài khoản";
            $headtitle = 'NSO BOBA | '.$title;
            require_once './includes/header.php';
            require_once './widget/user/index.php';
            require_once 'alert.php';
            break;
            case 'user_view':
                $title = "Quản lý tài khoản";
                $headtitle = 'NSO BOBA | '.$title;
                require_once './includes/header.php';
                require_once './widget/user/view.php';
                break;
                case 'user_edit':
                    $title = "Quản lý tài khoản";
                    $headtitle = 'NSO BOBA | '.$title;
                    require_once './includes/header.php';
                    require_once './widget/user/edit.php';
                    break;
        default:
            $title = "Bảng điều khiển";
            $headtitle = 'NSO BOBA | '.$title;
            require_once './includes/header.php';
            require_once './widget/main.php';
            break;
    }
    // Require footer
    require_once './includes/footer.php';

?>