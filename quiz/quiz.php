<?php
    require "../config.php";

    $test_name = "main_test";
    $conn = new mysqli("localhost:3306", "root", "NEWpassword1!", "users");
    $test = $conn->query("SELECT * FROM `questions` WHERE `test_name` = '$test_name'");
    $amount_of_questions = mysqli_num_rows($test);

    if(isset($_POST['result'])){
        header("Location: result.php");
    }

    if(isset($_POST['next'])){

    }

    if(isset($_POST['previous'])){
        

        
    }

    if(!isset($_SESSION['question'])){
        $_SESSION['question'] = 1;

    }
    elseif($_SESSION['question'] = $amount_of_questions){
        
        
    }
    else{
        $_SESSION['question'] = $_SESSION['question'] + 1;
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

        <a href="../index.php"><button type="button" class="right"><i class="icon ion-md-return-left"></i>Return</button></a>

        <div class="container">

            <h1><?php echo $question;?></h1>
            
            <form method='post'>
                <label class = "radio">
                    <input type="radio" name="radio" class="radio" value="<?php $option_1?>"/>
                    <span><?php echo $option_1; ?></span>
                </label>
                <label class = "radio">
                    <input type="radio" name="radio" class="radio" value="<?php $option_2?>"/>
                    <span><?php echo $option_2; ?></span>
                </label class = "radio">
                <label class = "radio">
                    <input type="radio" name="radio" class="radio" value="<?php $option_3?>"/>
                    <span><?php echo $option_3; ?></span>
                </label>
                <label class = "radio">
                    <input type="radio" name="radio" class="radio" value="<?php $option_4?>"/>
                    <span><?php echo $option_4; ?></span>
                </label>
                <button class="quiz" type="submit" name="previous"><i class="icon ion-md-arrow-back"></i>Previous</button>
                <button class="quiz" type="submit" name="next">Next <i class="icon ion-md-arrow-forward"></i></button>
                <a href="/quiz/result.php"><button class="quiz" type="submit" name="result"><i class="icon ion-md-clipboard"></i>Result</button></a>
                
            </form>

        </div>

    </body>
</html>

