<?php

    require "../config.php";

    $conn = new mysqli("localhost:3306", "root", "NEWpassword1!", "users");

    if(empty($_SESSION["id"])){
    header("Location: ../login.php");
    }

    if(isset($_POST['submit'])){

        $test_name = $_POST['test_name'] ;

        $tests = $conn->query("SELECT * FROM `questions` WHERE `test_name` = '$test_name'");

        if(mysqli_num_rows($tests) > 0){
            echo
            "
            <script> alert('$test_name Has Already Exist'); </script>
            ";
        }
        else{
            $_SESSION['test_name'] = $test_name;
            header("Location: /add_question/add_question.php");
        }

    }

?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Fine-Tester</title>
        <link rel="stylesheet" href="../style.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="/images/icons/ios-checkmark-circle-outline.svg">
    </head>

    <body>

        <a href="../index.php"><button type="button" class="right"><i class="icon ion-md-return-left"></i>Main Page</button></a>

        <form action="" class="" method="post" autocomplete="off">

            <div class="segment">
                <h1>Enter your test name:</h1>
                <p>Please be correct with it</p>
            </div>

            <label>
                <input type="text" name="test_name" placeholder="Test name" required value=""/>
            </label>

            <br>

            <button class="green" type="submit" name="submit"><i class="icon ion-md-add"></i>Next to add question</button>

        </form>

    </body>
</html>