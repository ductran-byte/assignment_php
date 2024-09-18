<script> page= 1; </script>
<div class="sweet-overlay hide" id="GuideModal" tabindex="-1" style="opacity: 1.07; display: block;">
    <div class="sweet-alert showSweetAlert visible" data-custom-class="" data-has-cancel-button="true" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="true" data-animation="pop" data-timer="null" style="display: block; margin-top: -350px;">
        <h4 class="title" style="color: white;"><b>Add Gift code </b></h4>
        <div class="content">
            <div style="display: block;" class="list"></div>
        </div>
        <div class="sa-button-container">
            <button class="cancel" tabindex="2" style="display: inline-block; box-shadow: none;">Không</button>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".guide").on("click", function(){
            $("#GuideModal").removeClass('hide');
        })
    });

    function load_list(){
        $(".list").hide();
        $.post("/admin/assets/ajax/item.php", {page : page})
        .done(function(data) {
            $(".list").html('');
            $('.list').empty().append(data);
            $(".list").show();   
        }); 
    }
    load_list();
</script>