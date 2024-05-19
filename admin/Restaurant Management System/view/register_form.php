<?php

require_once '../model/databasemodel.php';

if(isset($_POST['submit']))
{

    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $user_type=$_POST['user_type'];
    
$sql="SELECT * FROM user_form WHERE email='$email' && password = '$password' ";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0)
{

    $error[] = 'User already exist!';

}

else{
    
    $sql2= "INSERT INTO user_form(full_name, email, phone_number, password , user_type) VALUES('$fname','$email', '$phone', '$password', '$user_type')";
mysqli_query($conn, $sql2);

header("location:../view/login_form.php");

}
};

?>

<!DOCTYPE html>
<html>
<head>
    
    <title> Register Form </title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class= "form-container">
        <form action="" method="post">
            <h3> Register Now </h3>
            <?php

            if(isset($error))
            {

                foreach($error as $error)
                {
                    echo '<span class= "error-msg">'.$error.'</span>';
                }
                
            };
            
            ?>
            <table>
                <tr>
                    <td><b>Full Name</b> </td>
                    <td> <input type="text" name="fname" placeholder= "Enter your full name"> </td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td> <input type="mail" name="email" placeholder= "Enter your email"> </td>
                </tr>
                <tr>
                   <td><b>Phone Number</b></td>
                   <td><select><option>+880</option></select>
                   <input type="phone" name="phone" placeholder="Enter your phone number"></td>
               </tr>
               
                <tr>
                    <td><b>Password</b></td>
                    <td> <input type="password" name="password" placeholder= "Enter your password"> </td>

                </tr>
                </table>

                <select name="user_type">
                    <option value="User"> User</option>
                    <option value="Admin"> Admin</option>
                </select>
                <input type="submit" name="submit" value="Register" class="form-btn">
               <p> Already have an account? <a href="login_form.php"> <b>Login</b> </a></p>
           </table>
        </form>
   </div> 
</body>
</html>