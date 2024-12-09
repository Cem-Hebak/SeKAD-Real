<?php
// db.php
$host = 'localhost';
$dbname = 'admin';
$username = 'root';
$password = '';

try {
    $dsn = "mysql:host=localhost;dbname=admin;charset=utf8mb4";
    $username = "root"; // Replace with your database username
    $password = ""; // Replace with your database password

    // Create a PDO instance
    $conn = new PDO($dsn, $username, $password);

    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
