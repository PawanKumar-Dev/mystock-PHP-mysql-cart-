<?php session_start(); ?>
<?php require_once './connect.php'; ?>
<?php if (!isset($_SESSION['user'])) {
  header("Location: ../login.php");
} ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Admin</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="admin.php">Admin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
          </li>
        </ul>

        <div class="d-flex">
          <a class="btn btn-outline-warning" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container">
    <br>
    <?php if (isset($_SESSION['msg'])) : ?>
      <div class="alert <?= $_SESSION['msg-class']; ?> alert-dismissible fade show" role="alert"><?= $_SESSION['msg']; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <h3 class="text-center">Welcome to Admin Panel, <?= $_SESSION['user']; ?></h3>
    <br>
    <a href="additem.php" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a><br><br>

    <table class="table table-responsive table-striped text-center">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Category</th>
          <th scope="col">Price</th>
          <th scope="col">Image</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql =  "SELECT * FROM products";
        $result = mysqli_query($connection, $sql);
        $i = 1;
        while ($record = mysqli_fetch_array($result)) : ?>
          <tr>
            <th scope="row"><?= $i; ?>.</th>
            <td><?= $record['product_name']; ?></td>
            <td><?= $record['category']; ?></td>
            <td>$<?= $record['price']; ?></td>
            <td><img src="../uploaded/<?= $record['img']; ?>" height="50px"></td>
            <td><a href="edititem.php?edit_id=<?= $record['id']; ?>" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a> <a href="inc/removeitem.php?id=<?= $record['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Remove</a></td>
          </tr>
        <?php $i++;
        endwhile; ?>
      </tbody>
    </table>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function () {
      setTimeout(() => {
        $('.alert').hide();
      }, 3000);
    });
  </script>
</body>

</html>