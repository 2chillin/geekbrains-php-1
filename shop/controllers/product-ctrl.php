<?php
require_once($_SERVER['DOCUMENT_ROOT']."../model/model.php");

$products = BaseGetWhere('products, images', 'products.id = images.product_id', $db_connect);

if (isset($_GET['id'])) {
		$product = BaseGetProduct((int)$_GET['id'], $db_connect);
}

if($_POST['prod-add']) {
	if ($_FILES) {
		$image_path = "../img/".$_FILES['img']['name'];
		$image_name = $_FILES['img']['name'];
		$image_size = $_FILES['img']['size'];
		if (!file_exists($image_path)) {
			move_uploaded_file( $_FILES['img']['tmp_name'], $image_path );
		}
	}
	AddProduct($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['desc'], $image_name, $image_size, $image_path, $db_connect);
}

if (isset($_GET['edit-product-id'])) {
	$product = BaseGetProduct((int)$_GET['edit-product-id'], $db_connect);
}

if ($_POST['edit-submit']) {
	if ($_FILES) {
		$image_path = "../img/".$_FILES['img']['name'];
		$image_name = $_FILES['img']['name'];
		$image_size = $_FILES['img']['size'];
		if (!file_exists($image_path)) {
			move_uploaded_file( $_FILES['img']['tmp_name'], $image_path );
		}
	}
	EditProduct($_POST['product_id'], $_POST['sku'], $_POST['name'], $_POST['price'], $_POST['description'], $image_path, $image_size, $image_name, $db_connect);
	$message = "<span class='message-ok'>Изменения сохранены!</span>";
}

if($_GET['delete-id']){
	$id= $_GET['delete-id'];
	DeleteProduct( $id,'products', $db_connect);
	//надо еще удалять картинки
	header("Location: ../admin/index.php");
}
?>