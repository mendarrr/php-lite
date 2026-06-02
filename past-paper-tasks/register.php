<?php
// Database connection
$conn = mysqli_connect("127.0.0.1", "phpuser", "secret", "User");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $name = $_POST['name'] ?? '';
    $location = $_POST['location'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';

    // Escape values for safety
    $name = mysqli_real_escape_string($conn, $name);
    $location = mysqli_real_escape_string($conn, $location);
    $phone = mysqli_real_escape_string($conn, $phone);
    $email = mysqli_real_escape_string($conn, $email);

    // Insert into database
    $sql = "INSERT INTO users (Name, Location, Phone, Email)\n  
    VALUES ('$name', '$location', '$phone', '$email')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method.";
}

mysqli_close($conn);
