<?php
include_once $_SERVER['DOCUMENT_ROOT']."/model/model.php";
if(isset($_SESSION['login']) && isset($_SESSION['pass']) && $_SESSION['login']=='admin') {

	if (isset($_GET['order-remove'])) {
		$order_remove_id = (int)$_GET['order-remove'];
		BaseDeleteData ('orders', "order_id='$order_remove_id'",$db_connect);
	}

	$orders = BaseGetOrders('user', '1', $db_connect);

	$order = BaseGetWhere('orders',"order_id='$_GET[order_id]'", $db_connect);
}
?>