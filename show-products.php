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
            <?php
                session_start(); // Assuming a session is required
                include 'functions/db.php'; // Assuming db connection is established

                // Get category ID from submitted form
                $categoryId = isset($_POST['category_id']) ? (int)$_POST['category_id'] : null;

                // Validate category ID
                if (is_null($categoryId)) {
                header('Location: index.php?error=invalid_category'); // Redirect with error message
                exit;
                }
                ?>
            <div class="product-grid">
                <?php
                include 'functions/db.php'; // Assuming db connection is established

                // Define variables
                $currentPage = isset($_GET['products_page']) ? (int)$_GET['products_page'] : 1; // Check for page parameter in URL
                $productsPerPage = 40; // Adjust this value as needed
                $sql = "SELECT * FROM products WHERE category_id='$categoryId'";
                $products = mysqli_query($conn, $sql);
                if ($currentPage > $products->num_rows / 40){ $currentPage = $currentPage -1; }
                // Calculate offset based on current page
                $offset = ($currentPage - 1) * $productsPerPage;
                if ($offset<0){ $offset = 0; $currentPage = 1;}
                    $sql = "SELECT * FROM products WHERE category_id='$categoryId' LIMIT $offset, $productsPerPage";
                    $products = mysqli_query($conn, $sql);

                    if ($products->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($products)) {
                            ?>
                            <div class="product-item">
                            <img src="<?php echo $row['image_url']; ?>" alt="Product">
                            <h3><?php echo $row['product_name']; ?></h3>
                            <p><?php echo $row['description']; ?></p>
                            <span class="price"><?php echo $row['price']; ?></span>
                            <button class="add-to-cart">Sebede goşmak</button>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
            <div class="pagination">
                <a href="<?php echo "?products_page=" . ($currentPage - 1); ?>" class="btn previous <?php if ($currentPage <= 1) echo 'disabled'; ?>">Öňki</a>
                
                <?php
                $totalProducts = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products"));
                $totalPages = ceil($totalProducts / $productsPerPage);
                ?>
                <a href="<?php echo "?products_page=" . ($currentPage + 1); ?>" class="btn next <?php if ($currentPage >= $totalPages) echo 'disabled'; ?>">Indiki</a>
            </div>

<?php include 'footer.php'; ?>
    </body>
</html>