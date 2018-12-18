<?php
include_once $_SERVER['DOCUMENT_ROOT']."/model/model.php";
if(isset($_SESSION['login']) && isset($_SESSION['pass'])) {

	if (isset($_GET['order-remove'])) {
		$order_remove_id = (int)$_GET['order-remove'];
		BaseDeleteData ('orders', "order_id='$order_remove_id' AND login='$_SESSION[login]'",$db_connect);
	}

	$cartProds = BaseGetWhere( 'carts', "login = '$_SESSION[login]'", $db_connect );

	$orders = BaseGetOrders( $_SESSION['login'], '',  $db_connect );

	if (isset($_GET['order_id'])) {
		$order_id = (int)($_GET['order_id']);
		$order = BaseGetWhere('orders',"order_id='$order_id' AND login='$_SESSION[login]'", $db_connect);
	}

	if ($cartProds->num_rows > 0) {
		$_SESSION['cart'] = 1;
	}
}

?>