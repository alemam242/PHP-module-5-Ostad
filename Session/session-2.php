<?php
// session_name("app");
session_start([
    "cookie_lifetime"=>30,
    // "cookie_domain"=>"",
    // "cookie_path"=>"/"
]);

// $_SESSION['role'] = "admin";


echo $_SESSION['role'];