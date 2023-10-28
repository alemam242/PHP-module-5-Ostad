<?php

function registerUser($username, $email, $password){
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $user = [
        'id' => uniqid(),
        'username' => $username,
        'email' => $email,
        'password' => $hashedPassword,
        'role' => 'user'
    ];

    $users = getUsers();
    $users[] = $user;
    file_put_contents("./userDetails.txt", serialize($users));
}

function getUsers(){
    if(file_exists("./userDetails.txt")){
        $users = file_get_contents("./userDetails.txt");
        return unserialize($users);
    }
    return [];
}

function authenticateUser($email, $password){
    $users = getUsers();
    foreach($users as $user){
        if($user['email'] === $email && password_verify($password, $user['password'])){
            return $user;
        }
    }
    return null;
}

function editUserRole($userId, $newRole){
    $users = getUsers();
    foreach($users as &$user){
        if($user['id'] === $userId){
            $user['role'] = $newRole;
            break;
        }
    }
    file_put_contents("./userDetails.txt", serialize($users));
}

function deleteUser($userId){
    $users = getUsers();
    foreach($users as $key => $user){
        if($user['id'] === $userId){
            unset($users[$key]);
            break;
        }
    }
    file_put_contents("./userDetails.txt", serialize($users));
}

function addUser($username, $email, $password){
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $user = [
        'id' => uniqid(),
        'username' => $username,
        'email' => $email,
        'password' => $hashedPassword,
        'role' => 'user'
    ];

    $users = getUsers();
    $users[] = $user;
    file_put_contents("./userDetails.txt", serialize($users));
}
?>
