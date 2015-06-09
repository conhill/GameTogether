<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
   $(function() {
    $( "#datepicker1" ).datepicker();
  });
  </script>
</head>
<body>
<?php
include('cn.php');
include('header.html');
include_once('password.php');

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if(isset($_SESSION['loggedInUser'])){
$userUsername = $_SESSION['loggedInUser'];


$sql = "SELECT * FROM user WHERE
	user_username = '" . $userUsername . "'";
$result = mysqli_query($cn, $sql) or
	die(mysqli_error($cn));
$row = mysqli_fetch_assoc($result);


}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$dbc = @mysql_connect('localhost', 'Dnoop', $password);
	mysql_select_db('gametogether', $dbc);
	
	$okay = TRUE;
	
	if(empty($_POST['game'])) {
		print '<p class="error">Please enter a game address.</p>';
		$okay = FALSE;
	} else {
	$game = mysql_real_escape_string(trim(strip_tags($_POST['game'])), $dbc);
	}
		
	if(empty($_POST['gamertag'])) {
		print '<p class="error">Please enter your gamertag.</p>';
		$okay = FALSE;
	} else {
	$gamertag = mysql_real_escape_string(trim(strip_tags($_POST['gamertag'])), $dbc);
	}
	
	if(empty($_POST['title'])) {
		print '<p class="error">Please enter a title.</p>';
		$okay = FALSE;
	} else {
	$title = mysql_real_escape_string(trim(strip_tags($_POST['title'])), $dbc);
	}
	
	if(empty($_POST['consol'])) {
		print '<p class="error">Please select a consol.</p>';
		$okay = FALSE;
	}
	
	if(empty($_POST['details'])) {
		print '<p class="error">Please enter some details.</p>';
		$okay = FALSE;
	} else {
	$details = mysql_real_escape_string(trim(strip_tags($_POST['details'])), $dbc);
	}
	
	if(empty($_POST['startdate'])) {
		print '<p class="error">Please select a start date.</p>';
		$okay = FALSE;
	} else {
	$startdate = mysql_real_escape_string(trim(strip_tags($_POST['startdate'])), $dbc);
	}
	
	if(empty($_POST['starttime'])) {
		print '<p class="error">Please select a start time.</p>';
		$okay = FALSE;
	} 
	
	if(empty($_POST['enddate'])) {
		print '<p class="error">Please select a end date.</p>';
		$okay = FALSE;
	} 
	
	if(empty($_POST['endtime'])) {
		print '<p class="error">Please select a end time.</p>';
		$okay = FALSE;
	} 
	
	if(empty($_POST['slots'])) {
		print '<p class="error">Please select a number of slots.</p>';
		$okay = FALSE;
	} 
	
	if(empty($_POST['mic'])) {
		print '<p class="error">Please select if they need a mic.</p>';
		$okay = FALSE;
	} 
	
	if(empty($_POST['terms'])) {
		print '<p class="error">Please agree to terms.</p>';
		$okay = FALSE;
	} 
	
	if($_POST['startdate'] > $_POST['enddate']) {
		print '<p class="error">Your start date must be before your end date.</p>';
		$okay = FALSE;
	} 
	
	if($_POST['startdate'] == $_POST['enddate']) {
		//1am < 3am
		//$st = substr($_POST['starttime'], -2);
		//$end = substr($_POST['starttime'], -2);
		//$numstart =  substr($_POST['starttime'], 0, 2);
		echo $st;
		echo $end;
		echo $numstart;
		if($_POST['starttime'] < $_POST['endtime']){
			if($st == "AM" && $end == "PM"){
				$okay = TRUE;
			} elseif($st == "AM" && $end == "AM" && $numstart == 12 || $st == "PM" && $end == "PM" && $numstart == 12){
				$okay = TRUE;
			} else{
				print '<p class="error">Your start time must be before your end time.</p>';
				$okay = FALSE;
			}
		}
	} 
	
	$ID = uniqid();
	//$deets = $_POST['details'];
	//echo $deets;

	if($okay){
	
		$query = "INSERT INTO requestpost VALUES ('$title', '$userUsername', '$ID', '$_POST[consol]', '$game', '$gamertag', '$details', '$_POST[startdate]', '$_POST[starttime]', '$_POST[enddate]', '$_POST[endtime]', '$_POST[slots]', '$_POST[mic]')";
		
		if(@mysql_query($query, $dbc)) {
			print '<p>Entry added</p>';
			print $title;
			print $_POST['title'];
			print $_POST['date'];
			 header("Location: /posted.php");
		} else {
			print '<p style="color: red;">Could not add entry because:<br />' . mysql_error() . '.</p>';
		}
	}
	
	mysql_close($dbc);
}
?>		
<center><img src="submit.jpg" align="middle"></center>
<form action="submit.php" method="post">
    <p>Title:    
        <input type="text" name="title" size="20" maxlength="30"/>
    </p>
	<p>Console:
		<select name="consol">
            <option value="Xbox">Xbox</option>
            <option value="Xbox 360">Xbox 360</option>
            <option value="Xbox One">Xbox One</option>
            <option value="PS">Playstation</option>
            <option value="PS2">Playstation 2</option>
            <option value="PS3">Playstation 3</option>
			<option value="PS4">Playstation 4</option>
            <option value="Gamecube">Gamecube</option>
            <option value="Wii">Wii</option>
            <option value="Wii U">Wii U</option>
            <option value="Steam">Steam</option>
            <option value="Origin">Origin</option>
            <option value="Facebook">Facebook</option>
			<option value="PC Game">PC Game</option>
        </select>
    <p>Game:    
        <input type="text" name="game" size="20" maxlength="20"/>
    </p>
	<p>Gamertag:    
        <input type="text" name="gamertag" size="20" maxlength="20"/>
    </p>
    <p>Details:
        <textarea name="details" type="text" rows="9" cols="30" maxlength="500" placeholder='Fill with any other requirements (Age, Skill, etc...)'></textarea>
    </p>
    <p>Starting Date:
        <input type="text" id="datepicker" name="startdate"/>
    </p>
    <p>Starting Time:
        <select name="starttime" id="starttime">
        <option value="12:00 AM">12:00 AM</option>
        <option value="12:15 AM">12:15 AM</option>
        <option value="12:30 AM">12:30 AM</option>
        <option value="12:45 AM">12:45 AM</option>
        <option value="1:00 AM">1:00 AM</option>
        <option value="1:15 AM">1:15 AM</option>
        <option value="1:30 AM">1:30 AM</option>
        <option value="1:45 AM">1:45 AM</option>
        <option value="2:00 AM">2:00 AM</option>
        <option value="2:15 AM">2:15 AM</option>
        <option value="2:30 AM">2:30 AM</option>
        <option value="2:45 AM">2:45 AM</option>
        <option value="3:00 AM">3:00 AM</option>
        <option value="3:15 AM">3:15 AM</option>
        <option value="3:30 AM">3:30 AM</option>
        <option value="3:45 AM">3:45 AM</option>
        <option value="4:00 AM">4:00 AM</option>
        <option value="4:15 AM">4:15 AM</option>
        <option value="4:30 AM">4:30 AM</option>
        <option value="4:45 AM">4:45 AM</option>
        <option value="5:00 AM">5:00 AM</option>
        <option value="5:15 AM">5:15 AM</option>
        <option value="5:30 AM">5:30 AM</option>
        <option value="5:45 AM">5:45 AM</option>
        <option value="6:00 AM">6:00 AM</option>
        <option value="6:15 AM">6:15 AM</option>
        <option value="6:30 AM">6:30 AM</option>
        <option value="6:45 AM">6:45 AM</option>
        <option value="7:00 AM">7:00 AM</option>
        <option value="7:15 AM">7:15 AM</option>
        <option value="7:30 AM">7:30 AM</option>
        <option value="7:45 AM">7:45 AM</option>
        <option value="8:00 AM">8:00 AM</option>
        <option value="8:15 AM">8:15 AM</option>
        <option value="8:30 AM">8:30 AM</option>
        <option value="8:45 AM">8:45 AM</option>
        <option value="9:00 AM">9:00 AM</option>
        <option value="9:15 AM">9:15 AM</option>
        <option value="9:30 AM">9:30 AM</option>
        <option value="9:45 AM">9:45 AM</option>
        <option value="10:00 AM">10:00 AM</option>
        <option value="10:15 AM">10:15 AM</option>
        <option value="10:30 AM">10:30 AM</option>
        <option value="10:45 AM">10:45 AM</option>
        <option value="11:00 AM">11:00 AM</option>
        <option value="11:15 AM">11:15 AM</option>
        <option value="11:30 AM">11:30 AM</option>
        <option value="11:45 AM">11:45 AM</option>
        <option value="12:00 PM">12:00 PM</option>
        <option value="12:15 PM">12:15 PM</option>
        <option value="12:30 PM">12:30 PM</option>
        <option value="12:45 PM">12:45 PM</option>
        <option value="1:00 PM">1:00 PM</option>
        <option value="1:15 PM">1:15 PM</option>
        <option value="1:30 PM">1:30 PM</option>
        <option value="1:45 PM">1:45 PM</option>
        <option value="2:00 PM">2:00 PM</option>
        <option value="2:15 PM">2:15 PM</option>
        <option value="2:30 PM">2:30 PM</option>
        <option value="2:45 PM">2:45 PM</option>
        <option value="3:00 PM">3:00 PM</option>
        <option value="3:15 PM">3:15 PM</option>
        <option value="3:30 PM">3:30 PM</option>
        <option value="3:45 PM">3:45 PM</option>
        <option value="4:00 PM">4:00 PM</option>
        <option value="4:15 PM">4:15 PM</option>
        <option value="4:30 PM">4:30 PM</option>
        <option value="4:45 PM">4:45 PM</option>
        <option value="5:00 PM">5:00 PM</option>
        <option value="5:15 PM">5:15 PM</option>
        <option value="5:30 PM">5:30 PM</option>
        <option value="5:45 PM">5:45 PM</option>
        <option value="6:00 PM">6:00 PM</option>
        <option value="6:15 PM">6:15 PM</option>
        <option value="6:30 PM">6:30 PM</option>
        <option value="6:45 PM">6:45 PM</option>
        <option value="7:00 PM">7:00 PM</option>
        <option value="7:15 PM">7:15 PM</option>
        <option value="7:30 PM">7:30 PM</option>
        <option value="7:45 PM">7:45 PM</option>
        <option value="8:00 PM">8:00 PM</option>
        <option value="8:15 PM">8:15 PM</option>
        <option value="8:30 PM">8:30 PM</option>
        <option value="8:45 PM">8:45 PM</option>
        <option value="9:00 PM">9:00 PM</option>
        <option value="9:15 PM">9:15 PM</option>
        <option value="9:30 PM">9:30 PM</option>
        <option value="9:45 PM">9:45 PM</option>
        <option value="10:00 PM">10:00 PM</option>
        <option value="10:15 PM">10:15 PM</option>
        <option value="10:30 PM">10:30 PM</option>
        <option value="10:45 PM">10:45 PM</option>
        <option value="11:00 PM">11:00 PM</option>
        <option value="11:15 PM">11:15 PM</option>
        <option value="11:30 PM">11:30 PM</option>
        <option value="11:45 PM">11:45 PM</option>
        </select></p>
	
	<p>Ending Date:
        <input type="text" id="datepicker1" name="enddate"/>
    </p>
    
	<p>Ending Time:
        <select name="endtime" id="endtime">
        <option value="12:00 AM">12:00 AM</option>
        <option value="12:15 AM">12:15 AM</option>
        <option value="12:30 AM">12:30 AM</option>
        <option value="12:45 AM">12:45 AM</option>
        <option value="1:00 AM">1:00 AM</option>
        <option value="1:15 AM">1:15 AM</option>
        <option value="1:30 AM">1:30 AM</option>
        <option value="1:45 AM">1:45 AM</option>
        <option value="2:00 AM">2:00 AM</option>
        <option value="2:15 AM">2:15 AM</option>
        <option value="2:30 AM">2:30 AM</option>
        <option value="2:45 AM">2:45 AM</option>
        <option value="3:00 AM">3:00 AM</option>
        <option value="3:15 AM">3:15 AM</option>
        <option value="3:30 AM">3:30 AM</option>
        <option value="3:45 AM">3:45 AM</option>
        <option value="4:00 AM">4:00 AM</option>
        <option value="4:15 AM">4:15 AM</option>
        <option value="4:30 AM">4:30 AM</option>
        <option value="4:45 AM">4:45 AM</option>
        <option value="5:00 AM">5:00 AM</option>
        <option value="5:15 AM">5:15 AM</option>
        <option value="5:30 AM">5:30 AM</option>
        <option value="5:45 AM">5:45 AM</option>
        <option value="6:00 AM">6:00 AM</option>
        <option value="6:15 AM">6:15 AM</option>
        <option value="6:30 AM">6:30 AM</option>
        <option value="6:45 AM">6:45 AM</option>
        <option value="7:00 AM">7:00 AM</option>
        <option value="7:15 AM">7:15 AM</option>
        <option value="7:30 AM">7:30 AM</option>
        <option value="7:45 AM">7:45 AM</option>
        <option value="8:00 AM">8:00 AM</option>
        <option value="8:15 AM">8:15 AM</option>
        <option value="8:30 AM">8:30 AM</option>
        <option value="8:45 AM">8:45 AM</option>
        <option value="9:00 AM">9:00 AM</option>
        <option value="9:15 AM">9:15 AM</option>
        <option value="9:30 AM">9:30 AM</option>
        <option value="9:45 AM">9:45 AM</option>
        <option value="10:00 AM">10:00 AM</option>
        <option value="10:15 AM">10:15 AM</option>
        <option value="10:30 AM">10:30 AM</option>
        <option value="10:45 AM">10:45 AM</option>
        <option value="11:00 AM">11:00 AM</option>
        <option value="11:15 AM">11:15 AM</option>
        <option value="11:30 AM">11:30 AM</option>
        <option value="11:45 AM">11:45 AM</option>
        <option value="12:00 PM">12:00 PM</option>
        <option value="12:15 PM">12:15 PM</option>
        <option value="12:30 PM">12:30 PM</option>
        <option value="12:45 PM">12:45 PM</option>
        <option value="1:00 PM">1:00 PM</option>
        <option value="1:15 PM">1:15 PM</option>
        <option value="1:30 PM">1:30 PM</option>
        <option value="1:45 PM">1:45 PM</option>
        <option value="2:00 PM">2:00 PM</option>
        <option value="2:15 PM">2:15 PM</option>
        <option value="2:30 PM">2:30 PM</option>
        <option value="2:45 PM">2:45 PM</option>
        <option value="3:00 PM">3:00 PM</option>
        <option value="3:15 PM">3:15 PM</option>
        <option value="3:30 PM">3:30 PM</option>
        <option value="3:45 PM">3:45 PM</option>
        <option value="4:00 PM">4:00 PM</option>
        <option value="4:15 PM">4:15 PM</option>
        <option value="4:30 PM">4:30 PM</option>
        <option value="4:45 PM">4:45 PM</option>
        <option value="5:00 PM">5:00 PM</option>
        <option value="5:15 PM">5:15 PM</option>
        <option value="5:30 PM">5:30 PM</option>
        <option value="5:45 PM">5:45 PM</option>
        <option value="6:00 PM">6:00 PM</option>
        <option value="6:15 PM">6:15 PM</option>
        <option value="6:30 PM">6:30 PM</option>
        <option value="6:45 PM">6:45 PM</option>
        <option value="7:00 PM">7:00 PM</option>
        <option value="7:15 PM">7:15 PM</option>
        <option value="7:30 PM">7:30 PM</option>
        <option value="7:45 PM">7:45 PM</option>
        <option value="8:00 PM">8:00 PM</option>
        <option value="8:15 PM">8:15 PM</option>
        <option value="8:30 PM">8:30 PM</option>
        <option value="8:45 PM">8:45 PM</option>
        <option value="9:00 PM">9:00 PM</option>
        <option value="9:15 PM">9:15 PM</option>
        <option value="9:30 PM">9:30 PM</option>
        <option value="9:45 PM">9:45 PM</option>
        <option value="10:00 PM">10:00 PM</option>
        <option value="10:15 PM">10:15 PM</option>
        <option value="10:30 PM">10:30 PM</option>
        <option value="10:45 PM">10:45 PM</option>
        <option value="11:00 PM">11:00 PM</option>
        <option value="11:15 PM">11:15 PM</option>
        <option value="11:30 PM">11:30 PM</option>
        <option value="11:45 PM">11:45 PM</option>
        </select></p>
    <p>Slots:
        <select name="slots">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
        </select>
    </p>
    <p>Mic:
        <select name="mic">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
    </p>
    <p>
        <input type="checkbox" name="terms" value="Yes" />I Agree to the terms.</p>
    <p>
        <input type="submit" name="submit" value="Submit" />
		<input type="button" name="Cancel" value="Cancel" onclick="window.location = '/mainmain.php' " />
</form>
  
</body>


</html>

