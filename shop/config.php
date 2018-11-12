<?php
//Database config
$db_name = 'shop';
$db_host = '192.168.1.10';
$db_user = 'shop';
$db_pass = '1234567890';
$db_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$db_connect) {
	echo "Ошибка: Невозможно установить соединение с MySQL<br>";
	echo "<br>Код ошибки errno: " . mysqli_connect_errno();
	echo "<br>Текст ошибки error: " . mysqli_connect_error();
	exit;
}
?>