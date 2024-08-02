<?php 
$servername = "localhost"; // Replace with your database server hostname
$username = "admin"; // Replace with your database username
$password = "admin"; // Replace with your database password
$dbname = "milli"; // Replace with your database name

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>