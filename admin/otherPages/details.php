<?php
    session_start();
    require('../../action/ContentShowarticles.php');
    require('../../action/answerOfArticle.php');
    require('../../action/showAnswers.php');
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

                <section class="show-content">
                    <h3>Title : <?= $titre;?></h3>
                    <hr>
                    <p>description : <?= $descript;?></p>
                    <hr>
                    <p>content : <?= $content;?></p>
                    <hr>
                    <small>username : <a href="profil.php?id=<?= $id_users;?>"><?= $users;?></a>  <br> date Publication : <?= $date;?></small>
                    <a href="../system/delete.php?id=<?= $id;?>" class="btn btn-danger">Delete article</a>
                </section>
                <br><br>
                <section class="show-answers">
                    <form class="form-group" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Answer : </label>
                            <textarea name="answer" class="form-control"></textarea>
                            <br>
                            <button class="btn btn-success" type="submit" name="validate">Publish a Answer</button>
                        </div>
                    </form>
                    <?php
                        while($response = $getAnswers->fetch()){
                            ?>
                                <div class="card">
                                    <div class="card-header">
                                    <a href="profil.php?id=<?= $response['id_user'];?>"><?= $response['username'];?></a>
                                    </div>
                                    <div class="card-body">
                                        <?= $response['contenu']; ?>
                                    </div>
                                    <a href="../system/deleteanswer.php?id=<?= $response['id'];?>" class="btn btn-danger">Delete answer</a>
                                </div>
                                <br>
                            <?php
                        }

                    ?>
                </section>
                <?php
            }
        ?>
        
    </div>
</body>
</html>