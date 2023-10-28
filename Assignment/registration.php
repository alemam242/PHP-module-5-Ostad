<?php
session_start();

include_once './Classes/inputValidation.php';
include 'functions.php';

use \Classes\inputValidtaion;


if(isset($_SESSION['user'])){

    $user = $_SESSION['user'];
    if ($user['role'] === 'manager') {
        header("Location: ./manager-page.php");
    } else if ($user['role'] === 'admin') {
        header("Location: ./manage-role.php");
    } else {
        header("Location: ./user-page.php");
    }
}

$usernameError = $emailError = $passwordError = "";
$role = "user"; // default


if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $userInput = new inputValidtaion($username,$email,$password);

    if(!$userInput->is_valid_username()){
        $usernameError="* username should contain only letters & numbers";
    }
    if(!$userInput->is_exists_username()){
        $usernameError="* username is not available";
    }
    if(!$userInput->is_valid_email()){
        $emailError="* Your mail is not valid!";
    }
    if(!$userInput->is_exists_email()){
        $emailError="* This email has already been used.";
    }
    if(!$userInput->is_valid_password()){
        $passwordError="* Password is too short!";
    }

    if($usernameError == "" && $emailError=="" && $passwordError==""){
        file_put_contents("./userDetails.txt","{$role}, {$username}, {$email}, {$userInput->getEncryptedPassword()}\n",FILE_APPEND);

        header("Location: ./login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-container">
            <h2 class="text-center mb-4">Signup</h2>
            <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
            <div class="mb-3">
                    <label for="username" class="form-label">Username <?php echo "<label for='username' class='text-danger'>$usernameError</label>";?></label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Set your username" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label> <?php echo "<label for='email' class='text-danger'>$emailError</label>";?>
                    <input type="email" class="form-control" id="email" name="email" placeholder="xyz@gmail.com" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label> <?php echo "<label for='password' class='text-danger'>$passwordError</label>";?>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Set strong password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Signup</button>
                <p class="mt-2">Already have an account? <a href="./login.php">Login</a></p>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
