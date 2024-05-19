<?php
session_start();
if (!isset($_SESSION['hasLoggedIn'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Current Time</title>
   
</head>
<body>
    <button onclick="fetchCurrentTime()">Get Current Time</button>
    <div id="timeContainer"></div>

    <script>
        function fetchCurrentTime() {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'time.php', true);
            xhr.onload = function() {
                if (this.status === 200) {
                    const response = JSON.parse(this.responseText);
                    document.getElementById('timeContainer').innerText = `Current Server Time: ${response.currentTime}`;
                }
            };
            xhr.send();
        }
    </script>
</body>
</html>
