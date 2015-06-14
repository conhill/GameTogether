<?php 
  include_once('header.html');
  			  include_once('password.php');
  			  include('cn.php');
			      if (session_status() == PHP_SESSION_NONE) {
			      session_start();
			    } 

			
			   $cn = mysqli_connect('localhost', 'Dnoop', $password, 'loginsetup') or
				die('Unable to connect. Check connection parameters.');



			   
			$dbc = mysqli_connect('localhost', 'Dnoop', $password, 'gametogether');

			$result = mysqli_query($dbc, "SELECT * FROM requestpost
			WHERE consol='Xbox' OR consol='Xbox 360' OR consol='Xbox One'
			ORDER BY indexID DESC");


			if(isset($_SESSION['loggedInUser'])){
			echo '<meta http-equiv="refresh" content=".5;url=mainmain.php">';
		
	}else{
			
  ?>
 <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Login</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<style type="text/css">
	p#passwordlogin {
	  display: inline;
	  padding: 10px 4px 0px 0px;
	}

	div#seconddiv {
	  margin: 10px 0px 0px 15px;
	}

	div#firstdiv {
	  margin: 10px 0px 0px 15px;
	}

	p#usernameLogIn {
	  display: inline;
	}

	input#loginbtn {
	  width: 80px;
	  height: 40px;
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

div#newAcc {
  border: 0px;
  padding: 10px 10px 10px 10px;
  width: 370px;
  background: rgb(221, 221, 221);
  display: inline-block;
}
	input.inputLogIn {
	  background-color: #fff;
	  border: 1px solid #e9e9e9;
	  border-radius: 3px;
	  box-shadow: inset 0 1px 1px rgba(0,0,0,0.3);
	  width: 380px;
	}

	a#reg-btn {
	  color: white;
	}

	  a#notLink {
	  color: black;
	  border: 0px;
	  border-radius: 0px;
	  /* box-shadow: inset 0 1px 1px rgba(0,0,0,0.3); */
	  text-decoration: none;
	  font-size: 16px;
	}

	button#registerBtn {
	  border: 0px;
	  padding: 10px 10px 10px 10px;
	  width: 370px;
	}
	h1#errorTextAlert {
	  color: red;
	  padding-bottom: 15px;
	}
	div#bottomBtns {
	  padding-left: 15px;
	}
	div#logBtn {
	  display: inline-block;
	  border: 0px;
	  padding: 10px 10px 10px 10px;
	  width: 80px;
	  height: 40px;
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
	  text-align: center;
	}
		h1#goodText {
  	color: rgb(0, 136, 204) !important;
	}
	div#newAcc:hover {
	  background: rgb(194, 191, 191);
	}
	a:focus, a:hover {
	  color: #23527c;
	  text-decoration: none;
	}
	div#logBtn:hover {
	  background: rgb(1, 126, 189);
	}
</style>
<script type="text/javascript">
function myFunction() {
		$.ajax({
	        url: '/GT/check_login.php',
	        type: 'POST',
	        dataType: "json",
	        data: {
	            Username: $('#usName').val(),
	            Password1: $('#usPass').val()
	        },
	        success: function(data){
	            console.log(JSON.stringify(data));
	            alert('suc');
	        },
	         error: function(data) {
	            console.log(JSON.stringify(data));
	            document.getElementById('errorAlert').innerHTML = '<h1 id="errorTextAlert">' + data.responseText+ '</h1>';
	            
	        }
	    });
}
</script>
</head>
<body>
<center><img src='login.jpg' align='middle'></center>

		<center><p id="errorAlert"?</p></center>
<center><form method="post">

	<div id="firstDiv">
		<p id="usernameLogIn">Username:</p>
		<input class="inputLogIn" type="text" id="usName" name="userUsername" col="50" />
	</div>
	<div id="secondDiv">
		<p id="passwordLogIn">Password:</p>
		<input class="inputLogIn"type="password" id="usPass" name="userPassword" col="50" />
	</div>
	<br />
	<!-- <input id="loginBtn" type="submit" value="Login" /> -->
	<center><div id="bottomBtns">
		<div id="newAcc" onclick="window.location='register.php';"><a id="notLink" href="register.php">Create New Account</a></div>
		<!-- <a id="registerRedirect" -->
		<div id="logBtn" onclick="myFunction()"><a id="reg-btn" onclick="myFunction()">Log In</a></div>
	</div></center>
	<br /><br />
	
</form>
</center>
</body>
</html>
<?php } ?>

