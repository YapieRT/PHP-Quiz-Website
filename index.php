<?php

  require "config.php";
  unset($_SESSION['question']);
  unset($_SESSION['answers']);
  unset($_SESSION['test_name']);

  $conn = new mysqli("localhost:3306", "root", "NEWpassword1!", "users");

  if(!empty($_SESSION['id'])){
    $id = $_SESSION['id'];
    $result = $conn->query("SELECT * FROM `tb_user` WHERE `id` = $id");
    $row = mysqli_fetch_assoc($result);
  }
  else{
    header("Location: login.php");
    exit;
  }

  if(isset($_POST['quiz'])){

    $_SESSION['test_name'] = "main_test";

    header("Location: /quiz/quiz.php");
  }

  if(isset($_POST['add_question'])){

    $_SESSION['test_name'] = "main_test";

    header("Location: /quiz/quiz.php");
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
        <a href="/results/user_results.php"><button type="button" class="left"><i class="icon ion-md-checkmark-circle-outline"></i>Your Results</button></a>

        <a href="logout.php"><button type="button" class="right"><i class="icon ion-md-exit"></i>Log Out</button></a>

        <div class="segment">
          <h1>Welcome to Fine-Tester</h1>
        </div>

        <div class="container">
            <form method='post'>
              <button type="submit" name = 'quiz' class="central"><i class="icon ion-md-flash"></i>Our Main Test</button>

              <button type="submit" name = 'add_question' class="central"><i class="icon ion-md-construct"></i>Add question to main test</button><br><br><br><br><br><br><br><br><br><br><br><br>
              
              <a href=""><button type="button" class="central"><i class="icon ion-md-book"></i>Check All Tests</button></a><br>
              
              <a href=""><button type="button" class="central"><i cl  ass="icon ion-md-add"></i>Create New Test</button></a>

            </form>
        </div>

    </body>
</html>