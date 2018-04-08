<?php
 header("Access-Control-Allow-Origin: *");
require_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
if (mysqli_connect_errno()) {
	echo("Cannot connect to MySQL Server Error code: " .
	mysqli_connect_error());
	return null;
}
$sql = "SELECT * FROM Bathrooms";
$result = mysqli_query($con, $sql);

if (!$result) {
  die('Invalid query: ' . mysql_error());
}




//echo "<?xml version='1.0' 
echo '<bathrooms>';
$ind=0;
while($row = mysqli_fetch_array($result)) {
	echo '<bathroom';
	echo $row['Bathroom_id'];
	echo " " . $row['building_id'];
	echo " " . $row['floor'];
	echo " " . $row['longitude'];
	echo " " . $row['latitude'];
	echo '/>';
  $ind = $ind + 1;
}

echo '</bathrooms>';

mysqli_close($con);
?>