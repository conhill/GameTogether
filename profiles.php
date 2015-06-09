<?php
include('cn.php');
session_start();

$userUsername = $_SESSION['loggedInUser'];

$sql = "SELECT * FROM user WHERE
	user_username = '" . $userUsername . "'";
$result = mysql_query($sql, $cn) or
	die(mysql_error($cn));
$row = mysql_fetch_assoc($result);

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
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
h2 {font-size:200%}
</style>
</head>
<body>
<center><img src="profile.jpg" align="middle"></center>
<h2>Profile of <?php echo $userUsername; ?></h2>
<h3><a href="mainmain.php">[Main Page]</a></h3>
<h2>Your Posts:</h2>
<?php 
$UN = $_GET['UN'];
$dbc2 = mysqli_connect('localhost', 'Dnoop', 'Chill35050', 'gametogether');
// mysql_select_db('gametogether', $dbc);
 
//$query = "SELECT ID FROM requestpost WHERE ID = 'ID'"
$result = mysqli_query($dbc2, "SELECT * FROM requestpost WHERE Username = '$UN'");
 echo "<div class='scrollit'>";

?>
</body>
</html>