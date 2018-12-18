<?php
	include_once "controllers/cart-ctrl.php";
	$title = 'Корзина';
	include('header.php');
?>
<h1 class="main">Корзина</h1>
<?php
	if($cartProds->num_rows > 0){
		$i=0;
		echo "<table style='width: 99%' class='table-zebra'><tr class='zebra-head'><td><b>Наименование товара</b></td><td><b>Цена</b></td><td><b>Количество</b></td></tr>";
		foreach ($cartProds as $cartProduct){?>
			<tr>
				<td><h3 class="item-name"><a href="catalogue-item.php?id=<?=$cartProduct['product_id']?>"><?=$cartProduct['name']?></a></h3></td>
				<td><?=$cartProduct['price']?> р.</td>
				<td><?=$cartProduct['count']?></td>
			</tr>
<?php
		$i++;
		$price_res += $cartProduct['price'];
		$count_res += $cartProduct['count'];
		}
		echo "<tr class='zebra-foot'><td><b>Количество наименований:</b> $i</td><td><b>Общая сумма:</b> $price_res  р.</td><td><b>Количество товаров:</b> $count_res шт.</td></tr></table>";
		echo "<p><a href='cart.php?action=order'><b><u>Оформить заказ</u></b></a></p>";
		echo "<p><a href='cart.php?action=clear'><u>Очистить корзину</u></a></p>";
		} else {
	    echo 'Корзина пуста...<br>';
    }
?>
<?php include "footer.php"; ?>
