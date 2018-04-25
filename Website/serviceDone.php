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
$sql="DELETE FROM Reports WHERE Bathroom_id = $id";

if (!mysqli_query($con,$sql))
{
 	die('Error: ' . mysqli_error($con));
 }

$cust = $_SESSION['cust_id'];

$sql2="INSERT INTO Supplies (custodian_id, Bathroom_id) VALUES ($cust, $id)";



if (!mysqli_query($con,$sql2))
{
 	die('Error: ' . mysqli_error($con));
 }

$sql3="UPDATE 'Custodians' SET 'num_services' = 'num_services+1' WHERE 'custodian_id' = $cust";

if (!mysqli_query($con,$sql3))
{
 	die('Error: ' . mysqli_error($con));
 }else
 {
 header('Location: http://plato.cs.virginia.edu/~wcc4ch/Project/serviceList.php');
 }
  mysqli_close($con);
 
 ?>

