<?php
    //ouverture d'une session
    session_start();
    //la database est requis
    require('db.php');
    //si l'evenement qui contient validat existe alors on fait le programme
    if(isset($_POST['validat'])) {
        
        //on verifie si les champs ne sont pas vide
        if (!empty($_POST['username']) AND !empty($_POST['password'])) {
            //on recupere les champs
            $user = htmlspecialchars($_POST['username']);
            $psw = htmlspecialchars($_POST['password']);

            //on check si le username existe dans la database
            $checkUserExist = $bdd->prepare('SELECT * FROM users WHERE username = ?');
            $checkUserExist->execute(array($user));

            //si le username existe on continue le programme sinon on renvoie une erreur disant que le username n'existe pas
            if($checkUserExist->rowCount() > 0){

                //on recup les infos du user 
                $userInfos = $checkUserExist->fetch();
                //on verifie si le mdp donner et mdp de la database sont pareil
                if(password_verify($psw, $userInfos['mdp'])) {
                    //on transfert les infos dans une session
                    $_SESSION['auth'] = true;
                    $_SESSION['ID'] = $userInfos["ID"];
                    $_SESSION['username'] = $userInfos["username"];
                    $_SESSION['mail'] = $userInfos['email'];
                    //on redirige vers le home
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