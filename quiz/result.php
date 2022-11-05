<?php
    require "../config.php";
    unset($_SESSION['question']);

    $test_name = "main_test";
    $conn = new mysqli("localhost:3306", "root", "NEWpassword1!", "users");
    $test = $conn->query("SELECT * FROM `questions` WHERE `test_name` = '$test_name'");

    $amount_of_questions = mysqli_num_rows($test);

    $result = array();
    $questions = array();

    for($i = 1; $i <= $amount_of_questions; $i++){
        $row = $test->fetch_assoc();
        $result[$i] = $row['answer'];
        $questions[$i] = $row['question'];
    }

    $answers = array_combine($_SESSION['answers'], $result);

    $right_answers = 0;

    foreach ($answers as $key => $value) {
        if($key == $value){
            $right_answers = $right_answers + 1;
        }
    }

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Main Test</title>
        <link rel="stylesheet" href="../style.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="/images/icons/ios-checkmark-circle-outline.svg">
    </head>

    <body>

        <a href="../index.php"><button type="button" class="right"><i class="icon ion-md-return-left"></i>Main Page</button></a>

        <div class="container">
            
            <h1>Your Result</h1>
            <h1><?php echo $right_answers . "/" . $amount_of_questions?></h1>
            <p>
                <?php
                    for($i = 1; $i <= $amount_of_questions; $i++){
                        echo $questions[$i] . "<br> Your answer:" .  $_SESSION['answers'][$i] . "<br> Right answer:" . $result[$i] . "<br><br><br>";
                    }  
                ?>
            </p>
        </div>

    </body>
</html>