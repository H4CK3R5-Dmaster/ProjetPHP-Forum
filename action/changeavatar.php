<?php
    require('db.php');
    if (isset($_POST['avchange'])) {
        if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
            $taille = 2097152;
            $extension = array('jpg','jpeg','gif','png');
            if ($_FILES['avatar']['size'] <= $taille) {
                $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                if (in_array($extensionUpload, $extension)) {
                    $image = basename($_FILES['avatar']['name']);
                    $image=str_replace(' ','|',$image); 
                    $result = move_uploaded_file($_FILES['avatar']['tmp_name'], "../action/avatar/".$image);

                    if ($result) {
                        $updateAvatar = $bdd->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
                        $updateAvatar->execute(array('avatar' => $_FILES['avatar']['name'], 'id' => $_SESSION['ID']));
                        
                        header("Location: ./profil.php?ID=".$_SESSION['ID']);
                    } else {
                        $errorMsg = "Error in import...";
                    }
                } else {
                    $errorMsg = "<script>alert('Your image must be the format jpg, jpeg, gif or png....')</script>";
                }
            } else {
                $errorMsg = "<script>alert('Your image must not exceed 2Mo...')</script>";
            }
        }
    }



?>