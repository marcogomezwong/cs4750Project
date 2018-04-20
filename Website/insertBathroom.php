<?php
 include_once("./library.php"); // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
$id = -1;
 $SQL_NAME_TO_ID = "SELECT * Building WHERE name like 'Rice%;'";
 $result = mysqli_query($con, $SQL_NAME_TO_ID);
 // Print the data from the table row by row
 while($row = mysqli_fetch_array($result)) {
   if (!mysqli_query($con,$SQL_NAME_TO_ID)) {
     $id = -1;
   } else {
      $id = $result['building_id'];
   }

 }
 if ($id == -1) {
    $SQL_INSERT = "INSERT INTO Building(name, numBathrooms) VALUES ('$POST[building_name]', 1);";
    if (!mysqli_query($con,$SQL_INSERT))
    {
     die('Error: ' . mysqli_error($con));
    }

    $SQL_count = "SELECT count(*) as cnt FROM Building;";
    $result_count = mysqli_query($con, $SQL_count);
    while($row_count = mysqli_fetch_array($result_count)) {
        $id = $result_count['cnt'];
    }
 }

 $sql = "INSERT INTO Bathrooms (building_id, overall_rating, rating_count, floor, longitude, latitude)
 VALUES
 ($name, '$_POST[rating]', 1, '$_POST[floor]','$_POST[longitude]','$_POST[latitude]');";

 if (!mysqli_query($con,$sql))
 {
 	die('Error: ' . mysqli_error($con));
 }else{
	header('Location: http://plato.cs.virginia.edu/~wcc4ch/Project/hooPoo.html');
 }


 mysqli_close($con);

 ?>
