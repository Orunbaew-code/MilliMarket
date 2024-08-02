<!DOCTYPE html>
<html>
    <head>
        <title>Milli Market</title>
        <link rel="stylesheet" href="css/styles.css">  
    </head>
    <body>
        <?php include 'header.php'; ?>
        
        <section class="products-container">
            <h2>Categories</h2>
            
            <div class="product-grid">
                <?php include 'functions/db.php';
                $sql = "SELECT * FROM discounts";
                $discounts = mysqli_query($conn, $sql);
                if ($discounts->num_rows > 0)
                {
                    While ($row = mysqli_fetch_assoc($discounts))
                    { ?>
                        <div class="product-item">
                            <img src="<?php echo $row['image_url']; ?>" alt="Discount">
                            <h3><?php echo $row['discount_name']; ?></h3>
                            <p><?php echo $row['description']; ?></p> 
                            <button class="add-to-cart">View</button>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="pagination">
                <a href="#" class="btn previous disabled">Öňki</a>
                <a href="#" class="btn all-products">Ähli arzanladyşlar</a>
                <a href="#" class="btn next">Indiki</a>
            </div>
        </section>
        
        <?php include 'footer.php'; ?>
    </body>
</html>

