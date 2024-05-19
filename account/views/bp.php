<?php
session_start();
if (!isset($_SESSION['hasLoggedIn'])) {
    header("Location: login.php");
    exit;
}

require "../controllers/validation.php";
require "../model/payment.php";

$msg="";

if (!isset($_SESSION['hasLoggedIn'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bs = sanitize($_POST["bs"]);
   
   
    $amount = sanitize($_POST["amount"]);
   
   
   

    if (insertbp($bs, $amount)) {
        $msg = "<p>The budget of {$bs} has been update.<br> Total amount: {$amount}.";}
         else {
        $msg = 'Failed to insert payment details.';
    }
}

function insertbp($bs, $amount) {
    $conn = new mysqli("localhost", "root", "", "account");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO bp (bs, amount) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $bs, $amount);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        return true;
    } else {
        $stmt->close();
        $conn->close();
        return false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>budget planning</title>
    <style>
        .container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="submit"],
        select {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Budget planning</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()" novalidate>
            <label for="bs">bs :</label>
            <input type="text" id="bs" name="bs" >


            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" >

            


            <input type="submit" name="submit" value="Submit">
        </form>
        <div id="paymentResult">
            <?php echo $msg; ?>
        </div>
    </div>

    <script>
        function validateForm() {
            var bs = document.getElementById("bs").value;   
            var amount = document.getElementById("amount").value;
           

            if (bs.trim() === "" || amount.trim() === "" ) {
                alert("Please fill in all fields.");
                return false;
            }
            return true;
        }
    </script>
</body>
<?php include 'footer.php'; ?>
</html>
