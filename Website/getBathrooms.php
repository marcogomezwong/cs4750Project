<?
 header("Access-Control-Allow-Origin: *");
require("./library.php");

// Start XML file, create parent node

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Opens a connection to a MySQL server

$connection=mysqli_connect ($SERVER, $USERNAME, $PASSWORD);
if (!$connection) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database

$db_selected = mysqli_select_db($DATABASE, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table

$query = "SELECT * FROM Bathrooms";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

//header("Content-type: text/xml");

//start xml file, echo parent node

echo "<?xml version='1.0' ?>";
echo '<bathrooms>';
$ind=0;

while ($row = @mysql_fetch_assoc($result)){
  // Add to XML document node
  echo '<bathroom ';
  echo 'Bathroom_id="' . $row['Bathrooom_id'] . '" ';
  echo 'building_id="' . $row['building_id'] . '" ';
  echo 'floor="' . $row['floor'] . '" ';
  echo 'latitude="' . $row['latitude'] . '" ';
  echo 'longitude="' . $row['longitude'] . '" ';
  //echo 'overall_rating="' . $row['overall_rating'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}

echo '</bathrooms>;

?>