<?php
session_start();
require "../model/user.php";
require "../controllers/validation.php";

$error_message = "";

function setFieldCookie($fieldName, $fieldValue) {
    setcookie($fieldName, $fieldValue, time() + (86400 * 30), "/");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = sanitize($_POST['user_name']);
    $lastname = sanitize($_POST['lastname']);
    $phone = sanitize($_POST['phone']);
    $address = sanitize($_POST['address']);
    $gender = sanitize($_POST['gender']);
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);

    
    

    $error_message = validateForm($_POST);

    if (empty($error_message)) {
        if (insertIntoUsers($user_name, $lastname, $phone, $address, $gender, $email, $password)) {
            
            header("Location: ../views/login.php");
            exit();
        } else {
            $error_message = "Error inserting user";
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['save_with_cookies'])) {
    setFieldCookie('user_name', $user_name);
    setFieldCookie('lastname', $lastname);
    setFieldCookie('phone', $phone);
    setFieldCookie('address', $address);
    setFieldCookie('gender', $gender);
    setFieldCookie('email', $email);
    setFieldCookie('password', $password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="style.css">
    <script src="validation.js"></script>
</head>
<body>
    <div class="register-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="POST" onsubmit="return validateForm()" novalidate>
            <h2>Register</h2>
            <?php if (!empty($error_message)) { ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php } ?>
            <input type="text" id="user_name" name="user_name" placeholder="User Name" value="<?php echo isset($_COOKIE['user_name']) ? $_COOKIE['user_name'] : ''; ?>">
            <input type="text" id="lastname" name="lastname" placeholder="Last Name" value="<?php echo isset($_COOKIE['lastname']) ? $_COOKIE['lastname'] : ''; ?>">
            <input type="tel" id="phone" name="phone" placeholder="Phone Number" value="<?php echo isset($_COOKIE['phone']) ? $_COOKIE['phone'] : ''; ?>">
            <input type="text" id="address" name="address" placeholder="Address" value="<?php echo isset($_COOKIE['address']) ? $_COOKIE['address'] : ''; ?>">
            <select id="gender" name="gender">
                <option value="">Select Gender</option>
                <option value="male" <?php echo isset($_COOKIE['gender']) && $_COOKIE['gender'] === 'male' ? 'selected' : ''; ?>>Male</option>
                <option value="female" <?php echo isset($_COOKIE['gender']) && $_COOKIE['gender'] === 'female' ? 'selected' : ''; ?>>Female</option>
                <option value="other" <?php echo isset($_COOKIE['gender']) && $_COOKIE['gender'] === 'other' ? 'selected' : ''; ?>>Other</option>
            </select><br><br>
            <input type="email" id="email" name="email" placeholder="Email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
            <input type="password" id="password" name="password" placeholder="Password" value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>">

            <button type="submit">Register</button>
            
            <button type="submit" name="save_with_cookies">Save as Cookies</button>
            <a href="login.php">Login</a>
        </form>
    </div>
</body>
</html>
