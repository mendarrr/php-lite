<?php

$servername = "localhost";
$username = "myself";
$password = "xxx";
$dbname = "MySchool";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "This page accepts POST requests only. Please submit the form from index.html.";
    mysqli_close($conn);
    exit;
}

$name = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$gender = $_POST['gender'] ?? '';
$hearaboutus = $_POST['hearaboutus'] ?? '';

if (!$name || !$password || !$gender || !$hearaboutus) {
    echo "Missing form data. Please fill in all required fields.";
    mysqli_close($conn);
    exit;
}

// Insert one row from the data captured in the above form
$stmt = mysqli_prepare($conn, "INSERT INTO REGISTER (Name, Password, Gender, HearAboutUs) VALUES (?, ?, ?, ?)");
if (!$stmt) {
    die("Prepare failed: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, 'ssss', $name, $password, $gender, $hearaboutus);
if (!mysqli_stmt_execute($stmt)) {
    die("Insert failed: " . mysqli_stmt_error($stmt));
}

echo "Connected successfully. Record inserted successfully.<br>";

mysqli_stmt_close($stmt);

// Retrieve the details of all the registered users
$sql = "SELECT * FROM REGISTER";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Select failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . htmlspecialchars($row['Name']) . " | ";
        echo "Gender: " . htmlspecialchars($row['Gender']) . " | ";
        echo "Heard About: " . htmlspecialchars($row['HearAboutUs']) . "<br>";
    }
} else {
    echo "No records found.<br>";
}

// Update the password of a particular user called ABC
$newPassword = "newpassword123";
$sql = "UPDATE REGISTER SET Password = '$newPassword' WHERE Name = 'ABC'";

if (mysqli_query($conn, $sql)) {
    echo "Password updated successfully for user ABC.";
} else {
    echo "Error updating password: " . mysqli_error($conn);
}

mysqli_close($conn);
