<?php

$pdo = getPDO();
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
        ORDER BY t.id DESC
        ";
        
$sql2 = "SELECT * from category;";
$sql3 = "SELECT * from task_status;";

$request = $pdo->query($sql);
$request2 = $pdo->query($sql2);
$request3 = $pdo->query($sql3);

$taskList = $request->fetchAll();
$categoryList = $request2->fetchAll();
$statusList = $request3->fetchAll();



$pageTitle = "Vos Tâches";
$content = "../views/task.php";

$isPosted = $_POST[submit];
$isPostedAddForm = $_POST[add];


$id = $_POST[id];

if(isset($isPosted)){
    //echo "Posté !" . $id;
    header("location:/m2i/tp_toDoList/www/?page=category&id=".$id);
}

if(isset($isPostedAddForm)){
   

    $title = filter_input(INPUT_POST, "titleTask", FILTER_SANITIZE_STRING);
    $due_date = filter_input(INPUT_POST, "due_date", FILTER_SANITIZE_STRING);
    $category_id = filter_input(INPUT_POST, "category_id", FILTER_SANITIZE_STRING);

 

    try{
        // Les nouvelles tâche sont initialisée avec une progression à 0% et un statut "A faire" 
        $sql = "INSERT INTO task (title, progression, due_date, task_status_id, category_id)
                VALUES('$title', 0, '$due_date', 1, '$category_id')";
      
        $pdo->exec($sql);
        
 
        header("location:/m2i/tp_toDoList/www/?page=task");

    }catch (PDOException $e){
        $pageTitle = "Erreur";
        $errorMessage = "Une erreur empêche la création sur la base de données";
        $content = "../views/error.php";

     
        require "../views/base.php";
        die;
    }


}


require "../views/base.php";