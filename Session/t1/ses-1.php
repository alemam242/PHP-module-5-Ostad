<?php
session_name("app");
session_start([
    "cookie_lifetime"=>300,
    // "cookie_domain"=>"",
    "cookie_path"=>"/t1"
]);

$_SESSION['user'] = "emam";

echo $_SESSION['user']." -- ".$_SESSION['role'];