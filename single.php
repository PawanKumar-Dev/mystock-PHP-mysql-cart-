<?php if(!isset($_GET['id'])) {
  header("Location: index.php");
}  ?>
<?php include_once 'inc/header.php'; ?>

<main>
  <br><br>
  <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php
      $connection = mysqli_connect('localhost', 'root', '', 'practise2');
      $id = $_GET['id'];

      $sql =  "SELECT * FROM products WHERE id= $id";
      $result = mysqli_query($connection, $sql);
      while ($record = mysqli_fetch_array($result)) : ?>
        
        <div class="col">
          <p class="card-text">Product Name: <?= $record['product_name']; ?></p>

          <div class="card shadow-sm">
            <img src="uploaded/<?= $record['img']; ?>" height="225px">

            <div class="card-body">
              <p class="badge bg-danger">Price: $<?= $record['price']; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <a type="button" class="btn btn-sm btn-outline-success" href="addtocart.php?id=<?= $record['id']; ?>">Add to Cart</a>
              </div>

            </div>
          </div>
          <br><br>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</main>

<?php include_once 'inc/footer.php'; ?>