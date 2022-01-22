<?php
    include('../action/security.php');
    include('../action/modifyProfil.php');

?>

<!DOCTYPE html>
<html lang="en">
<?php include('../includes/head.php');?>
<body>
    <?php include('../includes/navusertohome.php');?>
    <form class="container" method="POST">
        <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>' ;}?>
        <div class="mb-3">
            <label  class="form-label">Username</label>
            <input type="text" class="form-control" name="username" placeholder="<?= $_SESSION['username'];?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">email</label>
            <input type="mail" class="form-control" name="mail" placeholder="<?= $_SESSION['mail'];?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">password</label>
            <input type="password" class="form-control" name="password" placeholder="new password">
        </div>
                
        <button type="submit" class="btn btn-primary" name="validate">modify</button>
        <br><br>
               
    </form>
</body>
</html>