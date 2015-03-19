<?php

	$username = $_POST['username'];
	$password = $_POST['password'];

	mysql_connect('localhost', 'root', '')or die(mysql_error());
	mysql_select_db('HMO')or die(mysql_error());

	echo $username.'<br>'.$password.'<br>';

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
		echo 'username or password wrong. bitch!<br>';
	}

?>