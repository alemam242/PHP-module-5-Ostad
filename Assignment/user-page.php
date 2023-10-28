<?php
session_start();

if (!(isset($_SESSION['userName']) && isset($_SESSION['userEmail']) && isset($_SESSION['userRole']))) {
    header("Location: ./login.php");
} else {

    if ($_SESSION['userRole'] === 'manager') {
        header("Location: ./manager-page.php");
    } else if ($_SESSION['userRole'] === 'admin') {
        header("Location: ./manage-role.php");
    }

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details Page</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card text-center">
                    <div class="card-header">
                        USER DETAILS
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" id="welcomeMessage"></h5>
                        <p class="card-text"><strong>Username:</strong> <span id="username"><?php echo $_SESSION['userName']; ?></span></p>
                        <p class="card-text"><strong>User Email:</strong> <span id="userEmail"><?php echo $_SESSION['userEmail']; ?></span></p>
                        <p class="card-text"><strong>User Role:</strong> <span id="userRole"><?php echo $_SESSION['userRole']; ?></span></p>

                        <a href="./logout.php" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>