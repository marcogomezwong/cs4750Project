<?php
	include_once("./library.php"); // To connect to the database
	$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	if (isset($_POST['username']) and isset($_POST['password']) and isset($_POST['password_2']) and $_POST['password'] == $_POST['password_2']) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM Accounts WHERE username = '$username'";

		$result = mysqli_query($con, $sql);
		$one = mysqli_num_rows($result);
		if ($one == 0) {
			$sql_insert = "INSERT INTO Accounts(username, password) VALUES ($_POST['username'], $_POST['password']);";
			echo "account created <br>";
		} else {
			echo "account already exists";
		}

	}
?>