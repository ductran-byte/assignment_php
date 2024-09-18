<div class="sidebar" data-background-color="white" data-active-color="danger">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/" class="simple-text">
                <i class="ti-home"></i> VỀ SHOP
            </a>
        </div>

        <ul class="nav">
            <li class="<?php echo (isset($widget) && $widget == "") ? 'active':''; ?>">
                <a href="/admin">
                    <p>Trang chính</p>
                </a>
            </li>
            <li  class="<?php echo (isset($widget) && $widget == "user") ? 'active':''; ?>">
                <a href="/admin/tai-khoan">
                    <p>Tài Khoản</p>
                </a>
            </li>
            <li  class="<?php echo (isset($widget) && $widget == "player") ? 'active':''; ?>">
                <a href="/admin/nhan-vat">
                    <p>Nhân vật</p>
                </a>
            </li>
            <li  class="<?php echo (isset($widget) && $widget == "giftcode") ? 'active':''; ?>">
                <a href="/admin/ma-qua-tang">
                    <p>Gift Code</p>
                </a>
            </li>
            <li  class="<?php echo (isset($widget) && $widget == "webshop") ? 'active':''; ?>">
                <a href="/admin/cua-hang">
                    <p>Webshop</p>
                </a>
            </li>
                    
        </ul>
    </div>
</div>