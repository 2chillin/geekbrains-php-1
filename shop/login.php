<?php

if(isset($_SESSION['login']) && isset($_SESSION['pass'])){
    $title = "Личный кабинет";
} else {
    $title = "Логин";
}
include_once('controllers/login-reg-ctrl.php');
include('header.php');
if(isset($_SESSION['login']) && isset($_SESSION['pass'])){
	echo "<h1 class='main'>Вход на сайт</h1>";
	echo 'Вы уже вошли. <a href="login.php?action=logout">Выход</a><br>';
}else{
	echo "<h1 class='main'>Вход на сайт</h1>";
	echo $message?$message:"";?>
	<form method="post">
         <table class="login">
             <tr>
                 <td><label class="label" for="login">Логин:</label></td><td><input type="text" name="login" maxlength="20" placeholder="Введите Логин" autofocus required></td>
             </tr>
             <tr>
                 <td><label class="label" for="login">Пароль:</label></td><td><input type="password" minlength="2" name="pass" placeholder="Введите Пароль" required></td>
             </tr>
             <tr>
                 <td colspan="2"><input type="submit" name="login-button" value="Войти" "></td>
             </tr>
         </table>
	</form>
<?}
include('footer.php'); ?>