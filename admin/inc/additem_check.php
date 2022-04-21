<?php
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'practise2');

if(isset($_POST['addimage'])) {
  $product_name = $_POST['product_name'];
  $category = $_POST['category'];
  $price = $_POST['price'];
  $image = $_FILES['image']['name'];
  $dest = '../../uploaded/'.$image;

  $sql = "INSERT INTO products (product_name, category, price, img) VALUES ('$product_name', '$category', '$price', '$image')";

  if(mysqli_query($connection, $sql)) {

    move_uploaded_file($_FILES['image']['tmp_name'], $dest);

    $_SESSION['msg'] = 'Item Added Successfully';
    $_SESSION['msg-class'] = 'alert-success';
    header("Location: ../additem.php");
  } else {
    $_SESSION['msg'] = 'Item Failed to be Added';
    $_SESSION['msg-class'] = 'alert-danger';
    header("Location: ../additem.php");
  }

}