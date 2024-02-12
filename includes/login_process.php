<?php
session_start();

// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "php_crud";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$email = $_POST['email'];
$password = $_POST['password'];

// Check if the user exists
$sql = "SELECT * FROM user_infos WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // User exists, set session variables
    $_SESSION['email'] = $email;

    // Redirect to a secure page (e.g., dashboard.php)
    header("Location: students.php");
} else {
    // Invalid credentials, redirect back to login page
    header("Location: login.php?error=1");
}

$conn->close();
?>
