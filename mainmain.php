<?php
include('cn.php');
include('header.html');
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(isset($_SESSION['loggedInUser'])){
	$userUsername = $_SESSION['loggedInUser'];

	$sql = "SELECT * FROM user WHERE user_username = '" . $userUsername . "'";
	$result = mysqli_query($cn, $sql) or
		die(mysqli_error($cn));
	$row = mysqli_fetch_assoc($result);


// convert user join date time from linux to readable format
//$userJoinDate = date("F jS, Y", $userJoinDateLinux);
?>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
  <title>Game Together</title>

  
  <style type='text/css'>
 a:link {color:#0000FF;
 font-weight: bold; 
 text-decoration:none;}    /* unvisited link */
a:visited {color:#9F81F7;
 font-weight: bold; 
 text-decoration:none;} /* visited link */
a:hover {color:#5858FA;
 font-weight: bold; 
 text-decoration:none;}   /* mouse over link */
a:active {color:#0000FF;
 font-weight: bold; 
 text-decoration:none;}  /* selected link */
.myButton {
	-moz-box-shadow:inset 0px 2px 6px rgba(0,0,0,0.3);
	-webkit-box-shadow:inset 0px 2px 6px rgba(0,0,0,0.3);
	box-shadow:inset 0px 2px 6px rgba(0,0,0,0.3);
	background-color: #033649;
	background-image: -webkit-linear-gradient(top, #033649, #031634);
	-moz-border-radius: 0 2px 2px 0;
	-webkit-border-radius:0 2px 2px 0;
	border-radius:0 2px 2px 0;;
	border:0;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial Bold;
	font-size:28px;
	font-weight:bold;
	padding:32px 76px;
	text-decoration:none;
	text-shadow:0px -1px 0px #2b665e;
	font-family: 'Quicksand', sans-serif;
}
.myButton:hover {
	background: #031634;
	font-family: 'Quicksand', sans-serif;
}
.myButton:active {
	position:relative;
	top:1px;
}
.absolute
{
position:fixed;
top:30px;
right:35px;
}
input#NintendoBtn {
  background-image: url(Nintendo.png);
  background-repeat: no-repeat;
  background-size: 260px 80px;
  background-position: 0px 10px;
  width: 260px;
}
input#MicrosftBtn {
  background-image: url(MicrosoftBtn.png);
  background-repeat: no-repeat;
  background-size: 260px 80px;
  background-position: 0px 10px;
  width: 260px;
}
input#SonyBtn {
  background-image: url(RenderLogoSony.png);
  background-repeat: no-repeat;
  background-size: 260px 80px;
  background-position: 0px 10px;
  width: 260px;
}
form { display: inline; }
  </style>
  


<script type='text/javascript'>//<![CDATA[ 
window.onload=function(){

}//]]>  

</script>


</head>
<body>
  <html>
    <body>
		</ul>
		</div>
		<center><img src="newest.jpg" align="middle"></center>
        <div id="buttonsDiv" style="text-align:center;  bottom:20px;">
			<form action="sony_list.php">
				<input type="submit"  value="Sony" class = "myButton">
			</form>
			<form action="microsoft_list.php">
				<input type="submit"  value="Microsoft" class = "myButton">
			</form>
			<form action="PC_list.php">
				<input type="submit" value="PC" class = "myButton">
			</form>
			<form action="nintendo_list.php">
				<input type="submit" value="Nintendo"  class = "myButton">
			</form>
        </div>
		
    </body>
</html>
</body>
<?php } else {?>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
  <title>Game Together</title>
  
   
  <style type='text/css'>
   a:link {color:#0000FF;
 font-weight: bold; 
 text-decoration:none;}    /* unvisited link */
a:visited {color:#9F81F7;
 font-weight: bold; 
 text-decoration:none;} /* visited link */
a:hover {color:#5858FA;
 font-weight: bold; 
 text-decoration:none;}   /* mouse over link */
a:active {color:#0000FF;
 font-weight: bold; 
 text-decoration:none;}  /* selected link */
.myButton {
	-moz-box-shadow:inset 0px 1px 3px 0px #91b8b3;
	-webkit-box-shadow:inset 0px 1px 3px 0px #91b8b3;
	box-shadow:inset 0px 1px 3px 0px #91b8b3;
	background-color:#3b403f;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
	border:1px solid #566963;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial Bold;
	font-size:28px;
	font-weight:bold;
	padding:32px 76px;
	text-decoration:none;
	text-shadow:0px -1px 0px #2b665e;
	font-family: 'Quicksand', sans-serif;
}
.myButton:hover {
	background-color:#4a5757;
	font-family: 'Quicksand', sans-serif;
}
.myButton:active {
	position:relative;
	top:1px;
}
.absolute
{
position:fixed;
top:30px;
right:35px;
}
input#NintendoBtn {
  background-image: url(Nintendo.png);
  background-repeat: no-repeat;
  background-size: 260px 80px;
  background-position: 0px 10px;
}
form { display: inline; }
  </style>
</head>
<body>
    
    <body>
		<div id = "lognav" style ="text-align:left;">

		</div>
		<center><img src="newest.jpg" align="middle"></center>
        <div id="buttonsDiv" style="text-align:center;  bottom:20px;">
			<form action="sony_list.php">
				<input type="submit" value="Sony" class = "myButton">
			</form>
			<form action="microsoft_list.php">
				<input type="submit" value="Microsoft" class = "myButton">
			</form>
			<form action="PC_list.php">
				<input type="submit" value="PC" class = "myButton">
			</form>
			<form action="nintendo_list.php">
				<input type="submit"  id="NintedoBtn" class = "myButton">
			</form>
        </div>
		
    </body>
</html>
</body>
<?php } ?>

</html>

