<?php
    require('db.php');
    $getAnswers = $bdd->prepare('SELECT id, id_user, username, id_article, contenu FROM answer WHERE id_article = ? ORDER BY id DESC');
    $getAnswers->execute(array($getId));


?>