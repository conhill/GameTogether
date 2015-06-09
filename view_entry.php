 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 <head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <title>Game View</title>
 </head>
 <body>
<center><img src='gameview.jpg' align='middle'></center>
 <?php 
 
$dbc = mysqli_connect('localhost', 'Dnoop', 'Chill35050', 'gametogether');
// mysql_select_db('gametogether', $dbc);
 
//$query = "SELECT ID FROM requestpost WHERE ID = 'ID'"
$ID = $_GET['id'];
$result = mysqli_query($dbc, "SELECT * FROM requestpost WHERE ID = '$ID'");

while($row = mysqli_fetch_array($result))
  {
  echo "<strong><big>" . 'Consol: '. "</strong></big>";
  echo $row['consol'];
  echo "<br><strong><big>" . 'Game: '. "</strong></big>";
  echo $row['game'];
  echo "<br><strong><big>" . 'Gamertag: '. "</strong></big>";
  echo $row['gamertag'];
  echo "<br><strong><big>" . 'Details: '. "</strong></big>";
  echo "<blockquote>" . $row['details'] . "</blockquote>";
  echo "<br><strong><big>" . 'Start Date: '. "</strong></big>";
  echo $row['startdate'];
  echo "<br><strong><big>" . 'Start Time: '. "</strong></big>";
  echo $row['starttime'];
  echo "<br><strong><big>" . 'End Date: '. "</strong></big>";
  echo $row['enddate'];
  echo "<br><strong><big>" . 'End Time: '. "</strong></big>";
  echo $row['endtime'];
  echo "<br><strong><big>" . 'Slots: '. "</strong></big>";
  echo $row['slots'];
  echo "<br><strong><big>" . 'Mic: '. "</strong></big>";
  echo $row['mic'];
  }
 echo "</table>";
  echo "<FORM><INPUT Type='button' VALUE='Back' onClick='history.go(-1);return true;'></FORM>";

 //mysql_close($dbc); // Close the connection.

 ?>
 </body>
 </html>