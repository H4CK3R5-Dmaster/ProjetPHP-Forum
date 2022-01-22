<?php
    require('db.php');
    if(isset($_GET['id']) AND !empty($_GET['id'])){
        $getId = $_GET['id'];
        $checkArticles = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
        $checkArticles->execute(array($getId));

        if ($checkArticles->rowCount() > 0 ) {
            $Infos = $checkArticles->fetch();

            $titre = $Infos['titre'];
            $descript = $Infos['description'];
            $content = $Infos['contenu'];
            $id_users = $Infos['id_user'];
            $users = $Infos['user_username'];
            $date = $Infos['date_publish'];
            $id = $Infos['id'];

        } else {
            $errorMsg = "<script>alert('No article found...')</script>";
        }
    } else {
        $errorMsg = "<script>alert('No article found...')</script>";
    }






?>