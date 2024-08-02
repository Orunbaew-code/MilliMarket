<?php
session_start(); // Start or resume the PHP session

include 'functions/db.php'; // Assuming db connection is established

// Get product ID from form submission
$productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : null;  // Replace 'hidden_field_name' with the actual name of the hidden input field

// Validate product ID
if (is_null($productId)) {
  header('Location: index.php?error=invalid_product'); // Redirect with error message
  exit;
}

// Check if product exists in database
$sql = "SELECT * FROM products WHERE product_id = $productId";
$result = mysqli_query($conn, $sql);
if ($result->num_rows === 0) {
  header('Location: index.php?error=product_not_found'); // Redirect with error message
  exit;
}

// If product exists, add it to the cart session (or update quantity if already present)
$product = mysqli_fetch_assoc($result);
$product_name = $product['product_name'];
$product_price = $product['price'];
$product_image = $product['image_url'];

$sql = "INSERT INTO carts (product_image, product_name, product_price, product_quantity) VALUES ('$product_image', '$product_name', '$product_price', 1)";
$result = $conn->query($sql);


if (isset($_SESSION['cart'][$productId])) {
  // Product already in cart, update quantity
  $_SESSION['cart'][$productId]['quantity']++;
} else {
  // New product to cart
  $_SESSION['cart'][$productId] = [
    'product_id' => $product['product_id'],
    'name' => $product['product_name'],
    'price' => $product['price'],
    'quantity' => 1,
  ];
}

// Redirect back to product listing (or desired page)
header('Location: index.php?success=added_to_cart'); // Redirect with success message
exit;
