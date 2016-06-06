<?
	require __DIR__ . "/secure/session.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Форма добавления товара в каталог</title>
</head>
<body>
	<h2>Добавить товар в каталог</h2>
	<form action="save2cat.php" method="post">
		<p><label>Название:</label> <input type="text" name="title" size="100"></p>
		<p>Автор: <input type="text" name="author" size="50"></p>
		<p>Год издания: <input type="text" name="pubyear" size="4"></p>
		<p>Цена: <input type="text" name="price" size="6"> руб.</p>
		<p><input type="submit" value="Добавить"></p>
	</form>
</body>
</html>