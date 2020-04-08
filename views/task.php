<div class="col-7 mt-3"">
<h2>Tâches de toutes les catégories</h2>

    <div style="overflow:scroll; height:390px;">
        <div id="up" ></div>
        <a   href="#down"><img src="../www/img/down-arrow.png" width="38"></a>
    
        <?php foreach($taskList as $task): ?>
        <div class="mt-3 ">
            <div>
            <span style="font-weight:bold"> <?= $task["title"]?> </span>
                (<?= $task["progression"] ?> %) - 
                <?php 
                if($task["status_name"] == "Terminée"){
                    echo '<span style="color:Green;">Terminée !</span>';
                }else if($task["status_name"] == "En cours"){
                    echo '<span style="color:CadetBlue;">En cours</span>';
                }else if($task["status_name"] == "A faire"){
                    echo '<span style="color:red; font-weight:bold;">A faire</span>';
                }
                    
                ?>
                <span >
                    <a href="/m2i/tp_toDoList/www/?page=taskUpdate&id=<?= $task["id"]?>" ><img src="../www/img/crayon.png" width="18" class="pb-3"></a>
                    <form method="post" action="/m2i/tp_toDoList/www/?page=taskDelete&id=<?= $task["id"]?>" style="display: inline-block; margin-left:-10px;"  onsubmit="return confirm('Vous êtes sur le point de supprimer ce rappel. Continuer ?')">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn"><img src="../www/img/remove.png" width="18" class="pb-3"></button>
                    </form>
                </span>
            </div>
        
            <div style="font-size:13px; margin-top:-7px;">   Liste : <?= $task["category_name"] ?></div>
            <div style="font-size:13px;">Echéance :   <?= $task["due_date"]?></div>
    </div>
        <hr style="margin-top:2px;" >
    <?php endforeach ?>
    <div id="down">
    <a href="#up"><img src="../www/img/up-arrow.png" width="38"></a>
    </div>
    </div>

</div>


<div class="row">
    <div class="col-4 mt-5">
        <h2 >Tâches par catégories</h2>

            <form class="mb-3" action="" method="POST">
                <select class="form-control col-5" name="id">
                            <?php foreach ($categoryList as $category): ?>
                                <option value="<?= $category["id"] ?>">
                                    <?= $category["category_name"] ?>
                                </option>
                            <?php endforeach ?>
                </select>
                <button type="submit" name="submit" class="btn btn-primary mt-2">
                        Valider
                </button>
            </form>
    </div>


    <div class="col-8 mt-5">
    <h2 >Ajouter une tâche</h2>
    <form action="" method="POST">
            <div class="row col-8">
        
                    <div class="col-12">
            
                    <label>Nom de la nouvelle tâche</label>
                    <input class="form-control"  name="titleTask" type="text" required>
                    </div>
                    <div class="col-6 mt-2">
                    <label>Date d'échéance</label>
                     <input class="form-control"  type="datetime-local" id="meeting-time" name="due_date"  required><br>
                    </div>  
                    <div class="col-6 mt-2">
                    <label >Cathégorie</label>
                         <select class="form-control" name="category_id" required>
                        <?php foreach ($categoryList as $category): ?>
                            <option value="<?= $category["id"] ?>">
                                <?= $category["category_name"] ?>
                            </option>
                        <?php endforeach ?>
                        </select>
                    </div>  
                
                    <div class="col-12">
                    <button type="submit" name="add" class="btn btn-success mt-2 btn-block">
                        Ajouter
                    </button>
                    </div>   
       
                   
            </div>


</div>
</form>


</div>



