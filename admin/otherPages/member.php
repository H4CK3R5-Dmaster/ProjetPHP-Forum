<?php
    session_start();
    include('../system/showmember.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include('../includes/head.php');?>
<body>
    <?php include('../includes/navreturn.php');?>
    <br>
    <?php 
        while($user = $recup->fetch()){
            ?>
                <div class="card container">
                    <div class="card-header">
                        <?= $user['username'];?>
                        <?php
                            if ($user['username'] != "Admin") {
                                ?>
                                    <a href="../system/bannir.php?ID=<?= $user['ID'];?>" class="btn btn-danger col">BAN</a>
                                <?php
                            }
                        ?>
                        
                    </div>
                    
                </div>
                <br>

            <?php
        }
    
    ?>
</body>
</html>