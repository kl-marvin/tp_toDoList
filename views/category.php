<div class="row mb-4">
    <div class="col-12 mb-2">
        <a class="btn btn-primary"  href="/m2i/tp_toDoList/www/?page=task">Retour</a> 
    </div>
    <div class="col-10">
        <h2 >Tâche de la liste <?= $categoryName ?> </h2> 
    </div>
</div>

<div class="col-7 mt-3">


    <?php foreach($taskByCategory as $task): ?>

    <div class="mt-3">
        <div>
            <?= $task["title"]?> 
            (<?= $task["progression"] ?> %) -
            <?= $task["status_name"]?> 
            <span >
                <a href="/m2i/tp_toDoList/www/?page=taskUpdate&id=<?= $task["id"]?>" ><img src="../www/img/crayon.png" width="18" class="pb-3"></a>
                <form method="post" action="/m2i/tp_toDoList/www/?page=taskDelete&id=<?= $task["id"]?>" style="display: inline-block; margin-left:-10px;"  onsubmit="return confirm('Vous êtes sur le point de supprimer ce rappel. Continuer ?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn"><img src="../www/img/remove.png" width="18" class="pb-3"></button>
                </form>
            </span>
        </div>
        <div style="font-size:11px; margin-top:-7px; ">   <?= $task["due_date"]?></div>
    </div>
        <hr style="margin-top:2px;" >
    <?php endforeach ?>