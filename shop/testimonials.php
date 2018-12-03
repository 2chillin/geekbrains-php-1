<?php include('header.php'); ?>
<h1 class="main">Отзывы</h1>
<?php
//Записываем новый отзыв
if(isset($_POST['testSubmit'])) {
	$date = date('d-m-Y H:i');
	$query = "INSERT INTO testimonials (name, text, date) VALUES ('$_POST[name]', '$_POST[testimonial]', '$date')";
	if(!mysqli_query( $db_connect, $query )) {
		echo 'error'. mysqli_error($db_connect);
	};
}
$query = "SELECT * FROM testimonials ORDER BY date DESC ";
$res = mysqli_query($db_connect, $query);
foreach ($res as $testimonial) { ?>
	<h2 class='testimonials'><?=$testimonial['name']?> <span>(<?=$testimonial['date']?>)</span></h2>
	<p style='border-bottom: 1px dotted #ccc; margin: 5px 0 5px 0; padding-bottom: 10px;'><?=$testimonial['text']?></p>
<?php } ?>
	<br style="clear: both;" />
	<form method="POST" class="testimonials">
		<p><b>Ваше имя:</b></p>
		<input name="name" value="<?=$_POST['name']?>">
		<p><b>Отзыв:</b></p>
		<textarea maxlength="1000" name="testimonial" rows="10" cols="45"><?=$_POST['testimonial']?></textarea>
		<br><br>
		<button class="shop-button" type="submit" name="testSubmit">ОТПРАВИТЬ</button>
	</form>
<?php include('footer.php'); ?>