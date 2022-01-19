<?php
    
    require('db.php');

    $getarticles = $bdd->prepare('SELECT id, titre, description FROM articles WHERE id_user = ? ORDER BY id DESC');
    $getarticles->execute(array($_SESSION['ID']));



?>