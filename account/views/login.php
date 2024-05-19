<?php
session_start();
require "../model/user.php";
require "../controllers/validation.php";

$error_message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = sanitize($_POST['user_name']);
    $password = sanitize($_POST['password']);

    if (credentials($user_name, $password)) {
        $_SESSION['hasLoggedIn'] = true;

        $userData = getValByUserName($user_name);
        $_SESSION['userData'] = $userData;

        $_SESSION['user_name'] = $userData['user_name'];
        $_SESSION['user_id'] = $userData['user_id'];
        $_SESSION['phone'] = $userData['phone'];

        setcookie('user_name', $userData['user_name'], time() + (86400 * 30), "/"); 
        setcookie('password', $_POST['password'], time() + (86400 * 30), "/");

        header("Location: dashboard.php");
        exit();
    } else if (empty($user_name) or empty($password)) {
        $error_message = "Please fill up the form properly";
    } else {
        $error_message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateForm() {
            var username = document.getElementById("user_name").value;
            var password = document.getElementById("password").value;
            
            if (username.trim() === ""||password.trim() ==="") {
                alert("Please fill in all fields");
                return false;
            }
            return true;
        }
    </script>

</head>
<body>
    <div class="login-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return validateForm()" >
            <h2>Login</h2>
            
            <input type="text" id="user_name" name="user_name" placeholder="Username" value="<?php echo isset($_COOKIE['user_name']) ? $_COOKIE['user_name'] : ''; ?>">
            <input type="password" id="password" name="password" placeholder="Password" value="<?php echo isset($_COOKIE['user_name']) ? $_COOKIE['password'] : ''; ?>">
            <button type="submit">Login</button>
            <a href="forget.php">Forgot Password?</a>
            <a href="register.php">Register</a>
        </form>
        <br>
        <?php if (!empty($error_message)) { ?>
            <p class="error" style="color:red"><?php echo $error_message; ?></p>
        <?php } ?>

        
    </div>
</body>
</html>
