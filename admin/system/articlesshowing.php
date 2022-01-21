<?php
    require('db.php');

    $allArticles = $bdd->query('SELECT id, id_user, titre, description, contenu, user_username, date_publish FROM articles ORDER BY id DESC LIMIT 0,5');
    if(isset($_GET['search']) AND !empty($_GET['search'])) {
        $searching = $_GET['search'];
        $allArticles = $bdd->query('SELECT id, id_user, titre, description, contenu, user_username, date_publish FROM articles WHERE titre LIKE "%'.$searching.'%" ORDER BY id DESC');

        

    }


?>