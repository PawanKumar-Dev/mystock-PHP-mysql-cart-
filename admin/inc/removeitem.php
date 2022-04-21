<?php
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'practise2');

if($_GET['id']) {
  $id = $_GET['id'];

  $sql = "DELETE FROM products WHERE id = $id";

  if(mysqli_query($connection, $sql)) {
    $_SESSION['msg'] = 'Item Removed Successfully';
    $_SESSION['msg-class'] = 'alert-success';
    header("Location: ../admin.php");

  } else {

    $_SESSION['msg'] = 'Item Failed to be Removed';
    $_SESSION['msg-class'] = 'alert-danger';
    header("Location: ../admin.php");
  }
}