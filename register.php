<?php

require "config.php";

$conn = new mysqli("localhost:3306", "root", "NEWpassword1!", "users");

if(!empty($_SESSION["id"])){
    header("Location: index.php");
    exit;
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; 

    $user = $conn->query("SELECT * FROM `tb_users` WHERE `username` = '$username' OR `email` = '$email'");

    if(mysqli_num_rows($user) > 0){
      echo
      "
      <script> alert('Username/Email Has Already Taken'); </script>
      ";
    }
    else{
      $query = "INSERT INTO `tb_users` (`name`, `username`, `email`, `password` )  VALUES ('$name', '$username', '$email', '$password')";
      $conn->query($query);
      echo
      "
      <script> alert('Registration Successful'); </script>
      ";
}
}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Fine-Tester Registration</title>
        <link rel="stylesheet" href="style.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="/images/icons/ios-checkmark-circle-outline.svg">
    </head>

    <body>

        <a href="login.php"><button type="button" class="right">Log In</button></a>

        <form action="" class="" method="post">

            <div class="segment">
                <h1>Registration</h1>
            </div>

            <label>
                <input type="text" name="name" id="name" placeholder="Your Name" required value=""/>
            </label>

            <label>
                <input type="text" name="username" id="username" placeholder="Your Username" required value=""/>
            </label>

            <label>
                <input type="text" name="email" id="email" placeholder="Your Email Address" required value=""/>
            </label>

            <label>
                <input type="password" name="password" id="password" placeholder="Your Password" required value=""/>
            </label>

            <button class="green" type="submit" name="submit"><i class="icon ion-md-create"></i>Get In</button>

        </form>

    </body>
</html>