<?php
require_once(__DIR__ . '/cdatabase.php');
require_once(__DIR__ . '/inews.php');
require_once(__DIR__ . '/inewsnew.php');
require_once(__DIR__ . '/cnews.php');

$news = new CNews();
$queryNewsSelectId = $news->newsSelectId();
$queryNewsUpdateId = $news->newsUpdateId();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Редактирование новости</title>
	<meta charset="utf-8">
</head>	

<body>
	<h1>Редактировать новость</h1>
	<hr />

	<form method="POST" action="edit.php?id=<?= $queryNewsSelectId["id"] ?>">
		<h3>Название новости</h3>
		<input type="text" name="title" value="<?= $queryNewsSelectId["title"] ?>" >
		<h3>Текст новости</h3>
		<textarea name="text" cols="40" rows="10"><?= $queryNewsSelectId["text"] ?></textarea>
		<h3>Автор новости</h3>
		<input type="text" name="author" value="<?= $queryNewsSelectId["author"] ?>">
		<br />
		<br />
		<button type="submit" name="save">Сохранить новость</button>
	</form>
</body>
</html>