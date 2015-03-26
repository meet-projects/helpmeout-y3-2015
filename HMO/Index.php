<?php

	session_start();

	mysql_connect("localhost", "root", "")or die(mysql_error());
	mysql_select_db("HMO")or die(mysql_error());

	if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];

		$sql1 = "SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."' LIMIT 1";

		$result1 = mysql_query( $sql1)or die(mysql_error());

		if(mysql_num_rows($result1) == 1){
			echo "<script>
			window.location.href='home.php';
			</script>";

		}else{
			session_destroy();
			echo"<script>
			window.location.href='index.php';
			</script>";
		}
	}

	if(isset($_POST['submit'])){

		$FirstName = $_POST['FirstName'];
		$LastName  = $_POST['LastName'];
		$Age       = $_POST['Age'];
		$Username  = $_POST['Username'];
		$Password  = $_POST['Password'];
		$RePassword = $_POST['RePassword'];
		$Email     = $_POST['Email'];

		$sql1 = "SELECT * FROM users WHERE Username = '".$Username."' LIMIT 1";

		$result1 = mysql_query( $sql1)or die(mysql_error());

		if(mysql_num_rows($result1) == 1){
			echo "<script>alert('Username already exist!'); window.location.href='index.php';</script>";
		}elseif($Password != $RePassword){
			echo "<script> alert('Password does not match!');
			window.location.href='index.php';
			</script>";
		}else{
			$sql = "INSERT INTO users(`id`, `FirstName`, `LastName`, `Username`, `Password`, `Age`, `Email`) VALUES('', '$FirstName', '$LastName', '$Username', '$Password', '$Age', '$Email')";

			$sql2 = "SELECT * FROM users WHERE `Username` = '$Username'";

			$result2 = mysql_query($sql2)or die(mysql_error());

			$num_rows = mysql_num_rows($result2);

			if ($num_rows > 0) {
				session_start();
				$_SESSION['username'] = $Username; 
				echo "<script>
				window.location.href='home.php';
				</script>";
			}

			echo "<script>alert('Thanks')</script>";
			mysql_query($sql)or die(mysql_error());
		}
	}

	if(isset($_POST['submit2'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql1 = "SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."' LIMIT 1";
	
		$result1 = mysql_query( $sql1)or die(mysql_error());

		if(mysql_num_rows($result1) == 1){
			echo 'logged in<br>';
			
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;

			echo "<script>
			window.location.href='home.php';
			</script>";

		}else{
			echo '<script>alert("Username or Password wrong!")</script>';
		}
	}

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
		<title>
			Help Me Out
		</title>
	</head>
	<body id='imagge'>
		<div id="wrapper">
			<div id="header">
				<h1>H&nbsp;e&nbsp;l&nbsp;p&nbsp;&nbsp; M&nbsp;e&nbsp;&nbsp; O&nbsp;u&nbsp;t</h1>
				<div id="login">
					<form method="POST" action="index.php">
						Username:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password:
						<br><input type="text" name='username' input pattern=".{2,}"   required title="2 characters minimum">&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name='password' input pattern=".{6,}"   required title="6 characters minimum">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit2" class='login' value="login">
					</form>
				</div>
			</div>
			<div id="header2"></div>
			<div id="content">
				<h2>Social platform designed<br>to help you make<br> decisions in the smartest<br>way</h2>
				<div id='register'>
					<form method='POST' action='index.php'>
						FirstName:
						<br>
						<input id='register2' type='text' name='FirstName' input pattern=".{2,}"   required title="2 characters minimum">
						<br>
						LastName:
						<br>
						<input id='register2' type='text' name='LastName' input pattern=".{2,}"   required title="2 characters minimum">
						<br>
						Age:
						<br>
						<input id='register2' type='dropbox' name='Age'>
						<br>
						UserName:
						<br>
						<input id='register2' type='text' name='Username' input pattern=".{2,}"   required title="2 characters minimum">
						<br>
						Password:
						<br>
						<input id='register2' type='password' name='Password' input pattern=".{6,}"   required title="6 characters minimum">
						<br>
						Confirm Password:
						<br>
						<input id='register2' type='password' name='RePassword' input pattern=".{6,}"   required title="6 characters minimum">
						<br>
						Email:
						<br>
						<input type='email' id='register2' name='Email'>
						<br>
						<br>
						<input id='register2' type='submit' name='submit' class='register' value='Register'>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>