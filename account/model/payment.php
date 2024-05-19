

<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "account";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function insertim($pn, $pa, $na) {
    global $conn;
    try {
        $stmt = $conn->prepare("INSERT INTO im (pn, pa, na) VALUES (?, ?, ?)");
        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("sdd", $pn, $pa, $na);
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



function getimReport() {
    global $conn;
    $report = "";

    try {
        $sql = "SELECT * FROM im";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $report .= "<table border=1>";
            $report .= "<tr><th>Product Name</th><th>Previous amount</th><th>new amount</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $report .="<tr>";
                $report .="<td>".$row["pn"]."</td>";
                $report .= "<td>".$row["pa"] ."</td>";
                $report .= "<td>".$row["na"] ."</td>";
                $report .= "</tr>";
            }
            $report .= "</table>";
        } else {
            $report = "No payment records found.";
        }
    } catch (Exception $e) {
        $report = "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }

    return $report;
}

function insertRefund($Name, $phone, $ra) {
    global $conn;
    try {
        $stmt = $conn->prepare("INSERT INTO refund (name, phone, ra) VALUES (?, ?, ?)");
        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("ssd", $Name, $phone, $ra);
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

function getRefundsReport() {
    global $conn;
    $report = "";

    try {
        $sql = "SELECT * FROM refund";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $report .= "<table border=1>";
            $report .= "<tr><th>Name</th><th>Phone Number</th><th>Refunded Amount</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $report .="<tr>";
                $report .="<td>".$row["name"]."</td>";
                $report .= "<td>".$row["phone"] ."</td>";
                $report .= "<td>".$row["ra"] ."</td>";
                $report .= "</tr>";
            }
            $report .= "</table>";
        } else {
            $report = "No payment records found.";
        }
    } catch (Exception $e) {
        $report = "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }

    return $report;
}


function insertem($es, $hm, $hmsb) {
    global $conn;
    try {
        $stmt = $conn->prepare("INSERT INTO em (es, hm, hmsb) VALUES (?, ?, ?)");
        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("sdd", $es, $hm, $hmsb);
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

function getemReport() {
    global $conn;
    $report = "";

    try {
        $sql = "SELECT * FROM em";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $report .= "<table border='1'>";
            $report .= "<tr><th>es</th><th>hm</th><th>hmsb</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $report .= "<tr>";
                $report .= "<td>".$row["es"]."</td>";
                $report .= "<td>".$row["hm"]."</td>";
                $report .= "<td>".$row["hmsb"]."</td>";
                $report .= "</tr>";
            }
            $report .= "</table>";
        } else {
            $report = "No payment records found for doctors.";
        }
    } catch (Exception $e) {
        $report = "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }

    return $report;
}


function getbp() {
    global $conn;
    $report = "";

    try {
        $sql = "SELECT * FROM bp";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $report .= "<table border='1'>";
            $report .= "<tr><th>bs</th><th>Amount</th>";
            while ($row = $result->fetch_assoc()) {
                $report .= "<tr>";
                $report .= "<td>".$row["bs"]."</td>";
                $report .= "<td>".$row["amount"]."</td>";
                $report .= "</tr>";
            }
            $report .= "</table>";
        } else {
            $report = "No salary payment records found for staff.";
        }
    }catch (Exception $e) {
        $report = "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }

    return $report;
}


?>
