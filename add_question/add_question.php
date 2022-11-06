<?php

    require "../config.php";

    $test_name = $_SESSION['test_name'];

    $conn = new mysqli("localhost:3306", "root", "NEWpassword1!", "users");

    if(empty($_SESSION["id"])){
    header("Location: ../login.php");
    }

    if(isset($_POST['submit'])){
        $question = $_POST['question'];
        $option_1 = $_POST['option_1'];
        $option_2 = $_POST['option_2'];
        $option_3 = $_POST['option_3'];
        $option_4 = $_POST['option_4'];
        $answer = $_POST['answer'];

        $query = "INSERT INTO `questions` (`id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`, `test_name`) VALUES (NULL, '$question', '$option_1', '$option_2', '$option_3', '$option_4', '$answer', '$test_name')";
        $conn->query($query);
        
        header("Location: add_question.php");
    }

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Fine-Tester Login</title>
        <link rel="stylesheet" href="../style.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="/images/icons/ios-checkmark-circle-outline.svg">
    </head>

    <body>

        <a href="../index.php"><button type="button" class="right"><i class="icon ion-md-return-left"></i>Return</button></a>

        <form action="" class="" method="post" autocomplete="off">
            <div class="segment">
                <h1>Add new question to main test</h1>
                <p>Please be correct with it</p>
            </div>

            <label>
                <input type="text" name="question" placeholder="Your question" required value=""/>
            </label>
            <br>
            <label>
                <input type="text" name="option_1" placeholder="Option 1" required value=""/>
            </label>

            <label>
                <input type="text" name="option_2" placeholder="Option 2" required value=""/>
            </label>

            <label>
                <input type="text" name="option_3" placeholder="Option 3" required value=""/>
            </label>

            <label>
                <input type="text" name="option_4" placeholder="Option 4" required value=""/>
            </label>

            <label>
                <input type="text" name="answer" placeholder="Correct Answer" required value=""/>
            </label>
            
            <button class="green" type="submit" name="submit"><i class="icon ion-md-add"></i>Add question</button>

        </form>
</body>
</html>