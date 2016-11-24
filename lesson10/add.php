<?php
require_once(__DIR__ . '/cdatabase.php');
require_once(__DIR__ . '/inews.php');
require_once(__DIR__ . '/inewsnew.php');
require_once(__DIR__ . '/cnews.php');

$news = new CNews();
$queryInsertNews = $news->newsInsert();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Добавление новости</title>
	<meta charset="utf-8">
</head>	

<body>
	<h1>Добавить новость</h1>
	<hr />

	<form method="POST" action="add.php">
		<h3>Название новости</h3>
		<input type="text" name="title">
		<h3>Текст новости</h3>
		<textarea name="text" cols="40" rows="10"></textarea>
		<h3>Автор новости</h3>
		<input type="text" name="author">
		<br />
		<br />
		<button type="submit" name="add">Добавить новость</button>
		<button type="reset">Сбросить</button>
	</form>
		<br />
		<a href="index.php"><button onlick="return false;">< Назад</button></a>
</body>
</html>