<?php
include('cn.php');

//echo $_POST['Email'];

$userEmail = $_POST['Email'];	
$userUsername = $_POST['Username'];
$userPassword = $_POST['Password1'];
$userPasswordConfirm = $_POST['Password2'];
$userCountry = $_POST['Countries'];


// Prevent MySQL Injections
$userEmail = mysqli_real_escape_string($cn, stripslashes($userEmail));
$userUsername = mysqli_real_escape_string($cn, stripslashes($userUsername));
$userPassword = mysqli_real_escape_string($cn, stripslashes($userPassword));
$userPasswordConfirm = mysqli_real_escape_string($cn, stripslashes($userPasswordConfirm));

$eMatched = false;
$uMatched = false;

//////////////// EMAIL CHECK ////////////////////////////////////
$sql = "SELECT user_email FROM user";
$result2 = mysqli_query($cn, $sql) or
	die(mysql_error($cn));

$num_users = mysqli_num_rows($result2);

$row = mysqli_fetch_array($result2);

if($userEmail == $row['user_email']){
   	echo 'e matched';
   	$eMatched = true;
}

while ($row = $result2->fetch_assoc()) {  
	if($userEmail == $row['user_email']){
   		echo 'e matched';
   		$eMatched = true;
   }
 }


////////////////////////////// USERNAME CHECK /////////////////////////

$sql = "SELECT user_username FROM user";
$result2 = mysqli_query($cn, $sql) or
	die(mysql_error($cn));

$num_users = mysqli_num_rows($result2);

$row = mysqli_fetch_array($result2);

if($userUsername == $row['user_username']){
   	//echo 'u matched';
   	$uMatched = true;
}

while ($row = $result2->fetch_assoc()) {  
	if($userUsername == $row['user_username']){
   		//echo 'u matched';
   		$uMatched = true;
   }
 }
 ///////////////////////////////////////////////////////

$sql = "SELECT * FROM user";
$resultCount = mysqli_query($cn, $sql) or
	die(mysql_error($cn));

$num_users = mysqli_num_rows($resultCount);
	
$row_count = -1;
while ($row_count < $num_users) {
	$data = mysqli_fetch_object($resultCount);
	$row_count++;

	
	if ($row_count == $num_users) {
		//echo '<p>The username "' . $userUsername . '" has been selected.</p>';
		
		if ($userPassword != $userPasswordConfirm) {
			echo 'Error: Passwords do not match';
			$error = "Passwords do not match";
			return $error;
		} elseif (empty($userPassword)){
			echo 'Password is empty';;
			$error = "Password is empty";
			return $error;
		}elseif ($uMatched == true){
			echo 'Username already taken';
		}elseif ($eMatched == true){
			echo 'Email already in use';
		
		}else {
						
			$sql = "INSERT INTO
					user
				(user_id,
				user_email,
				 user_username,
				 user_password,
				 user_country)
					VALUES
				('" . $row_count . "',
				'" . $userEmail . "', 
				 '" . $userUsername . "',
				 '" . $userPassword . "',
				 '" . $userCountry . "')";
			$result = mysqli_query($cn, $sql) or
				die(mysqli_error($cn));
			echo "<p id='goodText'><strong>CONGRATULATIONS and Welcome to GameTogether!!!</strong></p>";
			echo "<p id='goodText'><strong>The username '" . $userUsername . "' has been created. </strong></p>";
			echo '<meta http-equiv="refresh" content="4;url=login.php">';
		}
	}
}
?>
