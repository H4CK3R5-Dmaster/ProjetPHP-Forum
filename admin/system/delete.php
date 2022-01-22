<?php
    session_start();
    require('db.php');

    if(isset($_GET['id']) AND !empty($_GET['id'])){

        $getId = $_GET['id'];
        $checkArticle = $bdd->prepare('SELECT id_user FROM articles WHERE id = ?');
        $checkArticle->execute(array($getId));

        if ($checkArticle->rowCount() > 0) {
            $user = $checkArticle->fetch();
            if ($user['id_user'] == $_SESSION['ID'] || $_SESSION['username'] == "Admin") {
                $delete = $bdd->prepare('DELETE FROM articles WHERE id = ?');
                $delete->execute(array($getId));
                
                header("Location: ../otherPages/home.php");

            } else {
                $errorMsg = "<script>alert('You can't delete this article...')</script>";
            }


        } else {
            $errorMsg = "<script>alert('No article found...')</script>";
        }

    } else {
        $errorMsg = "<script>alert('No article found...')</script>";
    }



?>