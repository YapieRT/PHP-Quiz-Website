<?php

    require "../config.php";

    $conn = new mysqli("localhost:3306", "root", "NEWpassword1!", "users");


    if(empty($_SESSION["id"])){
        header("Location: ../login.php");
    }

    $top_results = $conn->query("SELECT * FROM `user_answer` WHERE `test_name`='main_test' ORDER BY `correct_answers` DESC LIMIT 5");

    $records = mysqli_num_rows($top_results);

    if(isset($_POST['export'])) {

        if(!file_exists("records.txt")){
            touch("records.txt");
        }

        $records_file = fopen('records.txt', 'w');
    
        for($i = 1; $i <= $records; $i++){

            $row = $top_results->fetch_assoc();

            $text =  $i . ". " . $row['username'] . ". Answer:" . $row['correct_answers'] . "/" . $row['total_questions'] . ".\n";

            fwrite($records_file, $text);

        }

        fclose($records_file);
        header("Location: browse_top_results.php");
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
        <link rel="icon" type="image/x-icon" href="/images/icons/black-checkmark-png-4.png">
    </head>
    <body>

        <a href="../index.php"><button type="button" class="right"><i class="icon ion-md-return-left"></i>Main Page</button></a>

        <div class="segment">
          <h1>Top Results of Main Test</h1>
        </div>

        <div class="container">
            <h2>
            <?php
                for($i = 1; $i <= $records; $i++){
                    $row = $top_results->fetch_assoc();
                    echo $i . ". " . $row['username'] . ". Answer:" . $row['correct_answers'] . "/" . $row['total_questions'] . ".<br><br>";
                    
                }
            ?>
            </h2>
            <form method="post">
            <button type="submit" name="export" class="central"><i class="icon ion-md-download"></i> Export results</button></a>
            </form>
        </div>

    </body>
</html>