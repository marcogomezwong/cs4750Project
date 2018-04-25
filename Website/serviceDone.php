<?php
 require_once('./library.php');
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno()) {
 echo("Can't connect to MySQL Server. Error code: " .
mysqli_connect_error());
 return null;
 }
 
session_start();

 $id = intval($_GET['bathroom_id']);

 //$sql="UPDATE `Bathrooms` SET `service_needed` = '0' WHERE `Bathrooms`.`Bathroom_id` = $id";
$sql="DELETE FROM Reports WHERE 'Bathroom_id' = $id";
$sql="INSERT INTO Supplies (custodian_id, Bathroom_id) VALUES ($_SESSION['cust_id'], $id)";


if (!mysqli_query($con,$sql))
{
 	die('Error: ' . mysqli_error($con));
 }else
 {
 	header('Location: http://plato.cs.virginia.edu/~wcc4ch/Project/serviceList.php');
 }
  mysqli_close($con);
 ?>