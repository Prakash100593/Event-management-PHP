<?php
session_start();
 if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: event_login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
    <?php
    if($_SESSION['role'] == 0){
        ?>
            <a href='admin.php'>Administration Page</a>
        <?php
    }
        ?>
    <?php
    if($_SESSION['role'] == 1){
        ?>
            <a href='admin.php'>Master Page</a>
        <?php
    }
        ?>
    <?php
    if($_SESSION['role'] == 2){
        ?>
            <a href='user.php'>User Page</a>
        <?php
    }
        ?>
    </div>
    
</body>
</html>