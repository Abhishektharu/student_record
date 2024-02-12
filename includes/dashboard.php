<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Display dashboard content here

echo "Welcome, " . $_SESSION['email'];

?>

<a href="logout.php">Logout</a>
