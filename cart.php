<?php include_once 'inc/header.php'; ?>

<div class="container">
  <br><br>

  <div class="card mx-auto">
    <div class="card-header text-center">Cart</div>

    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Action</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($_SESSION['cart'] as $cart): ?>
          <tr>
            <td><img src="uploaded/<?= $cart['img']; ?>" height="100px"></td>
            <td><?= $cart['pname']; ?></td>
            <td>$<?= $cart['price']; ?></td>
            <td><?= $cart['qty']; ?></td>
            <td><a class="btn btn-danger" href="inc/removecart.php?id=<?php echo $cart['pid'];?>">Remove</a></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<br><br>

<?php include_once 'inc/footer.php'; ?>