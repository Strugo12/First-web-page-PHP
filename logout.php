<?php
session_start();
session_unset();
session_destroy();
setcookie('username', $username, time()-3600);
header('location:index.php');

?>