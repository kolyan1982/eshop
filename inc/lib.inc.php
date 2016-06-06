<?php

//Функция сохраняет новый товар
function addItemToCatalog($title, $author, $pubyear, $price){
    global $link;

    $sql = "INSERT INTO catalog (title, author, pubyear, price) 
                   VALUES (?, ?, ?, ?)";

    if (!$stmp = mysqli_prepare($link, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param ($stmt, "ssii", $title, $author, $pubyear, $price);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}