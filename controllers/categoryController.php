<?php

$pdo = getPDO();
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT t.id,
        title,
        progression,
        due_date,
        category_name,
        status_name
        FROM task as t
        JOIN category as c
        ON t.category_id = c.id

        JOIN task_status as ts
        ON t.task_status_id = ts.id
        WHERE t.category_id = $id;";


$request = $pdo->query($sql);

$taskByCategory = $request->fetchAll();

if($id == 1){
    $categoryName = "Rappel";
}
if($id == 2){
    $categoryName = "Important";
}
if($id == 3){
    $categoryName = "Shopping";
}

$pageTitle = "Tâches par catégorie";
$content = "../views/category.php";

require "../views/base.php";
