function item(id){
    $.ajax({
        type: 'POST',
        url: '../controllers/cart-ctrl.php',
        data: 'id='+id,
        success: function(data){
            alert("Вы добавили товар в корзину!");
            $(".cart-items").html(data);
        }
    });
}