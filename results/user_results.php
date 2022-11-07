<?php
    require "../config.php";

    $conn = new mysqli("localhost:3306", "root", "NEWpassword1!", "users");


    $id = $_SESSION['id'];

    $query_id = $conn->query("SELECT * FROM `tb_users` WHERE `id` = '$id'");

    $row = mysqli_fetch_assoc($query_id);

    $username = $row['username'];

    $user_results = $conn->query("SELECT * FROM `user_answer` WHERE `username` = '$username' ORDER BY `date` DESC");

    $amount_of_records = mysqli_num_rows($user_results);


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

        <div class="container">
            
            <h1>Your Result, <?php echo $username;?></h1>
            
            <h2>

                <?php         
                    for($i = 1; $i <= $amount_of_records; $i++){

                        $row = $user_results->fetch_assoc();
                        echo "Date: " . $row['date'] . ". Test: " . $row['test_name'] . ". Answers:" . $row['correct_answers'] . "/" . $row['total_questions'] . "<br><br>";
                    } 
                ?>

            </h2>
        </div>

    </body>
</html>