<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/config.inc.php";
     
	$id = (int)$_GET['id'];
	$quantity = 1;
	add2Basket($id, $quantity);
	header('Location: catalog.php');
	exit;