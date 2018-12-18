<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link href="css/style.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/order.js"></script>
	<title><?=$title?></title>
</head>
<body>
<div class="main-wrap">
    <div class="header">
        <div class="logo"><a href="./">«ACME Shop»<br><span>A COMPANY MAKING EVERYTHING</span></a></div>
        <div class="contacts"></div>
        <div class="top-menu">
            <ul class="menu">
            <?php if(isset($_SESSION['login']) && isset($_SESSION['pass'])):?>
                <?php if($_SESSION['login'] == 'admin') : ?>
                <li><a href="admin/index.php">Админка</a></li>
                <?php else: ?>
                <li><a href="user-profile.php">Личный кабинет</a></li>
	            <?php endif; ?>
                <li><a href="login.php?action=logout">Выход</a></li>
            <?php else: ?>
                <li><a href="login.php">Вход</a></li>
                <li><a href="register.php">Регистрация</a></li>
            <?php endif; ?>
            </ul>
        </div>
        <div class="main-menu">
            <ul class="menu">
                <li><a href="./">Главная</a></li>
                <li><a href="catalogue.php">Каталог</a></li>
                <li><a href="testimonials.php">Отзывы</a></li>
                <li><a href="">Контакты</a></li>
            </ul>
        </div>
    </div>
    <div>
        <br>
<?php
if(isset($_SESSION['cart'])) {
	echo "<b class='cart'>Корзина: <span class='cart-items'><a href='cart.php'><u>Просмотреть товары</u></a></span></b>";
}else{
	echo "<b class='cart'>Корзина: <span class='cart-items'>Корзина пуста</span></b>";
}
?>
    </div>
