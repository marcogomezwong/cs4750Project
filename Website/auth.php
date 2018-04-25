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
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['bg_id'] = 10;
			$_SESSION['cust_id'] = -1;
			

			header('Location: http://plato.cs.virginia.edu/~wcc4ch/Project/hooPoo.php');
		} else {
			header('Location: http://plato.cs.virginia.edu/~wcc4ch/Project/login.php');
		}

	}
	 mysqli_close($con);
?>