<?php
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'practise2');

if(isset($_POST['update'])) {
  $id = $_POST['id'];
  $product_name = $_POST['product_name'];
  $category = $_POST['category'];
  $price = $_POST['price'];
  $image = $_FILES['image']['name'];
  $dest = '../../uploaded/'.$image;

  $sql = "UPDATE products SET product_name = '$product_name', category = '$category', price = '$price', img = '$image' WHERE id = '$id'";

  if(mysqli_query($connection, $sql)) {

    move_uploaded_file($_FILES['image']['tmp_name'], $dest);

    $_SESSION['msg'] = 'Item Updated Successfully';
    $_SESSION['msg-class'] = 'alert-success';
    header("Location: ../admin.php");
  } else {
    $_SESSION['msg'] = 'Item Failed to be Updated';
    $_SESSION['msg-class'] = 'alert-danger';
    header("Location: ../admin.php");
  }

}