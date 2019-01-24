<?php
    include_once('controllers/product-ctrl.php');
    $title = 'Каталог товаров';
    include('header.php');
?>
	<h1 class="main">КАТАЛОГ ТОВАРОВ</h1>
    <div id="catalogue-all">
    <?php
        foreach ($products as $product) {
            if ($a++ >= 3) {
                break;
            }
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
    </div>
    <br style="clear: both;">
    <div id="button-more">
        <a href="#" onclick="more()">
            <button class="shop-button">Загрузить еще..</button>
        </a>
    </div>

<?php include('footer.php'); ?>