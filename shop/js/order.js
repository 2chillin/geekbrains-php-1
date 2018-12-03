function remove(id){
    $.ajax({
        type: 'GET',
        url: '../controllers/user-ctrl.php',
        data: 'order-remove='+id,
        success: function(data){
            $('.message-err').html("Заказ #"+id+" удален!");
            $("#tr-order-"+id).remove();
        }
    });
}