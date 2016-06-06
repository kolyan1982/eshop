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