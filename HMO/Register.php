<?php

	$FirstName = $_POST['FirstName'];
	$LastName  = $_POST['LastName'];
	$Username  = $_POST['Username'];
	$Password  = $_POST['Password'];
	$Age       = $_POST['Age'];
	$Email     = $_POST['Email'];

	mysql_connect("localhost", "root", "")or die(mysql_error());
	mysql_select_db("HMO")or die(mysql_error());

	$sql = "INSERT INTO users(`id`, `FirstName`, `LastName`, `Username`, `Password`, `Age`, `Email`) VALUES('', '$FirstName', '$LastName', '$Username', '$Password', '$Age', '$Email')";

	$sql2 = "SELECT * FROM users WHERE `Username` = '$Username'";

	$result2 = mysql_query($sql2)or die(mysql_error());

	$num_rows = mysql_num_rows($result2);

	if ($num_rows > 0) {
		echo "exist";
		echo "<script>
		window.location.href='index.php';
		</script>";
	}

	echo "doesn't exist";
	mysql_query($sql)or die(mysql_error());

?>