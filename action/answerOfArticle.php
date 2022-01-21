<?php
    
    require('db.php');
    if (isset($_POST['validate'])) {
        if (!empty($_POST['answer'])) {
            $answer = nl2br(htmlspecialchars($_POST['answer']));

            $insertToData = $bdd->prepare('INSERT INTO answer(id_user, username, id_article, contenu)VALUES(?, ?, ?, ?)');
            $insertToData->execute(array($_SESSION['ID'], $_SESSION['username'], $getId, $answer));
        }
    }



?>