<?php
    require('db.php');

    if (isset($_POST['validate'])) {
        if (!empty($_POST['mail']) AND !empty($_POST['username']) AND !empty($_POST['password'])) {
            $mail = $_POST['mail'];
            $username = $_POST['username'];
            $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $cheki = $bdd->prepare('SELECT email FROM users WHERE email = ?');
            $cheker = $bdd->prepare('SELECT username FROM users WHERE username = ?');
            $cheki->execute(array($mail));
            $cheker->execute(array($username));


            if ($cheki->rowCount() == 0 AND $cheker->rowCount() == 0) {
                $mailinfo = $cheki->fetch();
                $userInfo = $cheker->fetch();

                $update = $bdd->prepare('UPDATE users SET email = ?, username = ?, mdp = ? WHERE id = ?');
                $updater = $bdd->prepare('UPDATE articles SET user_username = ? WHERE id_user = ?');
                $updatersss = $bdd->prepare('UPDATE answer SET username = ? WHERE id_user = ?');
                $update->execute(array($mail, $username, $pass, $_SESSION['ID']));
                $updater->execute(array($username, $_SESSION['ID']));
                $updatersss->execute(array($username, $_SESSION['ID']));

                $_SESSION['mail'] = $mail;
                $_SESSION['username'] = $username;

                header('Location: ../otherPages/home.php');
            } else {
                $errorMsg = "<script>alert('Username or mail allready exist....')</script>";
            }
        } else {
            $errorMsg = "<script>alert('at least one of the 3 fields is empty....')</script>";
        }
    }




?>