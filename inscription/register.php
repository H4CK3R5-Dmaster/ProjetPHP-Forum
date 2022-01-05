<?php 
    session_start();
    include("db.php");
    include("./fonction/func.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $mail = $_POST['mail'];
        $pass = $_POST['password'];
        $name = $_POST['lastname'];
        $first = $_POST['first'];
        if(!empty($mail) && !empty($pass) && !empty($name) && !empty($first))
        {
            //$psw = password_hash($pass, PASSWORD_DEFAULT);
            $user_id = random_num(20);
            $query = "INSERT INTO `users` (`name`,`firstname`,`password`,`mail`,`user_id`) VALUES ('$name','$first','$pass','$mail','$user_id')";
            mysqli_query($connect,$query);
            header("Location: ./acceuilemployé.html");
        }
        else{
            echo '<script>alert("please enter some valid information!");
            window.location.href="register.html"
            </script>';
            
            
        }
    }
?>