<?php
    require('db.php');

    if (isset($_GET['id']) AND !empty($_GET['id']) OR !empty($_GET['id']) AND isset($_GET['id'])) {
        $id_userss = $_GET['id'];
        
        
        $checking = $bdd->prepare('SELECT * FROM staff WHERE id = ?');
        $checking->execute(array($id_userss));
        
        
        if ($checking->rowCount() > 0 ) {
            $userInfos = $checking->fetch();
            
            $user_username = $userInfos['username'] ;
            $id = $userInfos['id'] ;
            $email = $userInfos['email'] ;

            $hisArticles = $bdd->prepare('SELECT * FROM articles WHERE id_user = ? ORDER BY id DESC');
            $hisArticles->execute(array($id_userss));
        }
        

    } else {
        $errorMsg = "<script>alert('User not found...')</script>";
    }





?>