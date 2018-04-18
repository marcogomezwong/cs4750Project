<?php
require_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
if (mysqli_connect_errno()) {
	echo("Cannot connect to MySQL Server Error code: " .
	mysqli_connect_error());
	return null;
}
$sql = "SELECT * FROM Bathrooms;";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result)) {
	echo $row['Bathroom_id'];
	echo " " . $row['building_id'];
	echo " " . $row['floor'];
	echo " " . $row['longitude'];
	echo " " . $row['latitude'];
	echo "<br>";
}
mysqli_close($con);
?>


