<?php

use \Classes\adminOperation;

include_once './Classes/adminOperation.php';


$admin = new adminOperation();

$allUsers = $admin->getAllUsers();

$AssocArray = json_decode($allUsers,true);


// echo "<pre>";
// print_r($AssocArray);
// echo "</pre>";


for($i=0;$i<count($AssocArray);$i++){
    echo $AssocArray[$i]['username'].'<br>';
}