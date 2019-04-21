var m=0;
function more(){
    m++;
    $.ajax({
        type: 'POST',
        url: '../controllers/product-ctrl.php',
        data: 'mre='+m,
        success: function(data) {
            $("#catalogue-all").append(data);
            $("html, body").animate({ scrollTop: $(document).height() }, "fast");
        }
    })
}