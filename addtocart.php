<?php
session_start();

if (isset($_GET['id'])) {
  $connection = mysqli_connect('localhost', 'root', '', 'practise2');
  $id = $_GET['id'];
  $item = [];

  if (!empty($_SESSION['cart'])) {
    $arraycol = array_column($_SESSION['cart'], 'pid');

    if (in_array($id, $arraycol)) {
      $_SESSION['cart'][$id]['qty'] += 1;
      header("Location: index.php");

    } else {
      $sql = "SELECT * FROM products WHERE id = $id";
      $result = mysqli_query($connection, $sql);

      while ($record = mysqli_fetch_assoc($result)) {
        $item['pid'] = $record['id'];
        $item['qty'] = 1;
        $item['pname'] = $record['product_name'];
        $item['price'] = $record['price'];
        $item['category'] = $record['category'];
        $item['img'] = $record['img'];
      }

      $_SESSION['cart'][$id] = $item;

      header("Location: index.php");
    }
  } else {
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($connection, $sql);

    while ($record = mysqli_fetch_assoc($result)) {
      $item['pid'] = $record['id'];
      $item['qty'] = 1;
      $item['pname'] = $record['product_name'];
      $item['price'] = $record['price'];
      $item['category'] = $record['category'];
      $item['img'] = $record['img'];
    }

    $_SESSION['cart'][$id] = $item;

    header("Location: index.php");
  }
}
