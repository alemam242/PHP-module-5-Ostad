<?php
session_start();

if(!(isset($_SESSION['userName']) && isset($_SESSION['userEmail']) && isset($_SESSION['userRole']))){
    header("Location: ./login.php");
}
else{
    if($_SESSION['userRole'] === 'user'){
        header("Location: ./user-page.php");
    }else if($_SESSION['userRole'] === 'manager'){
        header("Location: ./manager-page.php");
    }
    else if($_SESSION['userRole'] === 'admin'){
        header("Location: ./manage-role.php");
    }
}
?>



