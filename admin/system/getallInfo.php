<?php
    require('db.php');

    $allInfoUser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $allInfoUser->execute(array($_SESSION['ID']));

    $User = $allInfoUser->fetch();
    $get = $_GET['id'];
    $another = $bdd->prepare('SELECT * FROM users WHERE ID = ?');
    $another->execute(array($get));

    $User2 = $another->fetch();



?>