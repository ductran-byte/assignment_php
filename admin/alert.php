<style>.hide {display: none;}</style>
<div class="sweet-overlay hide" tabindex="-1" style="opacity: 1.07; display: block;">
    <div class="sweet-alert showSweetAlert visible" data-custom-class="" data-has-cancel-button="true" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="true" data-animation="pop" data-timer="null" style="display: block; margin-top: -168px;">
        <div class="sa-icon sa-warning pulseWarning" style="display: block;">
            <span class="sa-body pulseWarningIns"></span>
            <span class="sa-dot pulseWarningIns"></span>
        </div>
        <h2>Xác nhận</h2>
        <p class="title" id="title-text" style="display: block; background-color: white;color: crimson;font-weight: 600;font-size: 1.3rem;"></p>
        <div class="sa-button-container">
            <button class="cancel" tabindex="2" style="display: inline-block; box-shadow: none;">Không</button>
            <div class="sa-confirm-button-container">
            <?php if($widget == 'user') {
                echo'
                    <form action="/admin/truy-van-user" method="POST" class="d-inline">
                        <button type="submit" name="" id="submit" class="confirm" tabindex="1" style="display: inline-block; background-color: rgb(221, 107, 85); box-shadow: rgba(221, 107, 85, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset;">Có</button>
                    </form>
                ';
            } ?>
            </div>
        </div>
    </div>
</div>