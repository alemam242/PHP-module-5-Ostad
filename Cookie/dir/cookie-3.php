<?php
setcookie('role','admin',time()+100,"/"); // set cookie which can be access from any sub domain

echo $_COOKIE['username']." -- ".$_COOKIE['role'];
