<?php
$title = "Регистрация";
include_once('controllers/login-reg-ctrl.php');
include('header.php');
?>
<h1 class="main">Регистрация</h1>
<?
if(isset($_SESSION['login']) && isset($_SESSION['pass'])){
	echo "Вы уже вошли";
}else{
	echo $message?$message:"";?>
	<form method="post">
         <table class="login">
             <tr>
                 <td><label class="label" for="login">Логин:</label></td><td><input type="text" name="login" maxlength="30" placeholder="Введите Логин" autofocus required></td>
             </tr>
             <tr>
                 <td><label class="label" for="email">Email:</label></td><td><input type="email" name="email" maxlength="30" placeholder="Введите Email" required></td>
             </tr>
             <tr>
                 <td><label class="label" for="pass">Пароль:</label></td><td><input type="password" minlength="2" name="pass" placeholder="Введите Пароль" required></td>
             </tr>
             <tr>
                 <td colspan="2"><input type="submit" name="register" value="Зарегистрироваться" "></td>
             </tr>
         </table>
    </form>
<?}
include('footer.php'); ?>
