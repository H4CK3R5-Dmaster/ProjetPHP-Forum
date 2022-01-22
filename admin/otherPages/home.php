<?php
    
    require('../../action/security.php');
    require('../system/articlesshowing.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include('../includes/head.php');?>
<body>
<?php include('../includes/navhome.php');?><br>
<h1 class="display-3">Welcome <?= $_SESSION['username'];?></h1>
<br>
    <?php
        while($articles = $allArticles->fetch()){
            ?>
                <div class="container">
                    <div class="card">
                        <div class="card-title bg-info">
                            <a href="../otherPages/details.php?id=<?php echo $articles['id']; ?>">
                                <?= $articles['titre']; ?>
                            </a>
                            
                        </div>
                        <div class="card-header">
                            description : <?= $articles['description']; ?>
                        </div>
                        <div class="card-body">
                        <?= $articles['contenu']; ?>
                        </div>
                        <div class="card-footer">
                            Published by <a href="profil.php?id=<?= $articles['id_user'];?>"><?= $articles['user_username']; ?></a> at <?= $articles['date_publish']; ?>
                            
                        </div>
                    </div>
                </div>
                <br>
            <?php
        }

    ?>
</body>
</html>