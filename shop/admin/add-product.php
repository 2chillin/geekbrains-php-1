<?php
    include_once('../controllers/product-ctrl.php');
    $title = 'Админка';
    include('header.php');
    if(isset($_SESSION['login']) && isset($_SESSION['pass']) && $_SESSION['login'] == 'admin') {
?>
    <div class="content">
        <h2>Добавить товар</h2>
        <form method="post" enctype="multipart/form-data">
            <p>Наименование товара: <br><input type="text" name="name" maxlength="100" required></p>
            <p>Артикул: <br><input type="text" name="sku" maxlength="50" required></p>
            <p>Цена: <br><input type="number" name="price" maxlength="20" required></p>
            <p>Описание: <br><textarea name="desc" rows="10" cols="50" required></textarea></p>
            <p><strong>Загрузите картинку</strong></p>
            <p><input type="file" name="img" accept="image/jpeg,image/png,image/gif" required></p>
            <p><input type="submit" name="prod-add"></p>
        </form>
    </div>
<?php
    }else{
        echo "Доступ запрещен!";
    }
    include('footer.php');
?>