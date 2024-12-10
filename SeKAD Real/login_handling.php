<?php
include ("db_connection.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ic_number = $_POST['ic_number'];
    $password = $_POST['password'];

    try {
        // Check if user exists
        $stmt = $pdo->prepare("SELECT * FROM users WHERE ic_number = ?");
        $stmt->execute([$ic_number]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Set session variables for the logged-in user
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role']; // Add a role column to the users table if not already there
            $_SESSION['mobilenumber'] = $user['mobilenumber'];
            $_SESSION['fname'] = $user['fname'];
            $_SESSION['mname'] = $user['mname'];
            $_SESSION['avatar'] = $user['avatar'];

            // Redirect to home page
            header("Location: home.php");
            exit();
        } else {
            // Redirect back to login with error message
            header("Location: login.php?error=Invalid IC number or password");
            exit();
        }
    } catch (PDOException $e) {
        die("Error during login: " . $e->getMessage());
    }
}
?>
