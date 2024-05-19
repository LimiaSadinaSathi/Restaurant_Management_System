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