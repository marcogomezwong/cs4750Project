<?php
	include_once("./library.php"); // To connect to the database
	$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	if (isset($_POST['username']) and isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM Accounts WHERE username = '$username' and password = '$password';";

		$result = mysqli_query($con, $sql);
		$one = mysqli_num_rows($result);
		if ($one == 1) {
			echo "Logged in as " . $username . "<br>";
		} else {
			echo "log in failed";
		}

	}
	 mysqli_close($con);
?>