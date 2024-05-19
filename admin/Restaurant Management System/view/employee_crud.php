<?php


require_once '../model/databasemodel.php';


if(isset($_POST['submit'])){

   $employee_name = $_POST['employee_name'];
   $employee_phone_number = $_POST['employee_phone_number'];
   $employee_email = $_POST['employee_email'];
   $employee_user_type = $_POST['employee_user_type'];

   
   if(empty($employee_name) || empty($employee_phone_number) || empty($employee_email) || empty($employee_user_type)){
      $message[] = 'Please fill out all data';
   }else{
      $sql1 = "INSERT INTO employees (name, phone_number, email, user_type) VALUES('$employee_name', ' $employee_phone_number', '$employee_email', ' $employee_user_type')";
      $result1 = mysqli_query($conn,$sql1);

      if($result1){
         
         $message[] = 'New employee added!';
      }else{
         $message[] = 'Could not add the employee';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM employees WHERE id = $id");
   header('location:../view/employees_crud.php');
};

?>


<!DOCTYPE html>
<html>
<head>
  
   <title> Dashboard || Admin </title>

  
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

   <div class="admin-employees-form-container">


      <form action="" method="post" enctype="multipart/form-data">
         <h3>Add a new employee </h3>
         <input type="text" placeholder="Enter full name" name="employee_name" class="box">
         <input type="number" placeholder="Enter phone number" name="employee_phone_number" class="box">
         <input type="email" placeholder="Enter email" name="employee_email" class="box">
         <input type="text" placeholder="Enter employee type" name="employee_user_type" class="box">
         
         <input type="submit" name="submit" value="add employee" class="form-btn">
         
        </form>

   </div>

   <?php

   $sql3 = mysqli_query($conn, "SELECT * FROM employees");
   
   ?>
   <div class="employees-display">
      <table class="employees-display-table">
         <thead>
         <tr>
            <th> Full Name </th>
            <th> Phone Number </th>
            <th>  Email </th>
            <th>   Type </th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($sql3)){ ?>
         
            <td>
               <a href="employee_update_crud.php? edit= <?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="employee_crud.php? delete= <?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php }; ?>


      </table>
   </div>

</div>


</body>
</html>