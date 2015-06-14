 <?php 
include_once('header.html');
include_once('password.php');
 ?>
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 <head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <title>Game View</title>
 <style>
 .gameLeft {
  clear: both;
  width: 400px;
  border-top: 1px solid black;
}
big {
  float: left;
}
p#rightGame {
  float: right;
  /* padding-right: 75px; */
}
blockquote {
  padding: 0;
  margin: 0 0 20px;
  font-size: 17.5px;
  border-left: 0px solid #eee;
}
 </style>
 </head>
 <body>
<center><img src='gameview.jpg' align='middle'></center>
 <?php 
 
$dbc = mysqli_connect('localhost', 'Dnoop', $password, 'gametogether');
// mysql_select_db('gametogether', $dbc);
 
//$query = "SELECT ID FROM requestpost WHERE ID = 'ID'"
$ID = $_GET['id'];
$result = mysqli_query($dbc, "SELECT * FROM requestpost WHERE ID = '$ID'");

while($row = mysqli_fetch_array($result))
  {
  echo "<center><div class='gameLeft'><strong class='leftText'><big>" . 'Consol: '. "</strong></big>";
  echo "<p id='rightGame'>" . $row['consol'] . "</p></div>";
  echo "<br><div class='gameLeft'><strong class='leftText'><big>" . 'Game: '. "</strong></big>";
  echo "<p id='rightGame'>" . $row['game'] . "</p></div>";
  echo "<br><div class='gameLeft'><strong class='leftText'><big>" . 'Gamertag: '. "</strong></big>";
  echo "<p id='rightGame'>" . $row['gamertag'] . "</p></div>";
  echo "<br><div class='gameLeft'><strong class='leftText'><big>" . 'Details: '. "</strong></big>";
  echo "<blockquote>" . $row['details'] . "</blockquote>" . "</div>";
  echo "<br><div class='gameLeft'><strong class='leftText'><big>" . 'Start Date: '. "</strong></big>";
  echo "<p id='rightGame'>" . $row['startdate'] . "</p></div>";
  echo "<br><div class='gameLeft'><strong class='leftText'><big>" . 'Start Time: '. "</strong></big>";
  echo "<p id='rightGame'>" . $row['starttime'] . "</p></div>";
  echo "<br><div class='gameLeft'><strong class='leftText'><big>" . 'End Date: '. "</strong></big>";
  echo "<p id='rightGame'>" . $row['enddate'] . "</p></div>";
  echo "<br><div class='gameLeft'><strong class='leftText'><big>" . 'End Time: '. "</strong></big>";
  echo "<p id='rightGame'>" . $row['endtime'] . "</p></div>";
  echo "<br><div class='gameLeft'><strong class='leftText'><big>" . 'Slots: '. "</strong></big>";
  echo "<p id='rightGame'>" . $row['slots'] . "</p></div>";
  echo "<br><div class='gameLeft'><strong class='leftText'><big>" . 'Mic: '. "</strong></big>";
  echo "<p id='rightGame'>" . $row['mic'] .  "</p></div></center>";
  }
 echo "</table>";
  

 //mysql_close($dbc); // Close the connection.

 ?>
 </body>
 </html>