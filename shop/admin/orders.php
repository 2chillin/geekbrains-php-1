<?php
include_once('../controllers/orders-ctrl.php');
$title = 'Админка';
include('header.php');
 if(isset($_SESSION['login']) && isset($_SESSION['pass'])) {?>
	<h2 class="main">Заказы</h2>
	<b><p class="message-err"></p></b>
	<table class='table-zebra'>
		<tr><td><b>Номер заказа</b></td><td><b>Товаров</b><td><b>Сумма</b></td><td><b>Статус</b></td><td><b>Пользователь</b></td></tr>
		<?php foreach($orders as $order) { ?>
			<tr id="tr-order-<?=$order->id?>"><td><a href="order.php?order_id=<?=$order->id?>">#<?=$order->id?></a></td><td><a href="order.php?order_id=<?=$order->id?>">
						<?=$order->qty?> шт.</a></td><td><a href="order.php?order_id=<?=$order->id?>"><?=$order->summa?> руб.</a></td>
				<td><a href="order.php?order_id=<?=$order->id?>"><?=$order->status?></a></td><td><?=$order->login?></td>
				<td><a href="order.php?order_id=<?=$order->id?>">Подробно</a></td>
				<td><a href="#" onclick="remove(<?=$order->id?>)">Удалить</td>
			</tr>
		<?php }
		?>
	</table>

<?php }
include('footer.php');
?>