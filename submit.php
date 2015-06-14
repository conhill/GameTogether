<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Submit - GameTogether</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <style>
  p.leftSubmit {
      float: left;
    }
    input[type="text"] {
      float: right;
      width: 380px;
    }
.submitSectopm {
  clear: both;
  width: 504px;
}

    select.subSelect {
      width: 380px;
      float: right;
    }
    h1#errorAlertText {
      padding-left: 15px;
      text-align:center;
      font-size: 24px;
      color: red;
    }
    input#inputSubmit {
      background-color: #fff;
      border: 1px solid #e9e9e9;
      border-radius: 3px;
      box-shadow: inset 0 1px 1px rgba(0,0,0,0.3);
    }
    select.subSelect {
      background-color: #fff;
      border: 1px solid #e9e9e9;
      border-radius: 3px;
      box-shadow: inset 0 1px 1px rgba(0,0,0,0.3);
      height: 22px;
    }
    textarea#inputSubmit {
      background-color: #fff;
      border: 1px solid #e9e9e9;
      border-radius: 3px;
      box-shadow: inset 0 1px 1px rgba(0,0,0,0.3);
      margin-bottom: 10px;
      width: 380px;
      float: right;
    }

    input#inputDateSubmit {
      background-color: #fff;
      border: 1px solid #e9e9e9;
      border-radius: 3px;
      box-shadow: inset 0 1px 1px rgba(0,0,0,0.3);
      width: 380px;
      height: 22px;
      float:right;
    }
    input#submitForm {
      display: inline-block;
      border: 0px;
      padding: 10px 10px 10px 10px;
      width: 250px;
      height: 40px;
      border-radius: 0px;
      border: 0px;
      border-image-source: initial;
      border-image-slice: initial;
      border-image-width: initial;
      border-image-outset: initial;
      border-image-repeat: initial;
      color: white;
      font-size: 16px;
      background: rgb(0, 136, 204);
      text-align: center;
    }
    input#cancleForm {
      border: 0px;
      padding: 10px 10px 10px 10px;
      width: 250px;
      background: rgb(221, 221, 221);
      display: inline-block;
    }
  </style>
  <script>
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("startdate")[0].setAttribute('min', today);
    document.getElementsByName("enddate")[0].setAttribute('min', today);
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

/////////////////////////////////

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$dbc = @mysql_connect('localhost', 'Dnoop', $password);
	mysql_select_db('gametogether', $dbc);
	echo '<center><img src="submit.jpg" align="middle"></center>';
	$okay = TRUE;
	
	if(empty($_POST['game'])) {
		print '<h1 id="errorAlertText">Please enter a game address.</h1>';
		$okay = FALSE;
	} else {
	$game = mysql_real_escape_string(trim(strip_tags($_POST['game'])), $dbc);
	}
		
	if(empty($_POST['gamertag'])) {
		print '<h1 id="errorAlertText">Please enter your gamertag.</h1>';
		$okay = FALSE;
	} else {
	$gamertag = mysql_real_escape_string(trim(strip_tags($_POST['gamertag'])), $dbc);
	}
	
	if(empty($_POST['title'])) {
		print '<h1 id="errorAlertText">Please enter a title.</h1>';
		$okay = FALSE;
	} else {
	$title = mysql_real_escape_string(trim(strip_tags($_POST['title'])), $dbc);
	}
	
	if(empty($_POST['consol'])) {
		print '<h1 id="errorAlertText">Please select a consol.</h1>';
		$okay = FALSE;
	}
	
	if(empty($_POST['details'])) {
		print '<h1 id="errorAlertText">Please enter some details.</h1>';
		$okay = FALSE;
	} else {
	$details = mysql_real_escape_string(trim(strip_tags($_POST['details'])), $dbc);
	}
	
	if(empty($_POST['startdate'])) {
		print '<h1 id="errorAlertText">Please select a start date.</h1>';
		$okay = FALSE;
	} else {
	$startdate = mysql_real_escape_string(trim(strip_tags($_POST['startdate'])), $dbc);
	}
	
	if(empty($_POST['starttime'])) {
		print '<h1 id="errorAlertText">Please select a start time.</h1>';
		$okay = FALSE;
	} 
	
	if(empty($_POST['enddate'])) {
		print '<h1 id="errorAlertText">Please select a end date.</h1>';
		$okay = FALSE;
	} 
	
	if(empty($_POST['endtime'])) {
		print '<h1 id="errorAlertText">Please select a end time.</h1>';
		$okay = FALSE;
	} 
	
	if(empty($_POST['slots'])) {
		print '<h1 id="errorAlertText">Please select a number of slots.</h1>';
		$okay = FALSE;
	} 
	
	if(empty($_POST['mic'])) {
		print '<h1 id="errorAlertText">Please select if they need a mic.</h1>';
		$okay = FALSE;
	} 
	
	if(empty($_POST['terms'])) {
		print '<h1 id="errorAlertText">Please agree to terms.</h1>';
		$okay = FALSE;
	} 
	
	if($_POST['startdate'] > $_POST['enddate']) {
		print '<h1 id="errorAlertText">Your start date must be before your end date.</h1>';
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
				print '<h1 id="errorAlertText">Your start time must be before your end time.</h1>';
				$okay = FALSE;
			}
		}
	} 
    if(($_POST['startdate'] < date("Y-m-d")) == 1){
        print '<h1 id="errorAlertText">Your start time cannot be before today.</h1>';
        $okay = FALSE;
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
<center><img src='submit.jpg'></center>
<center><form action="submit.php" method="post">
    <div class="submitSectopm"><p class="leftSubmit">Title:</p>    
        <input type="text" id="inputSubmit" name="title" size="20" maxlength="30"/></div>
    <div class="submitSectopm"><p class="leftSubmit">Console:</p>
		<select class="subSelect" name="consol">
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
        </select></div>
    <div class="submitSectopm"><p class="leftSubmit">Game:</p>    
        <input type="text" id="inputSubmit" name="game" size="20" maxlength="20"/></div>
    
	<div class="submitSectopm"><p class="leftSubmit">Gamertag:</p>    
        <input type="text" id="inputSubmit" name="gamertag" size="20" maxlength="20"/></div>
    
    <div class="submitSectopm"><p class="leftSubmit">Details:</p>
        <textarea name="details" id="inputSubmit" type="text" rows="9" cols="30" maxlength="500" placeholder='Fill with any other requirements (Age, Skill, etc...)'></textarea></div>
    
    <div class="submitSectopm"><p class="leftSubmit">Starting Date:</p>
        <input id="inputDateSubmit" name="startdate" type="date"></div>
    
   <div class="submitSectopm"> <p class="leftSubmit">Starting Time:</p>
        <select class="subSelect"name="starttime" id="starttime">
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
        </select></div>
	
	<div class="submitSectopm"><p class="leftSubmit">Ending Date:</p>
        <input id="inputDateSubmit" name="enddate" min='2015-6-11' type="date"></div>
        
	<div class="submitSectopm"><p class="leftSubmit">Ending Time:</p>
        <select class="subSelect" name="endtime" id="endtime">
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
        </select></p></div>
    <div class="submitSectopm"><p class="leftSubmit">Slots:</p>
        <select class="subSelect" name="slots">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
        </select></div>

    <div class="submitSectopm"><p class="leftSubmit">Mic:</p>
        <select class="subSelect" name="mic">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select></div>
   
    <div class="submitSectopm"><p class="leftSubmit"></p>
        <input type="checkbox" name="terms" value="Yes" />I Agree to the terms.</p></div>
    <div class="submitSectopm"><p class="leftSubmit"></p>
        <input id='submitForm' type="submit" name="submit" value="Submit" />
		<input id='cancleForm' type="button" name="Cancel" value="Cancel" onclick="window.location = '/mainmain.php' " /></div>
</form></center>
  
</body>


</html>
<?php } else {
echo '<meta http-equiv="refresh" content="1;url=mainmain.php">';
}
?>
