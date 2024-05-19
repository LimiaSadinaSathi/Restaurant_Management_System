<?php
session_start();
require_once "../controllers/validation.php";
require_once "../model/payment.php";
require_once "../model/user.php";

if (!isset($_SESSION['hasLoggedIn'])) {
    header("Location: login.php");
    exit;
}

$userData = $_SESSION['userData'];



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $userData['user_id'];
    $user_name = sanitize($_POST["user_name"]);
    $phone = sanitize($_POST["phone"]);
    $address = sanitize($_POST["address"]);
    $gender = sanitize($_POST["gender"]);
    $email = sanitize($_POST["email"]);



    $error_message = validateUpdateForm($_POST);
echo $error_message;
    if (empty($error_message)) {
        updateUser($userId, $user_name, $phone, $address, $gender, $email);
            $_SESSION['userData']['user_name'] = $user_name;
            $_SESSION['phone'] = $phone;
            echo "<p style='color: green;'>User profile updated successfully.</p>";
        } else {
            echo "<p style='color: red;'>Failed to update user profile.</p>";
        }
    

    
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="profile_style.css">
</head>

<body>
    <div class="profile-body">
        <div class="user-details">
            <h2>User Profile</h2>
            <p><strong>User ID:</strong> <?php echo $userData['user_is']; ?></p>
            <p><strong>user name:</strong> <?php echo $userData['user_name']; ?></p>
            <p><strong>Phone:</strong> <?php echo $_SESSION['phone']; ?></p>
            <p><strong>Address:</strong> <?php echo $userData['address']; ?></p>
            <p><strong>Gender:</strong> <?php echo $userData['gender']; ?></p>
            <p><strong>Email:</strong> <?php echo $userData['email']; ?></p>
        </div>
        
        <div class="update-profile">
            <h2>Update Profile</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">

                <label for="user_name">user_name:</label>
                <input type="text" id="user_name" name="user_name" value="<?php echo $userData['user_name']; ?>" >

                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="<?php echo $_SESSION['phone']; ?>" >

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo $userData['address']; ?>" >

                <label for="gender">Gender:</label>
                <input type="text" id="gender" name="gender" value="<?php echo $userData['gender']; ?>" >

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $userData['email']; ?>" >

                <input type="submit" name="submit" value="Update">
            </form>
        </div>
    </div>
</body>

<?php include 'footer.php'; ?>
<script>
    function validateForm() {
        var username = document.getElementById("user_name").value;
        var phone = document.getElementById("phone").value;
        var address = document.getElementById("address").value;
        var gender = document.getElementById("gender").value;
        var email = document.getElementById("email").value;

        if (username.trim() == "") {
            alert("Username is required");
            return false;
        }

        if (phone.trim() == "") {
            alert("Phone is required");
            return false;
        }

        if (address.trim() == "") {
            alert("Address is required");
            return false;
        }

        if (gender.trim() == "") {
            alert("Gender is required");
            return false;
        }

        if (email.trim() == "") {
            alert("Email is required");
            return false;
        } else if (!validateEmail(email)) {
            alert("Invalid email format");
            return false;
        }

        return true;
    }

    function validateEmail(email) {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }
</script>
</html>
