<?php
    require "../config.php";

    $test_name = $_SESSION['test_name'];
    $conn = new mysqli("localhost:3306", "root", "NEWpassword1!", "users");
    $test = $conn->query("SELECT * FROM `questions` WHERE `test_name` = '$test_name'");


    $amount_of_questions = mysqli_num_rows($test);

    if(empty($_SESSION["id"])){
        header("Location: ../login.php");
    }

    if(!isset($_SESSION['question'])){
        $_SESSION['question'] = 1;
        $_SESSION['answers'] = array();
    }

    $question_num = $_SESSION['question'];

    if($question_num == 1){
        $row = mysqli_fetch_assoc($test);
        $question = $row['question'];
        $option_1 = $row['option_1'];
        $option_2 = $row['option_2'];
        $option_3 = $row['option_3'];
        $option_4 = $row['option_4'];
    }
    else{

        for($i = 1; $i <= $question_num; $i++){
            $row = $test->fetch_assoc();
        }
        $question = $row['question'];
        $option_1 = $row['option_1'];
        $option_2 = $row['option_2'];
        $option_3 = $row['option_3'];
        $option_4 = $row['option_4'];
    }
    

    if(isset($_POST['result'])){
        header("Location: result.php");

        if(isset($_POST['radio'])){
            $_SESSION['answers'][$question_num] = $_POST['radio'];
        }   

    }

    if(isset($_POST['next'])){
        $_SESSION['question'] = $_SESSION['question'] + 1;

        if(isset($_POST['radio'])){
        $_SESSION['answers'][$question_num] = $_POST['radio'];
        }   

        header("Location: quiz.php");
    }

    if(isset($_POST['previous'])){
        $_SESSION['question'] = $_SESSION['question'] - 1;

        if(isset($_POST['radio'])){
            $_SESSION['answers'][$question_num] = $_POST['radio'];
        }   

        header("Location: quiz.php");
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

            <h1><?php echo $question;?></h1>
            
            <form method='post'>
                <label class = 'radio'>
                    <input type='radio' name='radio' class='radio' value='<?php echo $option_1;?>' <?php if($_SESSION['answers'][$question_num] == $option_1) { echo ' checked';} ?>/>
                    <span><?php echo $option_1; ?></span>
                </label>

                <label class = 'radio'>
                    <input type='radio' name='radio' class='radio' value='<?php echo $option_2;?>' <?php if($_SESSION['answers'][$question_num] == $option_2) { echo ' checked';} ?>/>
                    <span><?php echo $option_2; ?></span>
                </label class = 'radio'>

                <label class = 'radio'>
                    <input type='radio' name='radio' class='radio' value='<?php echo $option_3;?>' <?php if($_SESSION['answers'][$question_num] == $option_3) { echo ' checked';} ?>/>
                    <span><?php echo $option_3; ?></span>
                </label>

                <label class = 'radio'>
                    <input type='radio' name='radio' class='radio' value='<?php echo $option_4;?>' <?php if($_SESSION['answers'][$question_num] == $option_4) { echo ' checked';} ?>/>
                    <span><?php echo $option_4; ?></span>
                </label>

                <?php if($_SESSION['question'] != 1){ echo "<button class='quiz' type='submit' name='previous'><i class='icon ion-md-arrow-back'></i>Previous</button>"; } ?>

                <?php if($_SESSION['question'] != $amount_of_questions){ echo "<button class='quiz' type='submit' name='next'>Next <i class='icon ion-md-arrow-forward'></i></button>";} ?>

                <a href='/quiz/result.php'><button class='quiz' type='submit' name='result'><i class='icon ion-md-clipboard'></i>Result</button></a>
                
            </form>

        </div>

    </body>
</html>

