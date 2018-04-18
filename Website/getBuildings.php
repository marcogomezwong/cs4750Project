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

$name_arg = $_GET['search'];

echo "arg " . $name_arg;
echo "<br>";
$id = 0;

$name_arg = "Rice Hall";
 $sql="SELECT * FROM Building WHERE name = $name_arg;";
 $result = mysqli_query($con,$sql);
 // Print the data from the table row by row
 while($row = mysqli_fetch_array($result)) {
   echo "ID: " . $row['building_id'];
   $id = $row['building_id'];
   echo "<br>";
   echo "Name: " . $row['name'];
   echo "<br>";
   echo "num_bathrooms: " . $row['num_bathrooms'];
   echo "<br>";
 }

 $sql2 = "SELECT * FROM Bathrooms WHERE building_id = $id;";
  $result2 = mysqli_query($con,$sql2);
  while ($row2 = mysqli_fetch_array($result2)) {
    echo "ID: " . $row2['Bathroom_id'];
    echo "<br>";
    echo "building_id " . $row2['building_id'];
    echo "<br>";
    echo "floor " . $row2['floor'];
    echo "<br>";
    echo "overall_rating " . $row2['overall_rating'];
    echo "<br>";

  }

 mysqli_close($con);


?>
