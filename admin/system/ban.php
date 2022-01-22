<?php
    require('db.php');
    if (isset($_GET['id']) AND !empty($_GET['id'])) {
        $getIds = $_GET['id'];
        $recupuser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
        $recupuser->execute(array($getIds));

        if ($recupuser->rowCount() > 0) {
            $ban = $bdd->prepare('DELETE FROM users WHERE id = ?');
            $ban->execute(array($getIds));

            header('Location: ../otherPages/member.php');
        } else {
            $errorMsg = "<script>alert('No user found...')</script>";
        }
    }




?>