<div class="row mb-4">
    <div class="col-12 mb-2">
        <a class="btn btn-primary"  href="/m2i/tp_toDoList/www/?page=task">Retour</a> 
    </div>
    <div class="col-10">
        <h2 >Modifier votre rappel</h2> 
    </div>
</div>
<?php foreach($taskList as $task): ?>
    <form action="" method="POST">
    <div class="form-group col-5">
            <label>Libellé</label>
            <input  class="form-control" type="text" value="<?= $task["title"] ?>" name="title" required>
            <label>Date d'échéance</label>
            <input class="form-control"  type="type" id="meeting-time" name="due_date"   value="<?= $task["due_date"]?>" required ><br>

            <span>Avancé à </span>
            <input  class="form-control col-2 mb-2" type="number" min="0" max="100" value="<?= $task["progression"] ?>" name="progression"  style="display: inline-block;" required>

            <div style="display: inline-block; font-weight:bold">%</div><br/>
            
           
            <label>Cathégorie</label>
            <select class="form-control" name="category_id">
            
                    <?php foreach ($categoryList as $category): ?>
                        <option value="<?= $category["id"] ?>">
                            <?= $category["category_name"] ?>
                        </option>
                    <?php endforeach ?>
            </select>
         
            <button type="submit" name="submit" class="btn btn-success btn-block mt-3">
                Modifier
            </button>
           
    </div>
    </form>

<?php endforeach ?>