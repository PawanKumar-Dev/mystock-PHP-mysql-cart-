<?php
session_start();

if($_GET['id']) {
  $id = $_GET['id'];
  
  unset($_SESSION['cart'][$id]);

  header("Location: ../cart.php");
}