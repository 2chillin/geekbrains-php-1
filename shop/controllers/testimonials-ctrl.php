<?php

	include_once('model/model.php');

	//Записываем новый отзыв
	if(isset($_POST['testSubmit'])) {
		echo $_POST['testSubmit'];
		$name = $_POST['name'];
		$date = date('d-m-Y H:i');
		$text = $_POST['testimonial'];

		BaseInsertData ("testimonials (name, text, date)", "'$name', '$text', '$date'", $db_connect);
	}

?>