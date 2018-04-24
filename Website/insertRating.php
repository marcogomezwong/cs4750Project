<?php
 include_once("./library.php"); // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

$new_rating = $_POST[rating];
$old_rating = 0;
$rating_count = 0;
 $sql = "INSERT INTO Create_review (bathroom_id, rating, comment)
 VALUES
 ('$_POST[bathroom_id]','$_POST[rating]','$_POST[comment]')";

 if (!mysqli_query($con,$sql))
 {
 	die('Error: ' . mysqli_error($con));

 $SQL_select = "SELECT * FROM Bathrooms WHERE Bathroom_id = $_POST[bathroom_id];";
 $result = mysqli_query($con,$SQL_select);
 while($row = mysqli_fetch_array($result)) {
   $old_rating = $row['overall_rating'];
   $count = $row['rating_count'];
}

$update_val = ($old_rating * $rating_count + $new_rating) / ($rating_count + 1);


$sql_update = "UPDATE Bathrooms SET overall_rating = $update_val WHERE Bathroom_id = $_POST[bathroom_id];";
if (!mysqli_query($con,$sql))
{
 die('Error: ' . mysqli_error($con));
}else{
 header('Location: http://plato.cs.virginia.edu/~wcc4ch/Project/hooPoo.html');
}

 mysqli_close($con);

 ?>
