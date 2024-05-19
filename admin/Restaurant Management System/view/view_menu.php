<?php
require_once "../model/databasemodel.php";

$sql= "SELECT * from foods WHERE id='$id'";
result= mysqli_query($conn, $sql);

$count= 1;
if($result-> num_rows >0)
{
    while ($row = $result -> fetch_assoc())
    {
        
    }
}