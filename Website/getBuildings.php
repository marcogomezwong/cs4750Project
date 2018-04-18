<?php
 require_once('./library.php');
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno()) {
 echo("Can't connect to MySQL Server. Error code: " .
mysqli_connect_error());
 return null;
 }
 // Form the SQL query (a SELECT query)
 //$a = mysql_query("SELECT * FROM `table` WHERE `id` = '1'");

 $id = intval($_GET['bathroom_id']);

 $sql="SELECT * FROM Bathrooms WHERE Bathroom_id = $id";
 $result = mysqli_query($con,$sql);
 // Print the data from the table row by row
 while($row = mysqli_fetch_array($result)) {
 echo "Floor: " . $row['floor'];
 echo "<br>";
 echo "Overall Rating: " . $row['overall_rating'];
 echo "<br>";
 echo "Longitude: " . $row['longitude'];
 echo "<br>";
 echo "Latitude: " . $row['latitude'];
 echo "<br>";
 }
 mysqli_close($con);
?>
