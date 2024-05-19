<?php

require_once '../model/databasemodel.php';

 $id = $_GET['edit'];

 if(isset($_POST['submit'])){

    $employee_name = $_POST['employee_name'];
    $employee_phone_number = $_POST['employee_phone_number'];
    $employee_email = $_POST['employee_email'];
    $employee_user_type = $_POST['employee_user_type'];

    if(empty($employee_name) || empty($employee_phone_number) || empty($employee_email) || empty($employee_user_type)){
        $message[] = 'Please fill out all data';

   }elseif{

      $sql4 = "UPDATE employees SET name ='$employee_name', phone_number = '$employee_phone_number' , email ='$employee_email' WHERE user_type = '$employee_user_type'";
      $result2 = mysqli_query($conn, $sql4);

      echo $employee_name;

      
      }else{
         $$message[] = 'Please fill out all data!'; 
      }

   };


?>

<!DOCTYPE html>
<html>
<head>
   
   <link rel="stylesheet" href="../css/style_crud.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-employee-form-container centered">

   <?php
      
      $sql5 = mysqli_query($conn, "SELECT * FROM employees WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($sql5)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update employee details </h3>
      <input type="text" class="box" name="food_name" value="<?php echo $row['name']; ?>" placeholder="enter the food name">
      <input type="number" min="0" class="box" name="food_price" value="<?php echo $row['price']; ?>" placeholder="enter the food price">
      <input type="submit" name="submit" value="update employee" class="form-btn">
      <a href="employee_crud.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>