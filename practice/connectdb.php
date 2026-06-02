<?php
// Create a connection
$conn = mysqli_connect("localhost","username","","myDatabase");

// check Connection
if (!$conn) {
    die("Connection failed". mysqli_connect_error());
} else {
    echo ("Connected Succesfully");
}

// Execute a Query
$result = mysqli_query($conn,"SELECT * FROM users");

// Select Rows from Table
while ($row = mysqli_fetch_assoc($result)) {
    // Code Goes Here
}

// Select Rows from Table
$myName = $row["name"];
echo ("Hello, ". $myName);

// Insert Records into a Table
$insertSql = "INSERT INTO users (Name, Location, Phone, Email)\n  
VALUES ('Pick Misha', 'Malaba', '0712345678', 'picky@gmail.com'),";

// Update Records
$updateSql = "UPDATE users SET phone='0112345678' WHERE id=1";

// Delete Record
$deleteSql = "DELETE FROM users WHERE id=1";

// Close the Database connection
mysqli_close($conn);

?>