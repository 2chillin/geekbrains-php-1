<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link href="css/styles.css" type="text/css" rel="stylesheet">
	<title>Gallery</title>
</head>
<body>
<?php

require ("config.php");

//Если приехал файл - загружаем в базу
if ($_FILES) {
	$path = "img/".$_FILES['photo']['name'];
	if (!file_exists($path)) {

        $name = $_FILES['photo']['name'];
        $size = $_FILES['photo']['size'];

        move_uploaded_file( $_FILES['photo']['tmp_name'], $path );

        $query = "INSERT INTO images (image_url, image_size, image_name) VALUES ('$path', '$size', '$name')";
        if ( !mysqli_query( $db_connect, $query ) ) {
            printf( "Ошибка: %s\n", mysqli_error( $db_connect ) );
        }
	}
}

//Выводим галаерею
$query = "SELECT * FROM images ORDER BY image_views DESC ";

$res = mysqli_query($db_connect, $query);

foreach ($res as $image) {
	echo "<div class='gallery'>
		    <a href='lesson-05-image-view.php/?image_id=$image[id]'>
			  	<img width='70' src='img/$image[name]'>
		   	</a>
		 </div>";
}

?>

<form action="" method="POST" enctype="multipart/form-data">
    <p>Выберите файл для загрузки: </p>
    <input type="file" name="photo" accept="image/*"><br><br>
	<input type="submit" value="Отправить">
</form>
</body>
</html>
