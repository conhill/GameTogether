 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 <head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <title>Delete a Blog Entry</title>
 </head>
 <body>
 <h1>Delete an Entry</h1>
 <?php 
 
$dbc = mysqli_connect('localhost', 'Dnoop', 'Chill35050', 'gametogether');
// mysql_select_db('gametogether', $dbc);
 
//$query = "SELECT ID FROM requestpost WHERE ID = 'ID'"
$ID = $_GET['id'];
$result = mysqli_query($dbc, "SELECT * FROM requestpost WHERE ID = '$ID'");

$row = mysqli_fetch_array($result);

// Make the form:
 print '<form action="delete_entry.php" method="post">
 <p><h3>' . $row['consol'] . '</h3>' .
 $row['game'] . '<br />' . $row['gamertag'] . '</br>
 </form>';

if (isset($ID)) { // Handle the form.

 $query = mysqli_query($dbc, "DELETE FROM requestpost WHERE ID = '$ID'");
 //$r = mysqli_query($query); // Execute the query.

 // Report on the result:
 if (mysqli_affected_rows($dbc) == 1) {
 print '<p>The blog entry has been deleted.</p>';
 print '<p>Return to mainpage</p>';
 print '<p>Go to <a href="mainmain.php">main page</a></p>';
 } else {
 print '<p style="color: red;">Could not delete the blog entry because:<br />' .
mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
 }

 } else { // No ID received.
 print '<p style="color: red;">This page has been accessed in error.</p>';
 } // End of main IF.

 ?>
 </body>
 </html>