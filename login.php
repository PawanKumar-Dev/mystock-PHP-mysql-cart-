<?php session_start(); ?>
<?php if (isset($_SESSION['user'])) {
  header("Location: admin/admin.php");
} ?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container">
    <br><br>

    <div class="card mx-auto" style="width: 23rem;">
      <div class="card-header text-center">Login</div>

      <div class="card-body">
        <form action="admin/login-check.php" method="post">

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php if (isset($_COOKIE['lemail'])) { echo $_COOKIE['lemail']; } ?>">
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?php if (isset($_COOKIE['lpass'])) { echo $_COOKIE['lpass']; } ?>">
          </div>

          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="rememberme">
            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
          </div>

          <input type="submit" class="btn btn-info btn-lg" value="Login" name="login">
        </form>
      </div>
    </div>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>