<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "Welcome, " . htmlspecialchars($_SESSION['name']) . "!";
echo "<br>Your role is: " . htmlspecialchars($_SESSION['role']);
?>

<a href="logout.php">Logout</a>
