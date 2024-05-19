<?php

require_once '../model/databasemodel.php';

 $id = $_GET['edit'];

if(isset($_POST['submit'])){

   $food_name = $_POST['food_name'];
   $food_price = $_POST['food_price'];
   $food_image = $_FILES['food_image']['name'];
   $food_image_tmp_name = $_FILES['food_image']['tmp_name'];
   $food_image_folder = 'images/'.$food_image;

   if(empty($food_name) || empty($food_price) || empty($food_image) ){
      $message[] = 'Please fill out all data!';    
   }else{

      $sql4 = "UPDATE foods SET name='$food_name', price = '$food_price' , image='$food_image' WHERE id = '$id'";
      $result2 = mysqli_query($conn, $sql4);

      echo $food_price;

      if($result2){
         move_uploaded_file($food_image_tmp_name, $food_image_folder);
         header('location:../view/product_crud.php');
      }else{
         $$message[] = 'Please fill out all data!'; 
      }

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


<div class="admin-food-form-container centered">

   <?php
      
      $sql5 = mysqli_query($conn, "SELECT * FROM foods WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($sql5)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the product</h3>
      <input type="text" class="box" name="food_name" value="<?php echo $row['name']; ?>" placeholder="enter the food name">
      <input type="number" min="0" class="box" name="food_price" value="<?php echo $row['price']; ?>" placeholder="enter the food price">
      <input type="file" class="box" name="food_image"  accept="image/png, image/jpeg, image/jpg">
      <input type="submit" name="submit" value="update product" class="form-btn">
      <a href="product_crud.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>