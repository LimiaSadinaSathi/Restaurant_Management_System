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
    $Name =sanitize($_POST["Name"]);
    $phone = sanitize($_POST["phone"]);
    
    $ra = sanitize($_POST["ra"]);
    

    
    if (insertRefund($Name, $phone, $ra)) {
        $msg="<p> The Refund/Discount of {$Name} has been paid. <br> Total ra: {$ra}. <br> </p>";
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
    <title>  Payment Form</title>
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
        <h2>Refund/Discount</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()" novalidate>
            <label for=" Name"> Name:</label>
            <input type="text" id=" Name" name=" Name"  >

            <label for=" phone">Phone Number:</label>
            <input type="text" id=" phone" name=" phone"  >

           
            <label for="ra">Refunded or Discounted ra:</label>
            <input type="number" id="ra" name="ra"  >

           
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
        var  Name = document.getElementById(" Name").value;
        var  phone = document.getElementById(" phone").value;
        
        var ra = document.getElementById("ra").value;
        

        if ( Name.trim() === "" ||  phone.trim() === "" || ra.trim() === "") {
            alert("Please fill in all fields.");
            return false;
        }
        return true;
    }
</script>

</html>
