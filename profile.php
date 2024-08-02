<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Milli Market - Profile</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
  <main class="profile">
    <div class="container">
      <h1>Your Profile</h1>

      <div class="profile-info">
        <img src="images/profile-picture.jpg" alt="Profile picture">
        <div class="user-details">
          <h3>[Your Name]</h3>
          <p>[Email Address]</p>
          <p>[Phone Number] (optional)</p>
        </div>
      </div>

      <h2>Your Orders</h2>
      <ul class="orders-list">
        <li>
          <a href="#">Order #12345 (Details)</a> - [Date] - [Total amount]
        </li>
        </ul>

      <h2>Your Preferences</h2>
      <p>Manage your preferred delivery address, payment methods, and other account settings.</p>
      <a href="#" class="btn">Edit Preferences</a>
    </div>
  </main>
  
  <?php include 'footer.php'; ?>
</body>
</html>
