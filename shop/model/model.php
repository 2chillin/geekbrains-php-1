<?php
session_start();
include('../config.php');

function BaseGetAll($table, $connect,  $orderby='id') {
	$query = "SELECT * FROM $table ORDER BY $orderby DESC";
	if(!$res = mysqli_query( $connect, $query )) {
		echo 'error: '. mysqli_error($connect);
	}
	return $res;
}

function BaseGetWhere($table, $where, $connect,  $orderby='id') {
	$query = sprintf("SELECT * FROM {$table} WHERE {$where} ORDER BY '%s' DESC", $orderby);
	if(!$res = mysqli_query( $connect, $query )) {
		echo 'error: '. mysqli_error($connect);
	}
	return $res;
}

function BaseProdGetLimit($table, $limit, $offset, $connect,  $orderby='id') {
	$query = sprintf("SELECT * FROM {$table} WHERE products.id = images.product_id ORDER BY '%s' DESC LIMIT %d OFFSET %d", $orderby, $limit, $offset);
	if(!$res = mysqli_query( $connect, $query )) {
		echo 'error: '. mysqli_error($connect);
	}
	return $res;
}

function BaseInsertData ($table, $data, $connect){
	$query = "INSERT INTO  $table VALUES ($data)";
	if(!mysqli_query( $connect, $query )) {
		echo 'error: '. mysqli_error($connect);
	}
};

function BaseDeleteData($table, $data, $connect) {
	$query  = sprintf( "DELETE FROM $table WHERE $data" );
	if(!mysqli_query( $connect, $query )) {
		echo 'error: '. mysqli_error($connect);
	}
}

function CreateUser($login, $email, $pass, $connect){
	$t = "INSERT INTO users (user_login, user_email, user_password) VALUES ('%s','%s','%s')";
	$query = sprintf($t, mysqli_real_escape_string($connect, $login),mysqli_real_escape_string($connect, $email),mysqli_real_escape_string($connect, $pass));
	if(!mysqli_query( $connect, $query )){
		echo 'error: '. mysqli_error($connect);
	}
	return true;
}

function BaseGetProduct ($id, $connect) {
	$query = sprintf("SELECT * FROM products p INNER JOIN images i ON p.id = i.product_id WHERE p.id = '%d'", $id);
	if(!$res = mysqli_fetch_assoc(mysqli_query( $connect, $query ))) {
		echo 'error: '. mysqli_error($connect);
	}
	return $res;
}

function AddProduct($sku, $name, $price, $description, $image_name, $image_size, $image_path, $connect) {
	$t = "INSERT INTO products (sku, name, price, `desc`) VALUES ('%s','%s','%s','%s')";
	$query = sprintf($t, mysqli_real_escape_string($connect, $sku), mysqli_real_escape_string($connect, $name),
			 mysqli_real_escape_string($connect, $price), mysqli_real_escape_string($connect, $description));
	if(!mysqli_query( $connect, $query )){
		echo 'error: '. mysqli_error($connect);
	}
	$product_id = mysqli_insert_id( $connect );
	if ($image_name) {
		$t = "INSERT INTO images(image_url, image_size, image_name, product_id) VALUES ('%s','%s','%s','%s')";
		$query = sprintf($t, mysqli_real_escape_string( $connect, $image_path ), mysqli_real_escape_string( $connect, $image_size ),
			mysqli_real_escape_string( $connect, $image_name ), mysqli_real_escape_string( $connect, $product_id ));
		if (!mysqli_query( $connect, $query)) {
			echo 'error: ' . mysqli_error( $connect );
		}
	}
	header('Location: /catalogue-item.php?id='.$product_id);
}


function EditProduct($id, $sku, $name, $price, $description, $image_url, $image_size, $image_name, $connect){
	$t = "UPDATE products SET sku='%s', name='%s', price='%s', `desc`='%s' WHERE id='%d'";
	$query = sprintf($t, mysqli_real_escape_string($connect, $sku), mysqli_real_escape_string($connect, $name),
		mysqli_real_escape_string($connect, $price), mysqli_real_escape_string($connect, $description), $id);
	if(!mysqli_query( $connect, $query )){
		echo 'error: '. mysqli_error($connect);
	}
	if ($image_name) {
		$t = "UPDATE images SET image_url='%s', image_size='%s', image_name='%s' WHERE id='%d'";
		$query = sprintf($t, mysqli_real_escape_string( $connect, $image_url ), mysqli_real_escape_string( $connect, $image_size ),
			mysqli_real_escape_string( $connect, $image_name ), $id);
		if (!mysqli_query( $connect, $query)) {
			echo 'error: ' . mysqli_error( $connect );
		}
	}
}

function DeleteProduct($id, $table, $connect){
	$id = (int)$id;
	if($id == 0) {
		return false;
	}
	$query = sprintf("DELETE FROM {$table} where id='%d'", $id);
	if(!mysqli_query( $connect, $query )){
		echo 'error: '. mysqli_error($connect);
	}
	return mysqli_affected_rows($connect);
}

function NewCartOrder($product_id, $name, $sku, $price, $count, $login=null, $connect){

	$t = "INSERT INTO carts (product_id, name, sku, price, count, login) VALUES ('%d','%s','%s','%d','%d','%s')";

	$query = sprintf($t, mysqli_real_escape_string($connect, $product_id),mysqli_real_escape_string($connect, $name),mysqli_real_escape_string($connect, $sku),
		mysqli_real_escape_string($connect, $price), mysqli_real_escape_string($connect, $count),mysqli_real_escape_string($connect, $login));

	if(!mysqli_query( $connect, $query )){
		echo 'error: '. mysqli_error($connect);
	}

	return true;
}

function EditCartOrder($id, $count, $login, $connect){
	$id = (int)$id;
	$count = (int)$count;

	$t = "UPDATE carts SET count='%d' WHERE product_id='%d' AND login='%s'";

	$query = sprintf($t, mysqli_real_escape_string($connect, $count), $id, $login);

	if(!mysqli_query( $connect, $query )){
		echo 'error: '. mysqli_error($connect);
	}

	return mysqli_affected_rows($connect);
}

function GetCartOne ($id, $table, $connect){
	$query = sprintf("SELECT * FROM {$table} where id_good=%d",(int)$id);
	$result = mysqli_query($connect, $query);

	if(!$result)
		die(mysqli_error($connect));

	$res = mysqli_fetch_assoc($result);

	return $res;
}

function NewOrder ($products, $connect) {
	$query = "SELECT MAX(order_id) AS max FROM orders";
	$order_id = mysqli_fetch_array(mysqli_query($connect, $query));
	$order_id = ($order_id['max']);
	$order_id++;
	foreach ($products as $product) {
		BaseInsertData('orders (order_id, status, product_id, name, sku, price, count, login)', "'$order_id', 'В ожидании', 
		'$product[id]', '$product[name]', '$product[sku]', '$product[price]', '$product[count]', '$product[login]'", $connect);
		}
	BaseDeleteData('carts',"login='$_SESSION[login]'", $connect);

	header( 'Location: user-profile.php' );

}

function BaseGetOrders ($login, $type=0, $connect) {
	if ($type == 0) {
		$query = sprintf( "SELECT DISTINCT order_id, status, login FROM orders WHERE login='%s'", $login );
	} else {
		$query = sprintf("SELECT DISTINCT order_id, status, login FROM orders");
	}
	$res = mysqli_query($connect, $query);
	$i=0;
	foreach($res as $row) {
		$query = "SELECT SUM(price) AS summa FROM orders WHERE order_id=$row[order_id]";
		$sum = mysqli_fetch_array(mysqli_query($connect, $query));
		$query = "SELECT SUM(count) AS qty FROM orders WHERE order_id=$row[order_id]";
		$qty = mysqli_fetch_array(mysqli_query($connect, $query));
		$order_arr[$i]->id = $row['order_id'];
		$order_arr[$i]->qty = $qty['qty'];
		$order_arr[$i]->summa = $sum['summa'];
		$order_arr[$i]->status = $row['status'];
		$order_arr[$i]->login = $row['login'];
		$i++;
	}
	return $order_arr;
}

?>