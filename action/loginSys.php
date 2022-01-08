<?php
    session_start();
    require('db.php');
    if(isset($_POST['validat'])) {
        

        if (!empty($_POST['username']) AND !empty($_POST['password'])) {
            $user = htmlspecialchars($_POST['username']);
            $psw = htmlspecialchars($_POST['password']);

            $checkUserExist = $bdd->prepare('SELECT * FROM users WHERE username = ?');
            $checkUserExist->execute(array($user));

            if($checkUserExist->rowCount() > 0){

                $userInfos = $checkUserExist->fetch();
                if(password_verify($psw, $userInfos['mdp'])) {

                    $_SESSION['auth'] = true;
                    $_SESSION['ID'] = $userInfos["ID"];
                    $_SESSION['username'] = $userInfos["username"];
                    $_SESSION['mail'] = $userInfos['email'];

                    header('Location: ../otherPages/home.php');

                } else {
                    $errorMsg = "<script>alert('Wrong password...')</script>";
                }

            } else {
                $errorMsg = "<script>alert('Username does not exist...')</script>";
            }
           
            
        } else {
            //si le formulaire n'est pas rempli ou si il manque des choses alors une popup alert apparaitra
            $errorMsg = "<script>alert('Please complete all fields...')</script>";
        }
    }
?>