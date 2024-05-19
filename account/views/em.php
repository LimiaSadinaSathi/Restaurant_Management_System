<?php
session_start();
if (!isset($_SESSION['hasLoggedIn'])) {
    header("Location: login.php");
    exit;
}

require "../model/payment.php";
require "../controllers/validation.php";

$error_message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $es = sanitize($_POST["es"]);
    $hm = sanitize($_POST["hm"]);
    $hmsb = sanitize($_POST["hmsb"]);
    
   
   
   

if (insertem( $es, $hm, $hmsb)) {
    $msg = "<p>The budget of {$es} has been update.<br> now it is costing: {$hm}.<br> The cost should be: {$hmsb} ";
}
     else {
    $msg = 'Failed to insert payment details.';
}
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rms</title>
    <style>
        .container {
            max-width: 400px;
            margin: 20 auto;
            margin-top: 100px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"],
        input[type="number"],
        input[type="submit"] {
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
        <h2>Expence management</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()" method="post" novalidate>
            <label for="es"> Name:</label>
            <input type="text" id="es" name="es">

            <label for="hm">how much is costing:</label>
            <input type="number" id="hm" name="hm">

            <label for="hmsb">how much should be cost:</label>
            <input type="number" id="hmsb" name="hmsb">

            <input type="submit" name="submit" value="Submit">
        </form>
        <div id="paymentResult">
            <?php
            if (!empty($error_message)) {
                echo $error_message;
            } elseif (isset($success_message)) {
                echo $success_message;
            }
            ?>
        </div>
    </div>
</body>

<?php include 'footer.php'; ?>

<script>
    function validateForm() {
        var es = document.getElementById("es").value;
        var hm = document.getElementById("hm").value;
        var hmsb = document.getElementById("hmsb").value;

        if (es.trim() === "" || hm.trim() === "" || hmsb.trim() === "") {
            alert("Please fill in all fields.");
            return false;
        }
        return true;
    }
</script>

</html>