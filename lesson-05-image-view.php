<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link href="../css/styles.css" type="text/css" rel="stylesheet">
	<title>Gallery</title>
</head>
<body>
<?php
require ("config.php");

if($_GET['image_id']) {
	$image_id = $_GET['image_id'];

	$query = "UPDATE images SET views=views+1 WHERE id=$image_id";
	mysqli_query($db_connect, $query);

	$query = "SELECT * FROM images WHERE id=$image_id";
	$res = mysqli_query($db_connect, $query);
	$image = mysqli_fetch_assoc($res);

	echo "<div class='image-container'>					
			  	<img class='img-big' src='../img/$image[name]'>
			  	<p style='color: #aaa'>Посмотров: $image[views]</p>
		  </div>";

}

?>
</body>
</html>
