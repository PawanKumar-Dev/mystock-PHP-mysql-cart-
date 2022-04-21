<?php
session_start();

if (!$_GET['edit_id']) {
  header("Location: admin.php");
}
require_once './connect.php';

if (!isset($_SESSION['user'])) {
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

    <h3 class="text-center">Edit</h3><br><br>

    <?php
    $id = $_GET['edit_id'];
    $sql =  "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($connection, $sql);

    while ($record = mysqli_fetch_array($result)) : ?>
    <form method="post" enctype="multipart/form-data" action="inc/updateitem.php">
      <div class="mb-3">
        <label for="imgname" class="form-label">Image Name</label>
        <input type="text" class="form-control" id="imgname" name="product_name" value="<?= $record['product_name']; ?>" required>
      </div>

      <div class="mb-3">
        <label for="imgcategory" class="form-label">Image Category</label>
        <input type="text" class="form-control" id="imgcategory" name="category" value="<?= $record['category']; ?>" required>
      </div>

      <div class="mb-3">
        <label for="imgprice" class="form-label">Image Price</label>
        <input type="number" class="form-control" id="imgprice" name="price" value="<?= $record['price']; ?>" required>
      </div>

      <div class="mb-3">
        <label for="imgupload" class="form-label">Image Upload</label>
        <img src="../uploaded/<?= $record['img']; ?>" height="50px">
        <input type="file" class="form-control" id="imgupload" name="image" required>
      </div>
      <br>
      <input type="hidden" name="id" value="<?= $record['id']; ?>">
      <button type="submit" class="btn btn-success" name="update"><i class="fa fa-refresh"></i> Update</button>
    </form>
    <?php endwhile; ?>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
      setTimeout(() => {
        $('.alert').hide();
      }, 3000);
    });
  </script>
</body>

</html>