<?php
    require "../config.php";

    $conn = new mysqli("localhost:3306", "root", "NEWpassword1!", "users");


    $id = $_SESSION['id'];

    $query_id = $conn->query("SELECT * FROM `tb_users` WHERE `id` = '$id'");

    $row = mysqli_fetch_assoc($query_id);

    $username = $row['username'];

    


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
            
            <h1>Your Result, <?php echo $username;?></h1>

        </div>

    </body>
</html>