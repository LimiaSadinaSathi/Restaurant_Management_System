<?php
require_once '../model/databasemodel.php';

session_start();

?>

<!DOCTYPE html>
<html>
<head>
   
    <title> Admin Page </title>

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <h2> Hello <span> <?php echo $_SESSION['admin_name'] ?> </span> <h2>
                <h3> Welcome to Admin page <span> </span> </h3>
                <a href="../view/product_crud.php" class= "btn">Menu</a><br><br>
                <a href="../view/employee_crud.php" class= "btn">Employees</a><br><br>
                <a href="../view/user_crud.php" class= "btn">Customers</a><br><br>
                
                <a href="logout.php" class="btn"> logout </a>
    
</body>
</html>