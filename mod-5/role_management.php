<?php
session_start();
include("functions.php");

if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin'){
    header("Location: index.php");
    exit();
}

if(isset($_POST['editRole'])){
    $userId = $_POST['userId'];
    $newRole = $_POST['role'];
    editUserRole($userId, $newRole);
}

if(isset($_POST['deleteUser'])){
    $userId = $_POST['userId'];
    deleteUser($userId);
}

if(isset($_POST['addUser'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    addUser('user',$username, $email, $password);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Role Management</title>
</head>
<body>
    <div>Welcome <?php echo $_SESSION['user']['username']; ?> <a href="logout.php">Logout</a></div>
    <h2>Role Management</h2>
    <!-- Display user details in a table -->
    <table border="1">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Edit Role</th>
            <th>Delete User</th>
        </tr>
        <?php
        $users = getUsers();
        foreach($users as $user){
            echo "<tr>";
            echo "<td>{$user['username']}</td>";
            echo "<td>{$user['email']}</td>";
            echo "<td>{$user['role']}</td>";
            echo "<td>
                    <form method='post' action=''>
                        <input type='hidden' name='userId' value='{$user['id']}'>
                        <select name='role'>
                            <option value='user'>User</option>
                            <option value='manager'>Manager</option>
                            <option value='admin'>Admin</option>
                        </select>
                        <button type='submit' name='editRole'>Edit</button>
                    </form>
                  </td>";
            echo "<td>
                    <form method='post' action=''>
                        <input type='hidden' name='userId' value='{$user['id']}'>
                        <button type='submit' name='deleteUser'>Delete</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <!-- Add User Modal -->
    <div id="addUserModal" style="display:none;">
        <h3>Add User</h3>
        <form method="post" action="">
            Username: <input type="text" name="username" required><br>
            Email: <input type="email" name="email" required><br>
            Password: <input type="password" name="password" required><br>
            <button type="submit" name="addUser">Add User</button>
        </form>
    </div>

    <button onclick="document.getElementById('addUserModal').style.display='block'">Add User</button>

    <script>
        // Close the modal when clicking outside the modal
        window.onclick = function(event) {
            if (event.target == document.getElementById('addUserModal')) {
                document.getElementById('addUserModal').style.display = "none";
            }
        }
    </script>
</body>
</html>
