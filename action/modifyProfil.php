<?php
    require('db.php');

    if (isset($_POST['validate'])) {
        if (!empty($_POST['mail']) AND !empty($_POST['username'])) {
            $mail = $_POST['mail'];
            $username = $_POST['username'];

            $cheki = $bdd->prepare('SELECT email FROM users WHERE email = ?');
            $cheker = $bdd->prepare('SELECT username FROM users WHERE username = ?');
            $cheki->execute(array($mail));
            $cheker->execute(array($username));


            if ($cheki->rowCount() == 0 AND $cheker->rowCount() == 0) {
                $mailinfo = $cheki->fetch();
                $userInfo = $cheker->fetch();

                $update = $bdd->prepare('UPDATE users SET email = ?, username = ? WHERE id = ?');
                $update->execute(array($mail, $username, $_SESSION['ID']));

                header('Location: ../otherPages/home.php');
            } else {
                $errorMsg = "<script>alert('Username or mail allready exist....')</script>";
            }
        }
    }




?>