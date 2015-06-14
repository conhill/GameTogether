<?php
include('cn.php');
 include('header.html');
 
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(isset($_SESSION['loggedInUser'])){
$userUsername = $_SESSION['loggedInUser'];


if ($userUsername != $_GET['UN']){ //Logged in. Other profile
	?>
<head>
<title><?php echo $_GET['UN']; ?>'s Profile</title>
<style type="text/css">

.scrollit {
    overflow:scroll;
    height:700px;
}
h2 {font-size:200%}

	.centerProfile {
	  width: 300px;
	  text-align: left;
	}
</style>
</head>
<body>
<center><img src="profile.jpg" align="middle"></center>
<center><h2>Profile of <?php echo $_GET['UN']; ?></h2>
<h2>Info:</h2>
<?php 
$UN = $_GET['UN'];
$sql = "SELECT * FROM user WHERE
	user_username = '" . $UN . "'";
$result = mysqli_query($cn, $sql) or
	die(mysqli_error($cn));
$row = mysqli_fetch_assoc($result);

  echo "<div class='centerProfile'><strong><big>" . 'Email: '. "</strong></big>";
  echo $row['user_email'] . "</div>";
  echo "<div class='centerProfile'><br><strong><big>" . 'Country: '. "</strong></big>";
  echo  $row['user_country'] . "</div>";



?>
</center>
</body>
</html>


 <?php } elseif($userUsername == $_GET['UN']){  ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $userUsername; ?>'s Profile</title>
<style type="text/css">
.table {
	margin:0px;padding:0px;
	width:100%;
	box-shadow: 10px 10px 5px #888888;
	border:1px solid #000000;
	
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
	
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
	
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
	
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}.table table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}.table tr:last-child td:last-child {
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
}
.table table tr:first-child td:first-child {
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}
.table table tr:first-child td:last-child {
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
}.table tr:last-child td:first-child{
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
}.table tr:hover td{
	
}
.table tr:nth-child(odd){ background-color:#ffffff; }
.table tr:nth-child(even)    { background-color:#ffffff; }.table td{
	vertical-align:middle;
	
	
	border:1px solid #000000;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:13px;
	font-size:14px;
	font-family:Helvetica;
	font-weight:normal;
	color:#000000;
}.table tr:last-child td{
	border-width:0px 1px 0px 0px;
}.table tr td:last-child{
	border-width:0px 0px 1px 0px;
}.table tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.table tr:first-child td{
		background:-o-linear-gradient(bottom, #5e5751 5%, #5e5751 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #5e5751), color-stop(1, #5e5751) );
	background:-moz-linear-gradient( center top, #5e5751 5%, #5e5751 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#5e5751", endColorstr="#5e5751");	background: -o-linear-gradient(top,#5e5751,5e5751);

	background-color:#5e5751;
	border:0px solid #000000;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:20px;
	font-family:Helvetica;
	font-weight:bold;
	color:#ffffff;
}
.table tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #5e5751 5%, #5e5751 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #5e5751), color-stop(1, #5e5751) );
	background:-moz-linear-gradient( center top, #5e5751 5%, #5e5751 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#5e5751", endColorstr="#5e5751");	background: -o-linear-gradient(top,#5e5751,5e5751);

	background-color:#5e5751;
}
.table tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.table tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
.scrollit {
    overflow:scroll;
    height:700px;
}

h2#infoLine {
  padding-top: 10px;
  border-top: 1px solid black;
}

h2 {font-size:200%}

	.inputRegister {
	  width: 150px;
	  height: 50px;
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
	  margin-left: 15px;
	
	}
.inputRegister:hover {
	background: -webkit-linear-gradient(rgb(0, 136, 204), rgb(1, 111, 166)); /* For Safari 5.1 to 6.0 */
  	background: -o-linear-gradient(rgb(0, 136, 204), rgb(1, 111, 166)); /* For Opera 11.1 to 12.0 */
  	background: -moz-linear-gradient(rgb(0, 136, 204), rgb(1, 111, 166)); /* For Firefox 3.6 to 15 */
  	background: linear-gradient(rgb(0, 136, 204), rgb(1, 111, 166)); /* Standard syntax */
}

	a#notLink {
	  color: white;
	  font-weight: 500;
	  border: 0px;
	  border-radius: 0px;
	  text-decoration: none;
	  font-size: 16px;
	}

	.centerProfile {
	  width: 200px;
	  text-align: left;
	}
</style>
<script type="text/javascript">
function myFunction() {
		$.ajax({
	        url: '/GT/logout.php',
	        type: 'POST',
	        dataType: "json",
	        data: {
	        },
	        success: function(data){
	            console.log(JSON.stringify(data));
	            window.location.replace("mainmain.php")
	        },
	         error: function(data) {
	            console.log(JSON.stringify(data));
	            window.location.replace("mainmain.php")            
	        }
	    });
}
</script>
</head>
<body>
<center><img src="profile.jpg" align="middle"></center>
<center><h2>Welcome <?php echo $userUsername; ?>!!</h2>
<button class="inputRegister" ><a id="notLink" onclick="myFunction()">LOGOUT</a></button>
<center><h2 id="infoLine">Your Info:</h2></center>
<?php 
$userUsername = $_SESSION['loggedInUser'];

$UN = $_GET['UN'];
$sql = "SELECT * FROM user WHERE
	user_username = '" . $UN . "'";
$result = mysqli_query($cn, $sql) or
	die(mysqli_error($cn));
$row = mysqli_fetch_assoc($result);

  echo "<div class='centerProfile'><strong><big>" . 'Email: '. "</strong></big>";
  echo $row['user_email'] . "</div>";
  echo "<div class='centerProfile'><br><strong><big>" . 'Country: '. "</strong></big>";
  echo  $row['user_country'] . "</div>";

echo "<h2 id='infoLine'>Your Posts:</h2>";

include_once('password.php');

$dbc2 = mysqli_connect('localhost', 'Dnoop', $password, 'gametogether');
// mysql_select_db('gametogether', $dbc);
 
//$query = "SELECT ID FROM requestpost WHERE ID = 'ID'"
$result = mysqli_query($dbc2, "SELECT * FROM requestpost WHERE Username = '$UN'");
 echo "<div class='scrollit'>";
echo "<table border='1' class='table'>
    <tr>
		<th width='18%' id='View'>View</th>
		<th width='18%' id='Delete'>Delete</th>
		<th width='18%' id='Edit'>Edit</th>
		<th width='18%' id='Title'>Title</th>
        <th width='18%' id='Date'>Date</th>
        <th width='18%' id='Game'>Game</th>
        <th width='18%' id='Consol'>Consol</th>
    </tr>";
	echo "</div>";
while($row = mysqli_fetch_array($result))
  {
  $ID = $row['ID'];
  
  echo "<tr>";
  echo "<td>" . "<a href=\"view_entry.php?id={$ID}\">View</a>" . "</td>";
  echo "<td>" . "<a href=\"delete_entry.php?id={$ID}\">Delete</a>" . "</td>";
  echo "<td>" . "<a href=\"edit_entry.php?id={$ID}\">Edit</a>" . "</td>";
  echo "<td>" . $row['Title'] . "</td>";
  echo "<td>" . $row['startdate'] . "</td>";
  echo "<td>" . $row['game'] . "</td>";
  echo "<td>" . $row['consol'] . "</td>";
  echo "</tr>";
  }
  }
?>
</center>
</body>
</html>
<?php } else { ?>
<head>
<title><?php echo $_GET['UN']; ?>'s Profile</title>
<style type="text/css">

.scrollit {
    overflow:scroll;
    height:700px;
}
h2 {font-size:200%}

	.centerProfile {
	  width: 300px;
	  text-align: left;
	}
</style>
</head>
<body>
<center><img src="profile.jpg" align="middle"></center>
<center><h2>Profile of <?php echo $_GET['UN']; ?></h2>
<h2>Info:</h2>
<?php 
$UN = $_GET['UN'];
$sql = "SELECT * FROM user WHERE
	user_username = '" . $UN . "'";
$result = mysqli_query($cn, $sql) or
	die(mysqli_error($cn));
$row = mysqli_fetch_assoc($result);


  echo "<div class='centerProfile'><strong><big>" . 'Email: '. "</strong></big>";
  echo $row['user_email'] . "</div>";
  echo "<div class='centerProfile'><br><strong><big>" . 'Country: '. "</strong></big>";
  echo  $row['user_country'] . "</div>";
}  ?>
</center>
</html>

