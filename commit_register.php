<body>
<?php
include('cn.php');

$userEmail = $_POST['userEmail'];	
$userUsername = $_POST['userUsername'];
$userPassword = $_POST['userPassword'];
$userPasswordConfirm = $_POST['userPasswordConfirm'];
$userSex = $_POST['userSex'];
$userAge = $_POST['userAge'];
$userCountry = $_POST['userCountry'];


// Prevent MySQL Injections
$userEmail = mysql_real_escape_string(stripslashes($userEmail));
$userUsername = mysql_real_escape_string(stripslashes($userUsername));
$userPassword = mysql_real_escape_string(stripslashes($userPassword));
$userPasswordConfirm = mysql_real_escape_string(stripslashes($userPasswordConfirm));


$sql = "SELECT * FROM user";
$resultCount = mysql_query($sql, $cn) or
	die(mysql_error($cn));

$num_users = mysql_num_rows($resultCount);
	
$row_count = -1;
while ($row_count < $num_users) {
	$data = mysql_fetch_object($resultCount);
	$row_count++;
	
	if ($row_count == $num_users) {
		echo '<p>The username "' . $userUsername . '" has been selected.</p>';
		
		if ($userPassword != $userPasswordConfirm) {
			echo '<p>Passwords do not match.</p>';
			echo '<p><strong>New user has not been created.</strong></p>';
			echo '<meta http-equiv="refresh" content="3;url=register.php">';
		} elseif (is_numeric($userAge) == FALSE){
			echo '<p>Age is not a number.</p>';
			echo '<p><strong>New user has not been created.</strong></p>';
			echo '<meta http-equiv="refresh" content="3;url=register.php">';
		} elseif (empty($userPassword)){
			echo '<p>Password is empty.</p>';
			echo '<p><strong>New user has not been created.</strong></p>';
			echo '<meta http-equiv="refresh" content="3;url=register.php">';
		}else {
			echo '<p>Passwords match.</p>';
			
			$sql = "INSERT INTO
					user
				(user_id,
				user_email,
				 user_username,
				 user_password,
				 user_sex,
				 user_age,
				 user_country)
					VALUES
				('" . $row_count . "',
				'" . $userEmail . "', 
				 '" . $userUsername . "',
				 '" . $userPassword . "',
				 '" . $userSex . "',
				 '" . $userAge . "',
				 '" . $userCountry . "')";
			$result = mysql_query($sql, $cn) or
				die(mysql_error($cn));
			
			echo "<p><strong>The username '" . $userUsername . "' has been created. Please login <a href='login.php'>here</a>.</strong></p>";
			echo '<meta http-equiv="refresh" content="3;url=login.php">';
		}
	}
}
?>
</body>
</html>