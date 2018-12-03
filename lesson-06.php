<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link href="css/styles.css" type="text/css" rel="stylesheet">
	<title>Calculator</title>
</head>
<body>
<?php
if (isset($_POST['calc'])) {
	if ($_POST['secondNumber'] == 0) {
		echo 'Фуууф, хорошо что стоит проверка! Ты только что чуть не поделил на 0!!!!!<br><br>';
	} else {
		switch ( $_POST['operation'] ) {
			case 'plus':
				$calcResult = $_POST['firstNumber'] + $_POST['secondNumber'];
				break;
			case 'minus':
				$calcResult = $_POST['firstNumber'] - $_POST['secondNumber'];
				break;
			case 'mult':
				$calcResult = $_POST['firstNumber'] * $_POST['secondNumber'];
				break;
			case 'div':
				$calcResult = $_POST['firstNumber'] / $_POST['secondNumber'];
				break;
		}
	}
}

if (isset($_POST['plus'])) {
	$calcResult = $_POST['firstNumber'] + $_POST['secondNumber'];
}

if (isset($_POST['minus'])) {
	$calcResult = $_POST['firstNumber'] - $_POST['secondNumber'];
}

if (isset($_POST['mult'])) {
	$calcResult = $_POST['firstNumber'] * $_POST['secondNumber'];
}

if (isset($_POST['div'])) {
    if ($_POST['secondNumber'] == 0) {
	    echo 'Фуууф, хорошо что стоит проверка! Ты только что чуть не поделил на 0!!!!!<br><br>';
    } else {
	    $calcResult = $_POST['firstNumber'] / $_POST['secondNumber'];
    }
}
?>
<form method="POST">
	<input type="number" name="firstNumber" value="<?=$_POST['firstNumber']?>">
	<select name="operation">
		<option value="plus">+</option>
		<option value="minus">-</option>
		<option value="mult">*</option>
		<option value="div">/</option>
	</select>
	<input type="number" name="secondNumber" value="<?=$_POST['secondNumber']?>">
	<span> = <?=$calcResult?></span>
	<div style="margin:20px 140px;">
		<button type="submit" name="plus">+</button>
		<button type="submit" name="minus">-</button>
		<button type="submit" name="mult">*</button>
		<button type="submit" name="div">/</button>
	</div>
	<button type="submit" name="calc">Выполнить</button>
</form>
</body>
</html>