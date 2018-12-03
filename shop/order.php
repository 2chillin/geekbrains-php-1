<?php
include_once('controllers/user-ctrl.php');
$title = 'Каталог товаров';
include('header.php');

if(isset($_SESSION['login']) && isset($_SESSION['pass']) && isset($_GET['order_id'])) { ?>

<h1 class="main">Заказ #<?=$_GET['order_id']?></h1>
<?php
	$i=0;
	echo "<table style='width: 99%' class='table-zebra'><tr class='zebra-head'><td><b>Наименование товара</b></td><td><b>Цена</b></td><td><b>Количество</b></td></tr>";
	foreach ($order as $item){?>
	<tr>
		<td><h3 class="item-name"><a href="catalogue-item.php?id=<?=$item['product_id']?>"><?=$item['name']?></a></h3></td>
		<td><?=$item['price']?> р.</td>
		<td><?=$item['count']?></td>
	</tr>
	<?php
	$i++;
	$price_res += $item['price'];
	$count_res += $item['count'];
}
echo "<tr class='zebra-foot'><td><b>Количество наименований:</b> $i</td><td><b>Общая сумма:</b> $price_res  р.</td><td><b>Количество товаров:</b> $count_res шт.</td></tr></table>";
echo "<p><a href='user-profile.php'><b>Вернуться в личный кабинет</b></a></p>";
echo "<p><a href='user-profile.php?order-remove=$_GET[order_id]'><u>Удалить заказ</u></a></p>";
?>


<?php } include('footer.php'); ?>