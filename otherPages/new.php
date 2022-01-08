<?php
    require('../action/security.php');
    require('../action/publishSYS.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include('../assets/style.php'); include('../includes/head.php');  include('../includes/navwithprofil.php'); ?>

<body>
    <form class="container" method="POST">
        <?php 
            if(isset($errorMsg)){ 
                echo '<p>'.$errorMsg.'</p>' ;
            } elseif(isset($sucessPublish)) {
                echo"<p>".$sucessPublish."</p>";
            }
        ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title of article</label>
            <input type="text" class="form-control" name="titre">
                    
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <input type="text" class="form-control" name="description">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Content</label>
            <textarea type="text" class="form-control" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="validate">publish</button>
        
    </form>
</body>
</html>