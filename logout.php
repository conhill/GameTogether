<?php
include('cn.php');

// you have to open the session first
session_start();

// remove all the variables in the session
session_unset();

// destroy the session
session_destroy();
echo '<meta http-equiv="refresh" content="1;url=mainmain.php">';
echo 'You have been successfully logged out. Return to <a href="mainmain.php">main screen</a>.';
?>