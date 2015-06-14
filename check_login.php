<?php

include_once('password.php');
   

$cn = mysqli_connect('localhost', 'Dnoop',  $password, 'loginsetup') or
	die('Unable to connect. Check connection parameters.');

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}


$userUsername = $_POST['Username'];
$userPassword = $_POST['Password1'];

// to protect against MySQL injection
$userUsername = mysqli_real_escape_string($cn, stripslashes($userUsername));
$userPassword = mysqli_real_escape_string($cn, stripslashes($userPassword));

$sql = "SELECT * FROM user WHERE user_username = '$userUsername' and user_password = '$userPassword'";

$result = mysqli_query($cn, $sql) or
	die(mysqli_error($cn));
	
// check if the specified user was found in database
$numberOfUsersFound = mysqli_num_rows($result);

if($numberOfUsersFound == 1) {
    echo '<meta http-equiv="refresh" content="1;url=mainmain.php">';
	echo '<h1 id="goodText" >Login successful</h1>';
	
	$_SESSION['loggedInUser'] = $userUsername;
} else {
	echo 'Wrong Username or Password';
}
?>