<?php
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

// Check if the email is already registered
$sql_check = "SELECT * FROM user_infos WHERE email='$email'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // Email is already registered, redirect back to registration page with an error
    header("Location: register.php?error=1");
} else {
    // Email is not registered, proceed with registration
    $sql_register = "INSERT INTO user_infos (email, password) VALUES ('$email', '$password')";

    if ($conn->query($sql_register) === TRUE) {
        // Registration successful, redirect to login page
        header("Location: login.php");
    } else {
        // Registration failed, redirect back to registration page with an error
        header("Location: register.php?error=2");
    }
}

$conn->close();
?>
