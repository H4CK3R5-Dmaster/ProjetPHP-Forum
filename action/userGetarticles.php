<?php
    
    require('db.php');

    $getarticles = $bdd->prepare('SELECT id, titre, description FROM articles WHERE id_user = ?');
    $getarticles->execute(array($_SESSION['ID']));



?>