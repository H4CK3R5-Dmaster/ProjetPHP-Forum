<?php
    session_start();
    require('db.php');

    if (isset($_POST['validat'])) {
        if (!empty($_POST['password']) AND !empty($_POST['username'])) {
            $username = htmlspecialchars($_POST['username']);
            $pass = htmlspecialchars($_POST['password']);

            $check = $bdd->prepare('SELECT * FROM staff WHERE username = ?');
            $check->execute(array($username));

            if ($check->rowCount() > 0) {
                $admin = $check->fetch();
                if (password_verify($pass, $admin['password'])) {
                    $_SESSION['auth'] = true;
                    $_SESSION['id'] = $admin['id'];
                    $_SESSION['username'] = $admin['username'];
                    $_SESSION['email'] = $admin['email'];

                    header('Location: ../otherPages/home.php');
                }
            }
        } else {
            $errorMsg = "<script>alert('You are not a Admin...')</script>";
        }
    } 


?>