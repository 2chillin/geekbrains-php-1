<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link href="css/styles.css" type="text/css" rel="stylesheet">
	<title>Gallery</title>
</head>
<body>
<?php

function gallery ($url) {
	$images = scandir(img);
	for ($i=2;$i<count($images);$i++) {
		echo "<div class='gallery'>
					<a target='_blank' href='img/$images[$i]'>
			  			<img width='70' src='img/$images[$i]'>
		      		</a>
		      </div>";
	}
}

gallery ('img');

?>
</body>
</html>
