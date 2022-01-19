<?php

    require('db.php');

    if(isset($_POST['validate'])){
        if(!empty($_POST['titre']) AND !empty($_POST['description']) AND !empty($_POST['content'])){
            $title = htmlspecialchars($_POST['titre']);
            $descriptions = nl2br(htmlspecialchars($_POST['description']));
            $contenu = nl2br(htmlspecialchars($_POST['content']));
            $date = date("d/m/Y H:i");
            $id_user = $_SESSION["ID"];
            $pseudo = $_SESSION['username'];

            $insertArticles = $bdd->prepare("INSERT INTO articles(titre, description, contenu, id_user, user_username, date_publish)VALUES(?, ?, ?, ?, ?, ?)");
            $insertArticles->execute(array($title, $descriptions, $contenu, $id_user, $pseudo, $date));

            $sucessPublish = "<script>alert('your article is now published !')</script>";

        } else {
            $errorMsg = "<script>alert('Please complete all fields...')</script>";
        }
    }



?>