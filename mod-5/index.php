<?php
session_start();
include("functions.php");

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = authenticateUser($email, $password);
    if($user){
        $_SESSION['user'] = $user;
        header("Location: dashboard.php");
    } else {
        echo "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="index.php">
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
