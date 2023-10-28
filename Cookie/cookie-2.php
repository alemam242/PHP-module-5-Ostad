<?php
setcookie('username','alemam',time()+100); // set cookie

echo $_COOKIE['username']." -- ".$_COOKIE['role'];

// setcookie('username','alemam',time()-40); // unset cookie