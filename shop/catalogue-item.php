<?php
	include('header.php');
	$query = "SELECT * FROM products p INNER JOIN images i ON p.id = i.product_id WHERE p.id = '$_GET[id]'";
    $product = mysqli_fetch_assoc(mysqli_query( $db_connect, $query ));
?>
<h1 class="main"><?=$product['name']?></h1>
<div class="cat-item-image">
	<img width="200" src="../<?=$product['image_url']?>">
</div>
<div class="product-info">
	<p class="price"><?=$product['price']?> руб.</p>
	<p class="qty"><b>В наличии:</b> <span><?=$product['qty']?> шт.</span></p>
	<p class="decription"><b>Описание:</b><br><?=$product['desc']?></p>
	<p><button class="shop-button">КУПИТЬ</button></p>
</div>
<?php include('footer.php'); ?>