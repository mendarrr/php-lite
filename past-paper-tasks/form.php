<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
</head>

<body>
    <h2>User Registration</h2>
    <form action="register.php" method="POST">
        Name: <input type="text" name="name" required><br><br>
        Location: <input type="text" name="location" required><br><br>
        Phone Number: <input type="text" name="phone" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        <input type="submit" value="Register">
    </form>
</body>

</html>
