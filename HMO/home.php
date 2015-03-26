<?php

	
	session_start();

	if($_SESSION['username'] == ''){
		echo "<script> window.location.href='index.php'</script>";
	}

	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	require("master.php");
?>
			username: <?php echo $username; ?>

			<button onclick="window.location.href='logout.php'" id="button">Log Out</button>
		</div>
	</body>
</html>