<?php
    require('../action/ContentShowarticles.php');
?>

<!DOCTYPE html>
<html lang="en">
    <?php include('../includes/head.php'); ?>
<body>
    <?php include('../includes/navarticles.php'); ?>
    <br><br>
    <?php 
        if(isset($errorMsg)){ 
            echo '<p>'.$errorMsg.'</p>' ;
        } 
    ?>

    <div class="container">
        <?php
            if (isset($date)) {
                ?>
                    <h3>Title : <?= $titre;?></h3>
                    <hr>
                    <p>description : <?= $descript;?></p>
                    <hr>
                    <p>content : <?= $content;?></p>
                    <hr>
                    <small>username : <?= $users;?>  <br> date Publication : <?= $date;?></small>
                <?php
            }
        ?>
        
    </div>
</body>
</html>