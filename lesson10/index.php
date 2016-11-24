<?php
require_once(__DIR__ . '/cdatabase.php');
require_once(__DIR__ . '/inews.php');
require_once(__DIR__ . '/inewsnew.php');
require_once(__DIR__ . '/cnews.php');

$news = new CNews();
$queryNewsList = $news->newsList();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Новости</title>
	<meta charset="utf-8">
	<style>
		table { 
			border-spacing: 0;
			border-collapse: collapse;
			width: 800px;
		}

		table td, table th {
			padding: 10px;
		}
	</style>
</head>	

<body>
	<h1>Новости</h1>
	<hr />

	<table>
<?php while (list($id, $title, $text, $author, $date_added) = $queryNewsList->fetch(PDO::FETCH_NUM)) : ?>
		<tr>
  			<td style="background: #eee;"><h2><?= $title ?></h2></td>
		</tr>
		<tr>
			<td><?= $text ?></td>
		</tr>
		<tr>
			<td>Автор: <strong><?= $author ?></strong> Дата публикации: <strong><?= $date_added ?></strong></td>
		</tr>
		<tr>
			<td>
				<a href="add.php"><button onlick="return false;">Добавить новость</button></a>
				<a href="edit.php?id=<?= $id ?>"><button onlick="return false;">Редактировать новость</button></a>
				<a href="delete.php?id=<?= $id ?>"><button onlick="return false;">Удалить новость</button></a>
			</td>
		</tr>
<?php endwhile; ?>		
	</table>
	
</body>
</html>