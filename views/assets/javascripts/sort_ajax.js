$(document).ready(function(){

    function sort(index,order){

        $.ajax({
            type: 'POST',
            url: 'routes.php?keyword=<?php echo $_GET['keyword']; ?>',
            data: 'index=' + index + '&order=' + order,
            beforeSend: function (html) {
                $('.loading-overlay').show();
            },
            success: function (html) {
                $('.loading-overlay').hide();
                $('#productData').html(html);
            }
        });
    }
});
