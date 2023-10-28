<?php
session_start();
$_SESSION['username']  = "alemam";


echo $_SESSION['username'];

// session_destroy();