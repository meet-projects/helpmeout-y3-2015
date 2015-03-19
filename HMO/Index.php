<?php


	if(isset($_POST['submit']) AND session_status() == PHP_SESSION_NONE){

		$FirstName = $_POST['FirstName'];
		$LastName  = $_POST['LastName'];
		$Age       = $_POST['Age'];
		$Username  = $_POST['Username'];
		$Password  = $_POST['Password'];
		$RePassword = $_POST['RePassword'];
		$Email     = $_POST['Email'];

		if($Password != $RePassword){
			echo "<script> alert('Password does not match!')
			window.location.href='index.php';
			</script>";
		}else
		{

			mysql_connect("localhost", "root", "")or die(mysql_error());
			mysql_select_db("HMO")or die(mysql_error());

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
					<form method="POST" action="login.php">
						Username:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password:
						<br><input type="text" name='username'>&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name='password'>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class='login' value="login">
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