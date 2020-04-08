<?php

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$pdo = getPDO();
$sql1 = "SELECT t.id,
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
        WHERE t.id = $id;";

$sql2 = "SELECT * from category;";
$sql3 = "SELECT * from task_status;";


$request1 = $pdo->query($sql1);
$request2 = $pdo->query($sql2);
$request3 = $pdo->query($sql3);

$taskList = $request1->fetchAll();
$categoryList = $request2->fetchAll();
$statusList = $request3->fetchAll();

$pageTitle = "Modifier une tâche";
$content = "../views/update.php";

$isPostedUpdate = $_POST[submit];

if(isset($isPostedUpdate)){

    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $progression = filter_input(INPUT_POST, "progression", FILTER_SANITIZE_STRING);
    $due_date = filter_input(INPUT_POST, "due_date", FILTER_SANITIZE_STRING);
    $task_status_id = filter_input(INPUT_POST, "status_id", FILTER_SANITIZE_STRING);
    $category_id = filter_input(INPUT_POST, "category_id", FILTER_SANITIZE_STRING);


    if($progression === '100'){

        $sql = "UPDATE task SET 
        title='$title', 
        progression='$progression', 
        due_date = '$due_date',
        task_status_id=3,
        category_id='$category_id' 
        WHERE id = '$id';"
        ;
    
        $pdo->exec($sql);

        header("location:/m2i/tp_toDoList/www/?page=task");

    }else if($progression >= '1'){
        $sql = "UPDATE task SET 
        title='$title', 
        progression='$progression', 
        due_date = '$due_date',
        task_status_id=2,
        category_id='$category_id' 
        WHERE id = '$id';"
        ;
    
        $pdo->exec($sql);

        header("location:/m2i/tp_toDoList/www/?page=task");
    }else {

        try{
            $sql = "UPDATE task SET 
            title='$title', 
            progression='$progression', 
            due_date = '$due_date',
            task_status_id='$task_status_id',
            category_id='$category_id'
            WHERE id = '$id';"
            ;
        
            $pdo->exec($sql);
    
            header("location:/m2i/tp_toDoList/www/?page=task");
    
        }catch (PDOException $e){
            $pageTitle = "Erreur";
            $errorMessage = "Une erreur empêche l'update' sur la base de données";
            $content = "../views/error.php";
    
         
            require "../views/base.php";
            die;
        }

    }
}

require "../views/base.php";