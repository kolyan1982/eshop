<?php

//Функция сохраняет новый товар
function addItemToCatalog($title, $author, $pubyear, $price){
    global $link;

    $stmt = mysqli_prepare($link, "INSERT INTO catalog (title, author, pubyear, price) 
                   VALUES (?, ?, ?, ?)");


    mysqli_stmt_bind_param ($stmt, 'ssii', $title, $author, $pubyear, $price);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

//Функция выборка товара из БД и возвращает в виде ассоциативного массива

function selectAllItems(){
    global $link;
    
    $sql = "SELECT * FROM catalog";
    $result = mysqli_query($link, $sql);
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $items;
}

function saveBasket(){
    global $basket;
    $basket = base64_encode(serialize($basket));
    setcookie('basket', $basket, 0x7FFFFFFF);
}

function basketInit(){
    global $basket, $count;
    if (!isset($_COOKIE['basket'])) {
        $basket = ['orderid' => uniqid()];
        saveBasket();
    }else {
        $basket = unserialize(base64_decode($_COOKIE['basket']));
        $count = count($basket)-1;
    }
}

function add2Basket($id, $q){
    global $basket;
    $basket['id'] = $q;
    saveBasket();
}

function myBasket(){
    global $link, $basket;
    $goods = array_keys($basket);
    array_shift($goods);
    $ids = implode(',', $goods);
    $sql = "SELECT * FROM  catalog
            WHERE id IN($ids)";
    $result = mysqli_query($link, $sql);
    $items = result2Array($result);
    return $items;
}

function result2Array($data){
    global $basket;
    $arr = [];
    while ($row = mysqli_fetch_assoc($data)){
        $row['quantity'] = $basket[$row['id']];
        $arr[] = $row;
    }
    return $arr;
}