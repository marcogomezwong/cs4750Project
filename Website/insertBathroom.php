<?php
 include_once("./library.php"); // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
$id = -1;

 $SQL_NAME_TO_ID = "SELECT * Building WHERE name like 'Rice%';";
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
    $SQL_INSERT = "INSERT INTO Building(name, numBathrooms) VALUES ('$_POST[building_name]', 0);";
    if (!mysqli_query($con,$SQL_INSERT))
    {
     die('Error: ' . mysqli_error($con));
    }

    $SQL_get_id = "SELECT * FROM Building WHERE name like '$_POST[building_name]';";
    $result_count = mysqli_query($con, $SQL_get_id);
    while($row_count = mysqli_fetch_array($result_count)) {
        $id = $row_count['building_id'];
    }
 }

 $sql = "INSERT INTO Bathrooms (building_id, overall_rating, rating_count, floor, longitude, latitude)
 VALUES
    ($id, '$_POST[rating]', 1, '$_POST[floor]','$_POST[longitude]','$_POST[latitude]');";

 if (!mysqli_query($con,$sql))
 {
 	die('Error: ' . mysqli_error($con));
 }else{
    $bath = 0;
    $sql = "SELECT * FROM Bathrooms ORDER BY Bathroom_id DESC LIMIT 1";
    $result_b = mysqli_query($con, $sql);
    while($rows = mysqli_fetch_array($result_b)) {
        $bath = $rows['Bathroom_id'];
    }
    $sql_located = "INSERT INTO Located_in (building_id, bathroom_id) VALUES ($id, $bath);";
    if (!mysqli_query($con,$sql_located))
     {
      die('Error: ' . mysqli_error($con));
     }

	  header('Location: http://plato.cs.virginia.edu/~wcc4ch/Project/hooPoo.php');
 }


 mysqli_close($con);

 ?>
