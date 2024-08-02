<!DOCTYPE html>
<html>
    <head>
        <title>Milli Market</title>
        <link rel="stylesheet" href="css/styles.css">  
    </head>
    <body>
        <?php include 'header.php'; ?>
        
        <section class="products-container">
            <h2>Harytlarymyz</h2>
            <div class="product-grid">
                <?php
                include 'functions/db.php'; // Assuming db connection is established

                // Define variables
                $currentPage = isset($_GET['products_page']) ? (int)$_GET['products_page'] : 1; // Check for page parameter in URL
                $productsPerPage = 20; // Adjust this value as needed
                $sql = "SELECT * FROM products";
                $products = mysqli_query($conn, $sql);
                if (($currentPage - 1) > (($products->num_rows) / 4)){ $currentPage = $currentPage -1; }
                // Calculate offset based on current page
                $offset = ($currentPage - 1) * $productsPerPage;
                if ($offset<1){ $offset = 1; $currentPage = 1;}
                    $sql = "SELECT * FROM products LIMIT $offset, $productsPerPage";
                    $products = mysqli_query($conn, $sql);

                    if ($products->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($products)) {
                            ?>
                            <div class="product-item">
                            <img src="<?php echo $row['image_url']; ?>" alt="Product">
                            <h3><?php echo $row['product_name']; ?></h3>
                            <p><?php echo $row['description']; ?></p>
                            <span class="price"><?php echo $row['price']; ?></span>
                            <form action="add-to-cart.php" method="post">
                                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                <button class="add-to-cart" type="submit">Sebede goşmak</button>
                            </form>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
            <div class="pagination">
                <a href="<?php echo "?products_page=" . ($currentPage - 1); ?>" class="btn previous <?php if ($currentPage <= 1) echo 'disabled'; else echo 'enabled' ?>">Öňki</a>
                <a href="products_list.php" class="btn all-products">Ähli harytlar</a>
                <?php
                $totalProducts = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products"));
                $totalPages = ceil($totalProducts / $productsPerPage) + 1;
                ?>
                <a href="<?php echo "?products_page=" . ($currentPage + 1); ?>" class="btn next <?php if ($currentPage >= $totalPages) echo 'disabled'; ?>">Indiki</a>
            </div>
        </section>

        <?php include 'footer.php'; ?>
    </body>
</html>