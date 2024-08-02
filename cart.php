<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Milli Market</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <?php 
    include 'header.php'; 
    include 'functions/db.php';
  ?>

  <div class="container">
    <h1>Sebet</h1>

    <?php 
      $sum = 0;
      $sql = "SELECT * FROM carts";
      $result = $conn->query($sql);
      if ($result->num_rows > 0){ 
        ?>
        <table class="cart-table">
        <thead>
          <tr>
            <th>Önüm</th>
            <th>Bahasy</th>
            <th>Mukdary</th>
            <th>Jemi</th>
            <th>Hereket</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        while ($row = mysqli_fetch_assoc($result)){
        ?>
            <tr>
              <td>
                <img src="<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>" width="50">
                <a href="#"><?php echo $row['product_name']; ?></a>
              </td>
              <td><?php echo $row['product_price']; ?></td>
              <td>
                <form action="update_cart.php" method="post">
                  <input type="hidden" name="product_id" value="<?php echo $row['cart_id']; ?>">
                  <input type="number" name="quantity" min="1" value="<?php echo $row['product_quantity']; ?>" style="width: 40px;">
                  <button type="submit" class="btn btn-sm">Täzelemek</button>
                </form>
              </td>
              <td><?php echo $row['product_price'] * $row['product_quantity']." TMT"; $sum += $row['product_price'] * $row['product_quantity']; ?></td>
              <td>
                <form action="remove_from_cart.php" method="post">
                  <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                  <button type="submit" class="btn btn-sm btn-danger">Aýyrmak</button>
                </form>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      
      <?php } else { ?>
      <p>Sebediňiz häzirlikçe boş.</p>
      <p>Islendik önümi Satyn almak düwmesine basmak arkaly sebede goşup bilersiňiz</p>
      
      <?php } ?>

      

      <div class="cart-totals">
        <p>Jemi: <?php echo $sum." TMT"; ?></p>
      </div>

    <?php ?>

  </div>

  <?php include 'footer.php'; ?>
</body>
</html>
