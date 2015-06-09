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
  <title>Game Together</title>

  
  
  
  <link rel="stylesheet" type="text/css" href="/css/result-light.css">
  
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
}
.myButton:hover {
	background-color:#4a5757;
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
			<div id = "lognav" style ="text-align:left;">
			<ul id="nav"  >
			<a href="\profile.php?UN=<?php echo $userUsername; ?>">Profile</a></td>&nbsp&nbsp
			<a href="about.php">About</a>&nbsp&nbsp
			<a href="submit.php">Submit</a>&nbsp&nbsp
		</ul>
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
				<input type="submit" value="Nintendo" class = "myButton">
			</form>
        </div>
		
    </body>
</html>
</body>
<?php } else {?>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Game Together</title>
  
  
  
  
  <link rel="stylesheet" type="text/css" href="/css/result-light.css">
  
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
}
.myButton:hover {
	background-color:#4a5757;
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
form { display: inline; }
  </style>
</head>
<body>
    
    <body>
		<div id = "lognav" style ="text-align:left;">
		<ul id="nav">
			<li><a href="about.php">About</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="register.php">Register</a></li>
		</ul>
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
				<input type="submit" value="Nintendo" class = "myButton">
			</form>
        </div>
		
    </body>
</html>
</body>
<?php } ?>

</html>

