<?php
session_start();
require_once "../controllers/validation.php";
require_once "../model/payment.php";

if (!isset($_SESSION['hasLoggedIn'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<head>
    <title>Report</title>
    <link rel="stylesheet" href="report_style.css">
    
    <script>
        function calculateProfit() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../controllers/calculate_profit.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var result = xhr.responseText;
                    document.querySelector(".calculation").innerHTML = "<p>Total Profit: " + result + "</p>";
                }
            };
            xhr.send();
        }
    </script>
</head>

<body>
    <div class="report_body">
        <div class="tables">
            <h2>inventory status</h2>
            <?php echo getimReport(); ?>
        </div>
        
        <div class="tables">
            <h2>budget sector</h2>
            <?php echo getbp(); ?>
        </div>
        
        <div class="tables">
            <h2>expencess manage</h2>
            <?php echo getemReport(); ?>
        </div>
        <div class="tables">
            <h2>Refunds/Discounts Paid</h2>
            <?php echo getRefundsReport(); ?>
        </div>
        
</body>
<br><br><br><br><br><br><br><br><br>

<?php include 'footer.php'; ?>

</html>
