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
 <h1>Edit an Entry</h1>
 <?php // Script 12.9 - edit_entry.php
 /* This script edits a blog entry using an UPDATE query. */

 // Connect and select:
$dbc = mysqli_connect('localhost', 'Dnoop', 'Chill35050', 'gametogether');
// mysql_select_db('gametogether', $dbc);
 
//$query = "SELECT ID FROM requestpost WHERE ID = 'ID'"
$ID = $_GET['id'];
$result = mysqli_query($dbc, "SELECT * FROM requestpost WHERE ID = '$ID'");

$row = mysqli_fetch_array($result);


if (isset($_GET['id'])) { // Display the entry in a form:

 // Define the query.
	//$query = mysqli_query($dbc, "SELECT * FROM requestpost WHERE ID ='$ID'");
 //if ($result = mysqli_query($query, $dbc)) // Run the query.
		$title = $row['Title'];
		//$row = mysql_fetch_array($result); // Retrieve the information.
		// Make the form:
		print '<form action="commit_edit.php" method="post">
		<p>Title: <input type="text" name="title" size="20" maxlength="20" value="' . htmlentities($title) . '"/></p>
		<p>Game: <input type="text" name="game" size="20" maxsize="20" value="' . htmlentities($row['game']) . '" /></p>
		<p>Gamertag: <input type="text" name="gamertag" size="20" maxsize="20" value="' . htmlentities($row['gamertag']) . '" /></p>
		<p>Details: <textarea type = "text" rows="9" name="details" cols="30" maxlength="500">' . htmlentities($row['details']) . '</textarea></p>
		<p>Console:<select name="consol">
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
		<p>Starting Date: <input type="text" id="datepicker" name="startdate"/ value = "'. htmlentities($row['startdate']) . '"/></p></p>
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
        <input type="text" id="datepicker1" name="enddate" value = "'. htmlentities($row['enddate']) . '"/></p></p>
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
	<input type="hidden" name="id" value="' . $ID . '" />
		<input type="submit" name="submit" value="Update this Entry!" />
		</form>';


 } 

 ?>
 </body>
 </html>