<?php
include_once('controllers/user-ctrl.php');
$title = 'Каталог товаров';
include('header.php');
?>
<h1 class="main">Личный кабинет</h1>

<?php if(isset($_SESSION['login']) && isset($_SESSION['pass'])) {
	echo "Приветствую вас, ".$_SESSION['login'].'<br>'; ?>
<h2 class="main">Ваши заказы</h2>
    <b><p class="message-err"></p></b>
    <table class='table-zebra'>
        <tr><td><b>Номер заказа</b></td><td><b>Товаров</b><td><b>Сумма</b></td><td><b>Статус</b></td></tr>
<?php
foreach($orders as $order) { ?>
    <tr id="tr-order-<?=$order->id?>"><td><a href="order.php?order_id=<?=$order->id?>">#<?=$order->id?></a></td><td><a href="order.php?order_id=<?=$order->id?>">
               <?=$order->qty?> шт.</a></td><td><a href="order.php?order_id=<?=$order->id?>"><?=$order->summa?> руб.</a></td>
        <td><a href="order.php?order_id=<?=$order->id?>"><?=$order->status?></a></td>
        <td><a href="order.php?order_id=<?=$order->id?>">Подробно</a></td>
        <td><a href="#" onclick="remove(<?=$order->id?>)">Удалить</td>

    </tr>
<?php }
?>
    </table>
<?php
} else {
	echo 'Для использования личного кабинета необходимо <a href="login.php">войти</a> или <a href="register.php">зарегистрироваться</a><br>';
}
?>
<?php include('footer.php'); ?>
