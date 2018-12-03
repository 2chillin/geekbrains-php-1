<?php
$title = 'Админка';
include('../controllers/product-ctrl.php');
include('header.php');
if(isset($_SESSION['login']) && isset($_SESSION['pass']) && $_SESSION['login'] == 'admin') {
?>
<?php
if ($products) {
	foreach ($products as $product) {
?>
<div class="cat-product">
    <h3 class="item-name"><?= $product['name'] ?></h3>
    <img width="150" src="../<?= $product['image_url'] ?>"><br><br>
    <a href="edit-product.php?edit-product-id=<?= $product['id'];?>">
        <button class="shop-button" style="text-align: center" name="prod-edit">Редактировать</button>
    </a>
    <br><br>
    <a href="?delete-id=<?= $product['id'] ?>">
        <button class="shop-button" style="text-align: center" name="prod-delete">Удалить</button>
    </a>
</div>
<?		}
	}
}else{
    echo "Доступ запрещен!";
}

include('footer.php'); ?>
