<?php
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
    <title>rms</title>
    <link rel="stylesheet" href="new_style.css">
</head>
<body>
    <header>
        <h1>Account Department</h1>

        <form action="../controllers/logout.php" method="post"> 
        <nav>
            <ul>
                <li><a href="about.php">Current Time</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profile.php">Profile</a></li>
                    <button type="submit" >Logout</button>
                
            </ul>
        </nav>
        </form>

        
    </header>

    <div class="container-header">
        <h2>Welcome, <?php echo $_SESSION['user_name']; ?>!</h2>
    </div>
</body>
</html>
