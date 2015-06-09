<?php

// Prevent MySQL Injections
//$userEmail = mysql_real_escape_string(stripslashes($userEmail));

//$sql = "SELECT * FROM user WHERE user_email = '" . $userEmail . "'";
//$resultCount = mysql_query($sql, $cn) or
//	die(mysql_error($cn));
	
$dbc = mysqli_connect('localhost', 'Dnoop', 'Chill35050', 'loginsetup');
$result = mysqli_query($dbc, "SELECT * FROM user WHERE user_email= '" . $_POST['userEmail'] . "'");


$to      = '$userEmail';
$subject = 'Username and Password';
$message = 'Hello! Your user name is $user_username and your password is $user_password';
$headers = 'From: gametogetherpass@gmail.com' . "\r\n" .
    'Reply-To: gametogetherpass@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>