<?php
	// подключение библиотек
	require __DIR__ . '/secure/session.inc.php';
	require __DIR__ .  '/../inc/lib.inc.php';
	require __DIR__ .  '/../inc/config.inc.php';

	$title = trim(strip_tags($_POST['title']));
	$author = trim(strip_tags($_POST['author']));
	$pubyear = abs((int)$_POST['pubyear']);
	$price = abs((int)$_POST['price']);

	

	if(!addItemToCatalog($title, $author, $pubyear, $price)) {
		echo 'Произошла ошибка при добавлении товара';
	}else {
		header('Location: add2cat.php');
		exit;
	}