<?php 
    session_start();
    include("db.php");
    include("./fonction/func.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $mail = $_POST['email'];
        $pass = $_POST['mdp'];
        $name = $_POST['username'];
        
        if(!empty($mail) && !empty($pass) && !empty($name) && !empty($first))
        {
            $psw = password_hash($pass, PASSWORD_DEFAULT);
            $user_id = random_num(20);
            $query = "INSERT INTO `users` (`username`,`mdp`,`email`,`id_user`, `isAdmin`) VALUES ('$name','$psw','$mail','$user_id', 'false')";
            mysqli_query($connect,$query);
            header("Location: ");
        }
        else{
            echo '<script>alert("please enter some valid information!");
            window.location.href="register.html"
            </script>';
            
            
        }
    }
?>