 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 <head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <title>Create a Table</title>
 </head>
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
table.tablesorter {
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
}table.tablesorter table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}table.tablesorter tr:last-child td:last-child {
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
}

}table.tablesorter tr:last-child td:first-child{
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
}table.tablesorter tr:hover td{
	
}
table.tablesorter td{
	vertical-align:middle;
	
	
	border:1px solid #000000;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:13px;
	font-size:14px;
	font-family:Helvetica;
	font-weight:normal;
	color:#000000;
}table.tablesorter tr:last-child td{
	border-width:0px 1px 0px 0px;
}table.tablesorter tr td:last-child{
	border-width:0px 0px 1px 0px;
}table.tablesorter tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}

table.tablesorter tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
.scrollit {
    overflow:scroll;
    height:700px;
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="jquery.tablesorter.js"></script> 
 <script type='text/javascript'>
 $(document).ready(function() 
    { 
        $("#myTable").tablesorter( {sortList: [[0,0], [1,0]]} ); 
    } 
);

function doSearch() {
    var searchText = document.getElementById('searchTerm').value;
    var targetTable = document.getElementById('myTable');
    var targetTableColCount;
            
    //Loop through table rows
    for (var rowIndex = 0; rowIndex < targetTable.rows.length; rowIndex++) {
        var rowData = '';

        //Get column count from header row
        if (rowIndex == 0) {
           targetTableColCount = targetTable.rows.item(rowIndex).cells.length;
           continue; //do not execute further code for header row.
        }
                
        //Process data rows. (rowIndex >= 1)
        for (var colIndex = 0; colIndex < targetTableColCount; colIndex++) {
            rowData += targetTable.rows.item(rowIndex).cells.item(colIndex).textContent;
        }

        //If search term is not found in row data
        //then hide the row, else show
        if (rowData.indexOf(searchText) == -1)
            targetTable.rows.item(rowIndex).style.display = 'none';
        else
            targetTable.rows.item(rowIndex).style.display = 'table-row';
    }
}
</script>
 <body>
 <?php
   include('cn.php');
   include_once('header.html');
     include_once('password.php');
	 
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$dbc = mysqli_connect('localhost', 'Dnoop',   $password, 'gametogether');
$result = mysqli_query($dbc, "SELECT * FROM requestpost WHERE consol='PS' OR consol='PS2' OR consol='PS3' OR consol='PS4'");

if(isset($_SESSION['loggedInUser'])){
$userUsername = $_SESSION['loggedInUser'];

//$result = mysql_query($query);
	echo "<div id = 'lognav'>";
	echo "</div>";
echo "<center><img src='sony.jpg' align='middle'></center>";
echo "<input type='text' id='searchTerm' onkeyup='doSearch()' placeholder='Type to search'>";
 echo "<INPUT Type='button' VALUE='Back' onClick='history.go(-1);return true;'>";
echo "<div class='scrollit'>";
echo "<table id='myTable' table border='1' class='table tablesorter'>
<thead> 
    <tr>
			<th  id='Title'>Title</th>
			<th  id='Game'>Game</th>
	        <th  id='Consol'>Consol</th>
	        <th  id='GamerTag'>GamerTag</th>
			<th  id='Username'>UserName</th>
			<th  id='StartDate'>Start Date</th>
			<th  id='StartTime'>Start Time</th>
			<th  id='Slots'>Slots</th>
			<th  id='Mic'>Mic</th>
    </tr>
	</thead> ";
echo "</div>";
echo "<tbody>"; 
while($row = mysqli_fetch_array($result))
  {
  $ID = $row['ID'];
  $title = $row['Title'];
  $UN = $row['Username'];
  $GT = $row['gamertag'];
  
  echo  $row['Username'];
	echo "<tr>";
	echo "<td class='titleRow' style='max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;'>" . "<a href=\"view_entry.php?id={$ID}\">$title</a>" . "</td>";
	echo "<td class='gameRow' style='max-width: 175px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;'>" . $row['game'] . "</td>";
	echo "<td class='consolRow'>" . $row['consol'] . "</td>";
	echo "<td class='gtRow' style='max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;'>" . $GT . "</td>";
	echo "<td class='unRow'>" . "<a href='\profile.php?UN=$UN'>$UN</a>" . "</td>";
	echo "<td class='stDateRow'>" . $row['startdate'] . "</td>";
	echo "<td class='stTimeRow' max-width: 75px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;>" . $row['starttime'] . "</td>";
	echo "<td class='slotRow' max-width: 25x; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;>" . $row['slots'] . "</td>";
	echo "<td class='micRow'>" . $row['mic'] . "</td>";
	echo "</tr>";
  }
 echo "</tbody>";
  echo "</table>";
 ?>
 </body>
 </html>
 <?php } else {?>
 <html>
 <head>
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
table.tablesorter {
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
}table.tablesorter table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}table.tablesorter tr:last-child td:last-child {
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
}

}table.tablesorter tr:last-child td:first-child{
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
}table.tablesorter tr:hover td{
	
}
table.tablesorter td{
	vertical-align:middle;
	
	
	border:1px solid #000000;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:13px;
	font-size:14px;
	font-family:Helvetica;
	font-weight:normal;
	color:#000000;
}table.tablesorter tr:last-child td{
	border-width:0px 1px 0px 0px;
}table.tablesorter tr td:last-child{
	border-width:0px 0px 1px 0px;
}table.tablesorter tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}

table.tablesorter tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
.scrollit {
    overflow:scroll;
    height:700px;
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="jquery.tablesorter.js"></script> 
 <script type='text/javascript'>
 $(document).ready(function() 
    { 
        $("#myTable").tablesorter( {sortList: [[0,0], [1,0]]} ); 
    } 
);
function doSearch() {
    var searchText = document.getElementById('searchTerm').value;
    var targetTable = document.getElementById('myTable');
    var targetTableColCount;
            
    //Loop through table rows
    for (var rowIndex = 0; rowIndex < targetTable.rows.length; rowIndex++) {
        var rowData = '';

        //Get column count from header row
        if (rowIndex == 0) {
           targetTableColCount = targetTable.rows.item(rowIndex).cells.length;
           continue; //do not execute further code for header row.
        }
                
        //Process data rows. (rowIndex >= 1)
        for (var colIndex = 0; colIndex < targetTableColCount; colIndex++) {
            rowData += targetTable.rows.item(rowIndex).cells.item(colIndex).textContent;
        }

        //If search term is not found in row data
        //then hide the row, else show
        if (rowData.indexOf(searchText) == -1)
            targetTable.rows.item(rowIndex).style.display = 'none';
        else
            targetTable.rows.item(rowIndex).style.display = 'table-row';
    }
}
</script>
 <body>
 <?php
   include('cn.php');
   include_once('header.html');
     include_once('password.php');
	 
$dbc = mysqli_connect('localhost', 'Dnoop', $password, 'gametogether');
$result = mysqli_query($dbc, "SELECT * FROM requestpost WHERE consol='PS' OR consol='PS2' OR consol='PS3' OR consol='PS4'");


//$result = mysql_query($query);
	echo "<div id = 'lognav'>";
	echo "</div>";
echo "<center><img src='sony.jpg' align='middle'></center>";
echo "<input type='text' id='searchTerm' onkeyup='doSearch()' placeholder='Type to search'>";
 echo "<INPUT Type='button' VALUE='Back' onClick='history.go(-1);return true;'>";
echo "<div class='scrollit'>";
echo "<table id='myTable' table border='1' class='table tablesorter'>
<thead> 
    <tr>
			<th  id='Title'>Title</th>
			<th  id='Game'>Game</th>
	        <th  id='Consol'>Consol</th>
	        <th  id='GamerTag'>GamerTag</th>
			<th  id='Username'>UserName</th>
			<th  id='StartDate'>Start Date</th>
			<th  id='StartTime'>Start Time</th>
			<th  id='Slots'>Slots</th>
			<th  id='Mic'>Mic</th>
    </tr>
	</thead> ";
echo "</div>";
echo "<tbody>"; 
while($row = mysqli_fetch_array($result))
  {
  $ID = $row['ID'];
  $title = $row['Title'];
  $UN = $row['Username'];
  $GT = $row['gamertag'];
  
  	echo "<tr>";
	echo "<td class='titleRow' style='max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;'>" . "<a href=\"view_entry.php?id={$ID}\">$title</a>" . "</td>";
	echo "<td class='gameRow' style='max-width: 175px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;'>" . $row['game'] . "</td>";
	echo "<td class='consolRow'>" . $row['consol'] . "</td>";
	echo "<td class='gtRow' style='max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;'>" . $GT . "</td>";
	echo "<td class='unRow'>" . "<a href='\profile.php?UN=$UN'>$UN</a>" . "</td>";
	echo "<td class='stDateRow'>" . $row['startdate'] . "</td>";
	echo "<td class='stTimeRow' max-width: 75px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;>" . $row['starttime'] . "</td>";
	echo "<td class='slotRow' max-width: 25x; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;>" . $row['slots'] . "</td>";
	echo "<td class='micRow'>" . $row['mic'] . "</td>";
	echo "</tr>";
  }
 echo "</tbody>";
  echo "</table>";
 ?>
 </body>
 </html>
   <?php } ?>