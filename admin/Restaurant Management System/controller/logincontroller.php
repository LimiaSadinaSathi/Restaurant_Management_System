<?php

require_once '../model/databasemodel.php';

if(isset($_POST['submit']))
{

   
    $email=$_POST['email'];
    $password=$_POST['password'];
   
    
$sql="SELECT * FROM user_form WHERE email='$email' && password= '$password' ";
$result = mysqli_query($conn,$sql);

$user = mysqli_fetch_assoc($result);

if(count($user) > 0)
{

    if ($user['user_type'] == "Admin"){
        session_start();
        $_SESSION['admin_name'] = $user['full_name'];
        header('location: ../view/admin_panel.php');
    }    

    elseif ($user['user_type'] == "User"){
        session_start();
        $_SESSION['user_name'] = $user['full_name'];
        header('location: ../view/user_page.php');
    }

}


else
 {
    $error[] = "Incorrect email or password!";

 }


};

?>
