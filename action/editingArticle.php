<?php
    require('db.php');
    if (isset($_POST['validate'])) {
        if(!empty($_POST['titre']) AND !empty($_POST['description']) AND !empty($_POST['content'])){
            $newTitle = htmlspecialchars($_POST['titre']);
            $newDescript = nl2br(htmlspecialchars($_POST['description']));
            $newContent = nl2br(htmlspecialchars($_POST['content']));

            $UpdateData = $bdd->prepare('UPDATE articles SET titre = ?, description = ?, contenu = ? WHERE id = ?');
            $UpdateData->execute(array($newTitle, $newDescript, $newContent, $getId));
            header("Location: ../otherPages/user_articles.php");

        } else {
            $errorMsg = "<script>alert('Please complete all fields...')</script>";
        }
    }





?>