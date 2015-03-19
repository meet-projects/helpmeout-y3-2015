<?php

	
	session_start();

	if($_SESSION['username'] == ''){
		echo "<script> window.location.href='index.php'</script>";
	}

	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	require("master.php");
?>

<!--<button onclick="window.location.href='logout.php'" value="Log Out" width="100px" height="100px" />-->
			username: <?php echo $username; ?>

			<div id='delima'>
				<div id='delima2'>
					This is The delima
					<div id='delima_inside'>
						Which shirt should I wear for the party?
					</div>
					<form action='a.html' method='post'>
						<div id='img1'><img src="images/img1.jpg" width='200px'><label for='yellow'></label><input type="radio" name='color' value='yellow'></div>
						<div id='img2'><img src="images/img2.jpg" width='200px'><label for='green'></label><input type="radio" name='color' value='green'></div>
						<br><input id='delima3' type='submit' value='delima solved'>
				    </form>
				</div>
			</div>
			<button onclick="window.location.href='logout.php'" id="button">Log Out</button>
		</div>
	</body>
</html>