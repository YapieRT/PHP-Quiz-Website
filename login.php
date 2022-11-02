<?php

require "config.php";

$conn = new mysqli("localhost:3306", "root", "NEWpassword1!", "users");

if(!empty($_SESSION["id"])){
  header("Location: index.php");
}

if(isset($_POST['submit'])){

    $usernameemail = $_POST['UsernameOrEmail'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM `tb_users` WHERE `username` = '$usernameemail' OR `email` = '$usernameemail'");

    $row = mysqli_fetch_assoc($result);


    if(mysqli_num_rows($result) > 0){
      if($password == $row['password']){
        $_SESSION['login'] = true;
        $_SESSION['id'] = $row['id'];

        header("Location: index.php");
        exit;
      }
      else{
        echo
        "<script> alert('Wrong Password'); </script>";
      }
    }
    else{
      echo
      "<script> alert('User Not Registered'); </script>";
    }
  }
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Fine-Tester Login</title>
        <link rel="stylesheet" href="style.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="/images/icons/ios-checkmark-circle-outline.svg">
    </head>

    <body>

        <a href="register.php"><button type="button" class="right">Register</button></a>

        <form action="" class="" method="post" autocomplete="off">
            <div class="segment">
                <h1>Login</h1>
            </div>

            <label>
                <input type="text" name="UsernameOrEmail" placeholder="Username or Email Address" required value=""/>
            </label>

            <label>
                <input type="password" name="password" placeholder="Password" required value=""/>
            </label>
            
            <button class="red" type="submit" name="submit"><i class="icon ion-md-lock"></i>Log in</button>

        </form>
</body>
</html>