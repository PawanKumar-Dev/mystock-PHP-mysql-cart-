<?php
session_start();
require_once 'connect.php';

if(isset($_POST['login'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($connection, $sql);

  if(mysqli_num_rows($result) > 0) {
    $rememberme = $_POST['rememberme'];
    
    if(isset($rememberme)) {
      setcookie('lemail', $email, time()+86400);
      setcookie('lpass', $password, time()+86400);

      header("Location: admin.php");
    }

    $_SESSION['user'] = $email;
    header("Location: admin.php");
  } else {
    echo "Login Failed";
    echo "Go back to <a href='../login.php'>Login</a>";
    die();
  }
}
?>