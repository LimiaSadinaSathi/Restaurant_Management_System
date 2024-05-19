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
        header('location: admin_panel.php');
    }    

    elseif ($user['user_type'] == "User"){
        session_start();
        $_SESSION['user_name'] = $user['full_name'];
        header('location: user_page.php');
    }

}


else
 {
    $error[] = "Incorrect email or password!";

 }


};

?>


<!DOCTYPE html>
<html>
<head>
    
    <title> Login Form </title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class= "form-container">
        <form action="" method="post">
            <h3> Login Here </h3>
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
                    <td><b>Email</b></td>
                    <td> <input type="email" name="email" placeholder= "Enter your email"> </td>
                </tr>
                <tr>
                    <td><b>Password</b></td>
                    <td> <input type="password" name="password" placeholder= "Enter your password"> </td>

                </tr>
               </table>
                
                
                <input type="submit" name="submit" value="Login" class="form-btn">
               <p> Don't have an account? <a href="register_form.php"> <b>Register</b> </a></p>
        </form>
                

   </div> 
</body>
</html>