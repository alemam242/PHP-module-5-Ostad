<?php
session_start();

use \Classes\adminOperation;

include_once './Classes/adminOperation.php';

if (!(isset($_SESSION['userName']) && isset($_SESSION['userEmail']) && isset($_SESSION['userRole']))) {
    header("Location: ./login.php");
} else {
    if ($_SESSION['userRole'] === 'manager') {
        header("Location: ./manager-page.php");
    } else if ($_SESSION['userRole'] === 'user') {
        header("Location: ./user-page.php");
    } else if ($_SESSION['userRole'] === 'admin') {

        $admin = new adminOperation();

        $allUsers = $admin->getAllUsers();

        $usersArray = json_decode($allUsers, true);


        
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Management</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
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

<div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2>Welcome, <?php echo $_SESSION['userName']; ?>!</h2>
                    </div>
                    <div>
                        <a href="./logout.php" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <h2 class="mx-auto">Role Management</h2>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createRoleModal">Add User</button>
        <table class="table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
                <?php
                
                for($i=0;$i<count($usersArray);$i++){
                    if($_SESSION['userName'] != $usersArray[$i]['username']){
                        echo "<tr>
                        <td>{$usersArray[$i]['username']}</td>
                        <td>{$usersArray[$i]['email']}</td>
                        <td>{$usersArray[$i]['role']}</td>
                        <td>
                        <form method='post' action=''>
                            <button onclick='return passValue(\"{$usersArray[$i]['username']}\")' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editRoleModal'>Edit</button>
                            <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                        </form>
                        </td>
                        </tr>";
                    }
                }
                
                ?>
                <!-- <tr>
                    <td>alemam</td>
                    <td>alemam@gmail.com</td>
                    <td>admin</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editRoleModal">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr> -->
            </tbody>
        </table>
    </div>


    <!-- Create Role Modal -->
    <div class="modal fade" id="createRoleModal" tabindex="-1" aria-labelledby="createRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm">
                        <div class="mb-3">
                            <label for="editRole" class="form-label">Role</label>
                            <select class="form-select" id="editRole" required>
                                <option value="user">User</option>
                                <option value="manager">Manager</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Role Modal -->
    <div class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="editRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" method="GET" action="<?php $_SERVER['PHP_SELF']?>">
                        <div class="mb-3">
                            <label for="editRole" class="form-label">Role</label>
                            <select class="form-select" id="editRole" name="role" required>
                                <option value="user">User</option>
                                <option value="manager">Manager</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <input type="hidden" id="editUserId" name="username">
                        <button type="submit" class="btn btn-primary" onclick="display()">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function passValue(username){
            let name = username;

            document.getElementById('editUserId').value = username;
            console.log(name);

            return false;
        }

        function validateForm() {
        // You can add validation logic here if needed
        return true; // Return true to allow form submission
    }

        function display(){
            console.log(document.getElementById('editUserId').value);
        }
    </script>
</body>

</html>
