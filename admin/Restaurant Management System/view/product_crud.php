<?php


require_once '../model/databasemodel.php';


if(isset($_POST['submit'])){

   $food_name = $_POST['food_name'];
   $food_price = $_POST['food_price'];
   $food_image = $_FILES['food_image']['name'];
   $food_image_tmp_name = $_FILES['food_image']['tmp_name'];
   $food_image_folder = 'images/'.$food_image;

   if(empty($food_name) || empty($food_price) || empty($food_image)){
      $message[] = 'Please fill out all data!';
   }else{
      $sql1 = "INSERT INTO foods (name, price, image) VALUES('$food_name', '$food_price', '$food_image')";
      $result1 = mysqli_query($conn,$sql1);

      if($result1){
         move_uploaded_file($food_image_tmp_name, $food_image_folder);
         $message[] = 'New product added!';
      }else{
         $message[] = 'Could not add the product';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM foods WHERE id = $id");
   header('location:../view/product_crud.php');
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

   <div class="admin-food-form-container">


      <form action="" method="post" enctype="multipart/form-data">
         <h3>Add a new product</h3>
         <input type="text" placeholder="Enter food name" name="food_name" class="box">
         <input type="number" placeholder="enter food price" name="food_price" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="food_image" class="box">
         <input type="submit" name="submit" value="add product" class="form-btn">
         
        </form>

   </div>

   <?php

   $sql3 = mysqli_query($conn, "SELECT * FROM foods");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>food image</th>
            <th>food name</th>
            <th>food price</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($sql3)){ ?>
         <tr>
            <td><img src="../images/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td>TK<?php echo $row['price']; ?> /- </td>
            <td>
               <a href="product_update_crud.php? edit= <?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="product_crud.php? delete= <?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>


      </table>
   </div>

</div>


</body>
</html>