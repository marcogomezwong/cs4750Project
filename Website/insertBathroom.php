<?php
 include_once("./library.php"); // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

 $SQL_NAME_TO_ID = "SELECT * Building WHERE  name like 'Rice%;'"
 if (!mysqli_query($con,$sql))
 {
  die('Error: ' . mysqli_error($con));
 }
 echo $SQL_NAME_TO_ID;

 $sql = "INSERT INTO Bathrooms (overall_rating, rating_count, floor, longitude, latitude)
 VALUES
 ('$_POST[rating]', 1, '$_POST[floor]','$_POST[longitude]','$_POST[latitude]');";

 if (!mysqli_query($con,$sql))
 {
 	die('Error: ' . mysqli_error($con));
 }

 mysqli_close($con);

 ?>
