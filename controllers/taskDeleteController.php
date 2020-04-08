<?php

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

try{

    $pdo = getPDO();
    $pdo->exec("DELETE FROM task WHERE id = $id");

    header("location:/m2i/tp_toDoList/www/?page=task");


}catch(PDOException $e){
    $pageTitle = "Erreur";
    $errorMessage = "Une erreur empêche la suppression sur la base de données";
    $content = "../views/error.php";

    require "../views/baseLayout.php";

}