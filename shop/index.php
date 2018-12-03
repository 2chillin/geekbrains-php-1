<?php
    include_once('controllers/product-ctrl.php');
    $title = 'ACME SHOP';
    include('header.php');
?>
    <h1 class="main">КАТАЛОГ ТОВАРОВ</h1>
<?php
    foreach ($products as $product) {
?>
    <div class="cat-product">
        <h3><?=$product['name']?></h3>
        <div class="image">
            <a href="catalogue-item.php?id=<?=$product['id']?>">
                <img width="150" src="<?=$product['image_url']?>">
            </a>
        </div>
        <p class="price"><?=$product['price']?> руб.</p>
        <a href="catalogue-item.php?id=<?=$product['id']?>">
            <button class="shop-button">ПОДРОБНО</button>
        </a>
        <br><br>
        <a href="#" onclick="item(<?=$product['id']?>)">
            <button class="shop-button">В КОРЗИНУ</button>
        </a>
    </div>
<?php } ?>

<?php include('footer.php'); ?>