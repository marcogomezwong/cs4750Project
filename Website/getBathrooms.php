<?php
header("Content-type: text/xml");
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);


// Start XML file, create parent node

// function parseToXML($htmlStr)
// {
// $xmlStr=str_replace('<','&lt;',$htmlStr);
// $xmlStr=str_replace('>','&gt;',$xmlStr);
// $xmlStr=str_replace('"','&quot;',$xmlStr);
// $xmlStr=str_replace("'",'&#39;',$xmlStr);
// $xmlStr=str_replace("&",'&amp;',$xmlStr);
// return $xmlStr;
// }

//header("Access-Control-Allow-Origin: *");
require_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
if (mysqli_connect_errno()) {
  echo("Cannot connect to MySQL Server Error code: " .
  mysqli_connect_error());
  return null;
}

//SELECT A.*, B.name FROM Bathrooms as A JOIN Building as B ON A.building_id = B.building_id;


$sql = "SELECT A.*, B.name FROM Bathrooms as A JOIN Building as B ON A.building_id = B.building_id";
$result = mysqli_query($con, $sql);

if (!$result) {
  die('Invalid query: ' . mysql_error());
}


//start xml file, echo parent node
ob_clean(); //Clean (erase) the output buffer
echo '<?xml version="1.0"?>';
echo '<markers>';
$ind=0;

while ($row = mysqli_fetch_array($result)){
  // Add to XML document node
  echo '<bathroom ';
  echo 'Bathroom_id="' . $row['Bathroom_id'] . '" ';
  echo 'building_id="' . $row['building_id'] . '" ';
  echo 'building_name="' . $row['name'] . '" ';
  echo 'floor="' . $row['floor'] . '" ';
  echo 'latitude="' . $row['latitude'] . '" ';
  echo 'longitude="' . $row['longitude'] . '" ';
  echo 'overall_rating="' . $row['overall_rating'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}
echo '</markers>';
mysqli_close($con);

?>