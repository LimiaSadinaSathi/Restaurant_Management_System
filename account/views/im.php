<?php
session_start();
require "../controllers/validation.php";
require "../model/payment.php";

$msg="";

if (!isset($_SESSION['hasLoggedIn'])) {
    header("Location: login.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pn =sanitize($_POST["pn"]);
    $pa = sanitize($_POST["pa"]);
    
    $na = sanitize($_POST["na"]);
    

    
    if (insertim($pn, $pa, $na)) {
        $msg="<p> The product {$pn} available {$na}.";
    } else {
        $msg='Failed to insert payment details.';

    }
}
?>



<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Payment Form</title>
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
        input[type="date"],
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
        <h2>product available </h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()" novalidate>
            <label for="pn">product Name:</label>
            <input type="text" id="pn" name="pn" >

            <label for="pa">previous amount:</label><br>
            <input type="int" id="pa" name="pa" ><br>

            <label for="na">new amount:</label>
            <input type="number" id="na" name="na" >

            <input type="submit" name="submit" value="Submit">
        </form>
        <div id="paymentResult">
            <?php
                echo $msg;
                
            ?>
        </div>
    </div>
    
</body>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include 'footer.php'; ?>

<script>
    function validateForm() {
        var pn = document.getElementById("pn").value;
        var pa = document.getElementById("pa").value;
        var na = document.getElementById("na").value;
        

        if (pn.trim() === "" || pa.trim() === "" || na.trim() === "") {
            alert("Please fill in all fields.");
            return false;
        }
        return true;
    }
</script>

</html>
