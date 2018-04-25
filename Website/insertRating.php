<?php
 include_once("./library.php"); // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

$new_rating = $_POST['rating'];
$old_rating = 0;
$count = 0;

 $sql = "INSERT INTO Create_review (bathroom_id, rating, comment)
 VALUES
 ('$_POST[bathroom_id]','$_POST[rating]', '$_POST[comment]')";


 if (!mysqli_query($con,$sql))
 {
 	die('Error: ' . mysqli_error($con));
} 

session_start();
$bgID = $_SESSION['bg_id'];

 //$sql="UPDATE `Bathrooms` SET `service_needed` = '1' WHERE `Bathrooms`.`Bathroom_id` = $id";
$sql2="UPDATE Bathroom_goer SET num_reviews = num_reviews+1 WHERE bathroom_goer_id = $bgID";

if (!mysqli_query($con,$sql2))
 {
 	die('Error: ' . mysqli_error($con));
} else {
	 header('Location: http://plato.cs.virginia.edu/~wcc4ch/Project/hooPoo.php');
}

 mysqli_close($con);

 ?>
