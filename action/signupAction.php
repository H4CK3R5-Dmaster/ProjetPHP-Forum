<?php
    //demarrage d'une session
    session_start();
    //la database est requis
    require('db.php');
    if(isset($_POST['validate'])) {
        

        if (!empty($_POST['email']) AND !empty($_POST['username']) AND !empty($_POST['password']) AND $_POST['password'] == $_POST['confirm']) {
            $mail = htmlspecialchars($_POST['email']);
            $user = htmlspecialchars($_POST['username']);
            $psw = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $chekUser = $bdd->prepare('SELECT username FROM users WHERE username = ?');
            $chekMail = $bdd->prepare('SELECT email FROM users WHERE email = ?');
            $chekUser->execute(array($user));
            $chekMail->execute(array($mail));

            if ($chekUser->rowCount() == 0 && $chekMail->rowCount() == 0) {
                $insertUser = $bdd->prepare('INSERT INTO users(username, mdp, email)VALUES(?, ?, ?)');
                $insertUser->execute(array($user, $psw, $mail));

                $getInfo = $bdd->prepare('SELECT ID, username, email FROM users WHERE username = ?');
                $getInfo->execute(array($user));

                $userInfos = $getInfo->fetch();

                $_SESSION['auth'] = true;
                $_SESSION['ID'] = $userInfos["ID"];
                $_SESSION['username'] = $userInfos["username"];
                $_SESSION['mail'] = $userInfos['email'];

                header('Location: ../otherPages/home.php');
            } else {
                $errorMsg = "<script>alert('Username allready exist..')</script>";
            }
        } else {
            $errorMsg = "<script>alert('Please complete all fields...')</script>";
        }
    }

?>