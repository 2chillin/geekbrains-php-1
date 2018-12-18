<?php
	include_once('../controllers/product-ctrl.php');
	$title = 'Изменить товар';
	include('header.php');
	if(isset($_SESSION['login']) && isset($_SESSION['pass']) && $_SESSION['login'] == 'admin') {
	echo $message?$message:"";
?>
		<div class="content">
			<form method="post" enctype="multipart/form-data">
				<p><strong>Добавить товар:</strong></p>
				<p>Наименование: <br><input type="text" name="name" maxlength="100" value="<?=$product['name']?>"></p>
                <p>Артикул: <br><input type="text" name="sku" maxlength="100" value="<?=$product['sku']?>"></p>
				<p>Описание: <br><textarea name="description" rows="10" cols="50"><?=$product['desc']?></textarea></p>
				<p>Цена: <br><input type="number" name="price" maxlength="20" value="<?=$product['price']?>" ></p>
				<p><strong>Загрузить картинку (JPEG, PNG или GIF)</strong></p>
				<p><img src="../<?=$product['image_url']?>" width="200"></p>
				<p><input type="file" name="img" accept="image/jpeg,image/png,image/gif"></p>
				<input type="hidden" name="src" value="<?=$product['image_url']?>">
				<input type="hidden" name="product_id" value="<?=$product['id']?>">
				<p><input type="submit" name="edit-submit" value="Сохранить"></p>
			</form>
		</div>
<?php
	}else{
		echo "Доступ запрещен!";
	}
	include('footer.php');
?>
