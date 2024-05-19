<?php



$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "account";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function credentials($user_name, $password) {
    global $conn;
    try {
        $stmt = $conn->prepare("SELECT user_is FROM users WHERE user_name = ? AND password = ?");
        if (!$stmt) {
            throw new Exception($conn->error);
        }
        $stmt->bind_param("ss", $user_name, $password);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return ($num_rows == 1); 
    } catch (Exception $e) {
        echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
        return false; 
    }
}

function getValByUserName($user_name) {
    global $conn;
    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_name = ?");
        if (!$stmt) {
            throw new Exception($conn->error);
        }
        $stmt->bind_param("s", $user_name);
        $stmt->execute();
        $result = $stmt->get_result();
        $user_data = $result->fetch_assoc();
        $stmt->close();
        return $user_data; 
    } catch (Exception $e) {
        echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
        return null; 
    }
}


function insertIntoUsers($user_name, $lastname, $phone, $address, $gender, $email, $password) {
    global $conn;
    try {
        $stmt = $conn->prepare("INSERT INTO users (user_name, lastname, phonenumber, address, gender, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            throw new Exception($conn->error);
        }
        $stmt->bind_param("sssssss", $user_name, $lastname, $phone, $address, $gender, $email, $password);
        $stmt->execute();
        $stmt->close();
        return true; 
    } catch (Exception $e) {
        echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
        return false; 
    }
}

function updateUser($userId, $username, $phone, $address, $gender, $email) {
    global $conn;
    try {
        $stmt = $conn->prepare("UPDATE users SET user_name = ?, phone = ?, address = ?, gender = ?, email = ? WHERE user_id = ?");
        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("sssssi", $username, $phone, $address, $gender, $email, $userId);
        $stmt->execute();
        if ($stmt->error) {
            throw new Exception("Error executing statement: " . $stmt->error);
        }
        $stmt->close();
        return true;
    } catch (Exception $e) {
        echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
        return false;
    }
}

?>