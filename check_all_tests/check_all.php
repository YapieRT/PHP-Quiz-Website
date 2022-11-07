<?php
    require "../config.php";

    $conn = new mysqli("localhost:3306", "root", "NEWpassword1!", "users");

    if(empty($_SESSION["id"])){
        header("Location: ../login.php");
    }

    $tests = $conn->query("SELECT DISTINCT `test_name` FROM `questions` WHERE `test_name` != 'main_test'");

    $tests_amount = mysqli_num_rows($tests);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        for($i = 1; $i <= $tests_amount; $i++){

            $row_global = $tests->fetch_assoc();

            if($row['test_name'] == $_POST['test_name']){
                
                $_SESSION['test_name'] = $row_global['test_name'];
                header("Location: /quiz/quiz.php");

            }

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

        <div class="segment">
          <h1>Tests</h1>
        </div>
        <div class="container">
            <form method='post'>
                <?php 

                    for($i = 1; $i <= $tests_amount; $i++){
                        $row = $tests->fetch_assoc();
                        echo "<button class='central' type='submit' name='" . $row['test_name'] . "'>" . $row['test_name']  . "</button>
                        
                        <br><br>";
                    }

                ?>
            </form>
        </div>

    </body>
</html>