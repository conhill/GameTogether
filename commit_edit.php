<body>
<?php
include('cn.php');



	$title = $_POST['title'];
	$game = $_POST['game'];
	$consol = $_POST['consol'];
	$gamertag = $_POST['gamertag'];
	$details = $_POST['details'];
	$startdate = $_POST['startdate'];
	$starttime = $_POST['starttime'];
	$enddate = $_POST['enddate'];
	$endtime = $_POST['endtime'];
	$mic = $_POST['mic'];
	$slots = $_POST['slots'];
	$ID = $_POST['id'];


// Prevent MySQL Injections
$title = mysql_real_escape_string(stripslashes($title));
$game = mysql_real_escape_string(stripslashes($game));
$details = mysql_real_escape_string(stripslashes($details));
$gamertag = mysql_real_escape_string(stripslashes($gamertag));
$startdate = mysql_real_escape_string(stripslashes($startdate));
$enddate = mysql_real_escape_string(stripslashes($enddate));

$dbc = mysqli_connect('localhost', 'Dnoop', 'Chill35050', 'gametogether');

$sql = "SELECT * FROM requestpost WHERE ID = '$ID'";

$result = mysqli_query($dbc, "SELECT * FROM requestpost WHERE ID = '$ID'");
$row = mysqli_fetch_array($result);
 
  $UN = $row['Username'];

		if (empty($title)) {
			echo '<p>Passwords do not match.</p>';
			echo '<p><strong>New user has not been created.</strong></p>';
			echo '<meta http-equiv="refresh" content="3;url=register.php">';
		}else {
			echo '<p>UPDATED!.</p>';
			
			$sql = "UPDATE requestpost SET Title = '$title', game = '$game', consol = '$consol', gamertag = '$gamertag', startdate = '$startdate', starttime = '$starttime', enddate = '$enddate', endtime = '$endtime', slots = '$slots', mic = '$mic' WHERE ID = '$ID'";
				
			$result = mysqli_query($dbc, $sql) or
				die(mysqli_error($dbc));
			  
			//echo "<p><strong>The username '" . $userUsername . "' has been created. Please login <a href='login.php'>here</a>.</strong></p>";
			//echo "<td>" . "<a href=\"profile.php?id={$UN}\">Profile</a>" . "</td>";
			echo '<meta http-equiv="refresh" content="3;url=mainmain.php">';
	echo 	'<p>Update successful. Go to <a href="mainmain.php">main page</a>.</p>';
		}
	

?>
</body>
</html>