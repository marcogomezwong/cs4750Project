<?php
 include_once("./library.php"); // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 

 $sql = "INSERT INTO Bathrooms (floor, longitude, latitude)
 VALUES
 ('$_POST[floor]','$_POST[longitude]','$_POST[latitude]')";

 if (!mysqli_query($con,$sql))
 {
 	die('Error: ' . mysqli_error($con));
 }

 mysqli_close($con);

 ?>