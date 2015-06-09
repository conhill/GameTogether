 <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Login</title>
</head>
<body>
<center><img src='login.jpg' align='middle'></center>
<form action="check_login.php" method="post">
	<p>Username:</p>
	<input type="text" name="userUsername" col="50" />
	<p>Password:</p>
	<input type="password" name="userPassword" col="50" />
	<br />
	<input type="submit" value="Login" />
		<INPUT Type='button' VALUE='Back' onClick='history.go(-1);return true;'>
	<br /><br />
	<a href="register.php">Register</a>
</form>
</body>
</html>