<?php
 include_once("./library.php"); // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 

 $sql = "INSERT INTO Create_review (bathroom_id, rating, comment)
 VALUES
 ('$_POST[bathroom_id]','$_POST[rating]','$_POST[comment]')";

 if (!mysqli_query($con,$sql))
 {
 	die('Error: ' . mysqli_error($con));
 }

 mysqli_close($con);

 ?>