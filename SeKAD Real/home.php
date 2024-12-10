<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "Welcome, " . htmlspecialchars($_SESSION['name']) . "!";
echo "<br>Your email: " . htmlspecialchars($_SESSION['email']);
echo "<br>Your role is: " . htmlspecialchars($_SESSION['role']);
echo "<br>Mobile Number: " . htmlspecialchars($_SESSION['mobilenumber']);
echo "<br>Father's name: " . htmlspecialchars($_SESSION['fname']);
echo "<br>Mother's name: " . htmlspecialchars($_SESSION['mname']);
echo "<br>";

?>

<a href="logout.php">Logout</a>
