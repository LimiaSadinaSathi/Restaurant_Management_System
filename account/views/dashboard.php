<?php
session_start();
if (!isset($_SESSION['hasLoggedIn'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="new_style.css">
    <style>
        .container {
            display: flex;
        }
        .box {
            width: 45%;
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .box h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

        <br><br><br><br>
    <div class="container">
        <div class="box">
            <h3><a href="em.php">Expense Management</a></h3>
            
        </div>
        <div class="box">
            <h3><a href="im.php">inventory management</a></h3>
            
        </div>
        <div class="box">
            <h3><a href="bp.php">Budget planning</a></h3>
            
        </div>
        <div class="box">
            <h3><a href="refund.php">Refund and Discount</a></h3>
            
        </div>
        <div class="box">
            <h3><a href="report.php">Report</a></h3>
            
        </div>
    </div>
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php include 'footer.php'; ?>
</body>


</html>
