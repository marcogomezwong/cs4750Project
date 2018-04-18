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

 $name_arg = intval($_GET['search']);

echo "arg " . name_arg;
echo "<br>";

$name_arg = "Rice Hall";
 $sql="SELECT * FROM Building WHERE name = $name_arg";
 $result = mysqli_query($con,$sql);
 // Print the data from the table row by row
 while($row = mysqli_fetch_array($result)) {
 echo "ID: " . $row['building_id'];
 echo "<br>";
 echo "Name: " . $row['name'];
 echo "<br>";
 echo "num_bathrooms: " . $row['num_bathrooms'];
 echo "<br>";
 }
 mysqli_close($con);
?>
