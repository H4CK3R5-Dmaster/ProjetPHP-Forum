<?php
    require('../system/connexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../includes/head.php');?>
<body>
    <?php include('../includes/navconnexion.php');?>
    <form class="container" method="POST">
        <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>' ;}?>
        <div class="mb-3">
            <label  class="form-label">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
                
        <button type="submit" class="btn btn-primary" name="validat">connexion</button>
        <br><br>
               
    </form>
</body>
</html>