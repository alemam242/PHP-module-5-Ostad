<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}

$user = $_SESSION['user'];

if($user['role'] === 'admin'){
    header("Location: role_management.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome <?php echo $user['username']; ?></title>
</head>
<body>
    <div>Welcome <?php echo $user['username']; ?> </div>
    <a href="logout.php">Logout</a>
    <!-- User dashboard content here -->
</body>
</html>
