<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/model/model.php");
if(isset($_SESSION['login']) && isset($_SESSION['pass'])) {
	$count = 1;
	$login = $_SESSION['login'];
	if ( isset( $_POST['id'] ) ) {
		$id = (int) ( $_POST['id'] );

		$product = BaseGetProduct( $id, $db_connect );

		$cartProd = mysqli_fetch_assoc(BaseGetWhere( 'carts', "product_id = $id  AND login = '$login'", $db_connect ));

		$_SESSION['cart'] = 1;

		if ( isset( $cartProd ) ) {
			$id    = $cartProd['product_id'];
			$count = $cartProd['count'];
			$count ++;
			EditCartOrder( $id, $count, $login, $db_connect );
		} else {
			NewCartOrder( $id, $product['name'], $product['sku'], $product['price'], $count, $login, $db_connect );
		}
		echo "<a href='cart.php'><u>Просмотреть товары</u></a>";
	}

	$cartProds = BaseGetWhere( 'carts', "login = '$login'", $db_connect );

	if ( isset( $_GET['action'] ) and $_GET['action'] == 'clear' ) {
		unset ($_SESSION['cart']);
		BaseDeleteData('carts',"login='$_SESSION[login]'", $db_connect);
		header( 'Location: cart.php' );
	}

	if ( isset( $_GET['action'] ) and $_GET['action'] == 'order' ) {
		unset ($_SESSION['cart']);
		NewOrder ($cartProds, $db_connect);
			}
} else {
	echo 'Для использования корзины, <a href="login.php">войдите</a> или <a href="register.php">зарегистрируйтесь</a>';
	die;
}
?>