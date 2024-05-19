<?php
require_once './model/databasemodel.php';

session_start();

?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .logo {
            display: block;
            margin: 0 auto 20px;
            max-width: 200px;
        }
    </style>

</head>
<body>
<div class="container">
        <div class="content">
                <img src="images/logo.png" alt="Logo" class="logo">
            
                <h3> Welcome to Foodbank Restaurant <span> </span> </h3>
                <a href="view/view_menu.php" class= "btn">Order Now</a><br><br>

                <p> Already have an account? <a href="view/login_form.php" class="btn"> <b>Login</b> </a><br><br>

                <p> Don't have an account? <a href="view/register_form.php" class="btn"> <b>Register</b> </a></p>

    
    
</body>
</html>