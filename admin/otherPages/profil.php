<?php
    session_start();
    require('../system/userprofil.php');
    require('../system/getallInfo.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include('../includes/head.php');?>
<body>
    <?php include('../includes/navusertohome.php');?>
    <?php
        if (isset($errorMsg)) {
            echo $errorMsg;
        }

        if (isset($hisArticles)) {
            ?>
            <div class="card bg-primary container">
                <div class="card-header">
                <?php
                        if (!empty($User['avatar']) AND $_GET['id'] == $_SESSION['ID']) {
                            ?>
                                <img src="../../action/avatar/<?php echo $User['avatar'];?>" width="150" >
                            <?php
                        } else {
                            ?>
                                <img src="../../action/avatar/<?php echo $User2['avatar'];?>" width="150" >
                            <?php
                        }
                    ?>
                    <h4>@<?= $user_username;?></h4>
                    <hr>
                    <p>email : <?= $email;?> <br> id : <?= $id; ?></p>
                    <?php
                        if ($_GET['id'] == $_SESSION['ID']) {
                            ?>
                            <a href="./modify.php" class="btn btn-warning">modify profil</a>.
                            <?php
                        }
                    ?>
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