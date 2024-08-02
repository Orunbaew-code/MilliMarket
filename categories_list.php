<!DOCTYPE html>
<html>
    <head>
        <title>Milli Market</title>
        <link rel="stylesheet" href="css/styles.css">  
    </head>
    <body>
        <?php include 'header.php'; 
        include 'functions/db.php'; ?>
        
        <section class="products-container">
            <h2>Kategoriýalar</h2>
            <div class="product-grid">
                <?php  
                $sql = "SELECT * FROM categories";
                $categories = mysqli_query($conn, $sql);
                if ($categories->num_rows > 0)
                {
                    While ($row = mysqli_fetch_assoc($categories))
                    { ?>
                        <div class="product-item">
                            <img src="<?php echo $row['category_pic']; ?>" alt="Product">
                            <h3><?php echo $row['category_name']; ?></h3>
                            <p><?php echo $row['description'] ?></p>
                            <p class="quantity">Haryt mukdary: <?php echo $categories->num_rows; ?></p>
                            <form action="show-products.php" method="post">
                                <input type="hidden" name="category_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="all-cat-products">Ählisini görmek</button>
                            </form>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="pagination">
                <a href="#" class="btn previous disabled">Öňki</a>
                <a href="#" class="btn all-products">Ähli kategoriýalar</a>
                <a href="#" class="btn next">Indiki</a>
            </div>
        </section>

        <?php include 'footer.php'; ?>
    </body>
</html>

