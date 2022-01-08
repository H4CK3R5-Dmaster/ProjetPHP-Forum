<?php include('../action/security.php'); include('../action/userGetarticles.php');  ?>
<!DOCTYPE html>
<html lang="en">
<?php include('../includes/head.php'); ?>
<body>
    <?php include('../includes/navwithprofil.php'); ?>
    <?php 
        while($articles = $getarticles->fetch()){
            ?>
            <div class="card">
                <div class="card-header"> <?php echo $articles['titre'];?></div>
                <div class="card-body">
                    <p class="card-text"><?php echo $articles['description'];?></p>
                    <a href="#" class="btn btn-primary">Go to articles</a>
                    <a href="#" class="btn btn-warning">Modify article</a>
                </div>
            </div>
            <?php
        }


    ?>
</body>
</html>