<?php
session_start();

// Dummy username and password
$valid_username = "admin";
$valid_password = "password";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the credentials are valid
    if ($username === $valid_username && $password === $valid_password) {
        // Authentication successful
        $_SESSION["username"] = $username;
        header("Location: cashier.php");
        exit;
    } else {
        // Authentication failed
        echo "Invalid username or password";
    }
}
?>
