<?php
include_once('password.php');

$cn = mysqli_connect('localhost', 'Dnoop', $password, 'loginsetup') or
	die('Unable to connect. Check connection parameters.');
//mysql_select_db('loginsetup', $cn) or
//	die(mysql_error($cn));
?>