<?php
    
    require('db.php');
    if(isset($_GET['id']) AND !empty($_GET['id'])){
        $getId = $_GET['id'];

        $checkArticle = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
        $checkArticle->execute(array($getId));

        if ($checkArticle->rowCount() > 0) {
            
            $info = $checkArticle->fetch();

            if($_SESSION['ID'] == 1){

                $title =$info['titre'];
                $descript = $info['description'];
                $contente = $info['contenu'];
                $dte = $info['date_publish'];

                $descript = str_replace('<br />', '', $descript);
                $contente = str_replace('<br />', '', $contente);


            } else {
                $errorMsg = "<script>alert('You can't modify this article...')</script>";
            }


        } else {
            $errorMsg = "<script>alert('No article found...')</script>";
        }

    } else {
        $errorMsg = "<script>alert('No article found...')</script>";
    }




?>