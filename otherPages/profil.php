<?php
    session_start();
    require('../action/showUserProfil.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include('../includes/head.php');?>
<body>
    <?php include('../includes/navusertohome.php'); include('../assets/style.php');?>
    <?php
        if (isset($errorMsg)) {
            echo $errorMsg;
        }

        if (isset($hisArticles)) {
            ?>
            <div class="card bg-primary container">
                <div class="card-header">
                    <h4>@<?= $user_username;?></h4>
                    <hr>
                    <p>email : <?= $email;?> <br> id : <?= $id; ?></p>
                </div>
            </div>
            <br>

            <?php
            while($artc = $hisArticles->fetch()){
                ?>
                <div class="card bg-warning container">
                    <div class="card-title">
                    <a href="details.php?id=<?php echo $artc['id'];?>" class="btn btn-primary"><?= $artc['titre'];?></a>
                    </div>
                    <div class="card-header">
                        <?= $artc['description'];?>
                    </div>
                    <div class="card-body">
                        <?= $artc['contenu'];?>
                    </div>
                    <div class="card-footer">
                        Date publication : <?= $artc['date_publish'];?>
                    </div>
                </div>
                <br>

                <?php
            }
        }
    ?>
</body>
</html>