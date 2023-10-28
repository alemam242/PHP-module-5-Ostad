<?php
include("functions.php");

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    registerUser($username, $email, $password);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h2>Registration</h2>
    <form method="post" action="registration.php">
        Username: <input type="text" name="username" required><br>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>
