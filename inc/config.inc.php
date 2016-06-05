<?php
header("Content-Type: text/html; charset=utf-8");

const DB_HOST = 'localhost';
const DB_LOGIN = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'eshop';
const ORDERS_LOG = 'orders.log';

//Для хранения корзины пользователя
$basket = [];
//Хранение количество товаров в корзине пользователя
$count = 0;
//Устанавливаем соединение с БД MySQL
$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);

if (mysqli_connect_errno()) {
    echo "Не удалось установить соединение";
    exit;
}