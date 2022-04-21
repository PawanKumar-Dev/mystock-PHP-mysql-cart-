<?php include_once 'inc/header.php'; ?>
<main>
  <section class="py-5 text-center container">
    <div class="row py-lg-2">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Choose Pics</h1>
        <p class="lead text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque sapiente dolor repudiandae quod cumque nobis perferendis.</p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
        $connection = mysqli_connect('localhost', 'root', '', 'practise2');
        $sql =  "SELECT * FROM products";
        $result = mysqli_query($connection, $sql);
        while ($record = mysqli_fetch_array($result)) : ?>
          <div class="col">
            <div class="card shadow-sm">
              <img src="uploaded/<?= $record['img']; ?>" height="225px">

              <div class="card-body">
                <p class="badge bg-danger">Price: $<?= $record['price']; ?></p>
                <p class="card-text"><?= $record['product_name']; ?></p>

                <div class="d-flex justify-content-between align-items-center">
                  <a type="button" class="btn btn-sm btn-outline-warning" href="single.php?id=<?= $record['id']; ?>">View</a>
                  <a type="button" class="btn btn-sm btn-outline-success" href="addtocart.php?id=<?= $record['id']; ?>">Add to Cart</a>
                </div>

              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</main>

<?php include_once 'inc/footer.php'; ?>