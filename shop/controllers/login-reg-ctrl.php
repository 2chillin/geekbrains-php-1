<?php

include ("model/model.php");

if(isset($_POST['register'])){
	$login = trim(strip_tags($_POST['login']));
	$users = BaseGetAll( 'users', $db_connect);
	foreach ($users as $user) {
		if ( $login == $user['user_login'] ) {
			$message = "<span class='message-err'>Этот логин занят. Выберите другой.</span>";
			$check = true;
			break;
		}
	}
	if (!$check) {
		if ( filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) ) {
			$email = trim( strip_tags( $_POST['email'] ) );
		}
		$pass = trim( strip_tags( $_POST['pass'] ) );
		CreateUser( $login, $email, md5( $pass ), $db_connect );
		$message = "<span class='message-ok'>Вы зарегистрированы!</span>";
	}
}

if(isset($_POST['login-button'])){
	$login = trim(strip_tags($_POST['login']));
	$pass = trim(strip_tags($_POST['pass']));

	$users = BaseGetAll('users', $db_connect);
	foreach ($users as $user) {
		if($login == $user['user_login'] and md5($pass) == $user['user_password']){
			$message = "<span class='message-ok'>Вход выполнен!</span>";
			$_SESSION['login'] = $login;
			$_SESSION['pass'] = $pass;
			header('Location: user-profile.php');
		}else{
			$message = "<span class='message-err'>Неправильный логин или пароль!</span>";
		}
	}
}

if($_GET['action'] == 'logout'){
	unset($_SESSION['login']);
	unset($_SESSION['pass']);
	session_destroy();
	header('Location: index.php');
}