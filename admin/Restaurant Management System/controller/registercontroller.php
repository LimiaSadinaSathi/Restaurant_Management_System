<?php

require_once '../model/databasemodel.php';

if(isset($_POST['submit']))
{

    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $user_type=$_POST['user_type'];
    
$sql="SELECT * FROM user_form WHERE email='$email' && password= '$password' ";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0)
{

    $error[] = 'User already exist!';

}

else{
    
    $sql2= "INSERT INTO user_form(full_name, email, phone_number, password, user_type) VALUES('$fname','$email', '$phone', '$password', '$user_type')";
mysqli_query($conn, $sql2);

header("location:../view/login_form.php");

}
};

?>