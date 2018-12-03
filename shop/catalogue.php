<?php include('header.php'); ?>
	<h1 class="main">КАТАЛОГ ТОВАРОВ</h1>
<?php
	$query = "SELECT * FROM products, images where products.id = images.product_id";
    $res = mysqli_query( $db_connect, $query );
	if(!mysqli_query( $db_connect, $query )) {
		echo 'error'. mysqli_error($db_connect);
	};
	foreach ($res as $product) {
?>
	<div class="cat-product">
		<h3><?=$product['name']?></h3>
		<div class="image">
            <a href="catalogue-item.php?id=<?=$product['id']?>">
                <img width="150" src="../<?=$product['image_url']?>">
            </a>
        </div>
        <p class="price"><?=$product['price']?> руб.</p>
        <a href="catalogue-item.php?id=<?=$product['id']?>">
            <button class="shop-button">Подробно</button>
        </a>
    </div>
<?php } ?>

<?php include('footer.php'); ?>