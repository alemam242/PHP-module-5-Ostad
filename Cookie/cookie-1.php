<?php
// setcookie('username','alemam',time()+40); // set cookie

echo $_COOKIE['username'];

setcookie('username','alemam',time()-40); // unset cookie