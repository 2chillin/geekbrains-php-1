<?php
    include('controllers/product-ctrl.php');
    $title = $product['name'];
    include('header.php');
?>
    <h1 class="main"><?=$product['name']?></h1>
    <div class="cat-item-image">
	    <img width="200" src="<?=$product['image_url']?>">
    </div>
    <div class="product-info">
        <p class="price"><?=$product['price']?> руб.</p>
        <p class="qty"><b>В наличии:</b> <span><?=$product['qty']?> шт.</span></p>
        <p class="decription"><b>Описание:</b><br><?=$product['desc']?></p>
        <a href="#" onclick="item(<?=$product['id']?>)">
        <p><button class="shop-button">В КОРЗИНУ</button></p>
        </a>
    </div>
<?php include('footer.php'); ?>