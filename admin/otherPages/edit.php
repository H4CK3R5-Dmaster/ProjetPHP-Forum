<?php
    require('../../action/security.php');
    require('../system/getandedit.php');
    require('../../action/editingArticle.php');

?>

<!DOCTYPE html>
<html lang="en">
<?php include('../includes/head.php');?>
<body>
    <?php include('../includes/navarticles.php'); ?>
    <br>
    <div class="container">
        <?php 
            if(isset($errorMsg)){ 
                echo '<p>'.$errorMsg.'</p>' ;
            } 
        ?>
        <?php 
            if (isset($dte)) {
                ?>
                <form method="POST">
        
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Title of article</label>
                        <input type="text" class="form-control" name="titre" value="<?= $title ?>">
                                
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" value="<?= $descript ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Content</label>
                        <textarea type="text" class="form-control" name="content"><?= $contente ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="validate">Modify</button>
                    
                </form>
                <?php
            }

        ?>
    </div>
    
    
</body>
</html>