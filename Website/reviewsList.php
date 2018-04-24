<!DOCTYPE html>
  <html>
  <head>
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">


    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  </head>

  <body>

   <div class="container">
    <div class="row min-headroom">
      <div class="col-xs-12">
      <nav class="nav navbar-default rateForm" roll="navigation">
        <div class="navbar-header">
        <a class="hooPoo-logo" href="http://plato.cs.virginia.edu/~wcc4ch/Project/hooPoo.html" id="logo">
        <div class="navbar-brand">HooPoo</div>
        </a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
             <li>
              <a href="http://plato.cs.virginia.edu/~wcc4ch/Project/createBathroom.html"> Submit New Restroom</a>
              </li>
              <li>
              <a href="http://plato.cs.virginia.edu/~wcc4ch/Project/aboutus.html"> About HooPoo</a>
              </li>
          </ul>

        </div>

      </nav>
      </div>
      </div>
    </div>




    <!-- get reviews for a certain bathroom w/php -->

    <script>
    var bathroom_id =  sessionStorage.getItem('bathroom_id');
    sessionStorage.clear();
    </script>


<?php
 require_once('./library.php');
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno()) {
 echo("Can't connect to MySQL Server. Error code: " .
mysqli_connect_error());
 return null;
 }
 // Form the SQL query (a SELECT query)
 //$a = mysql_query("SELECT * FROM `table` WHERE `id` = '1'");


?>

<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="new-bathroom-form-container">

<h1>Reviews</h1>
  <table class="data-table">
    <thead>
      <tr>
        <th>Rating</th>
        <th>Comment</th>
      </tr>
    </thead>
    <tbody>

<?php


 $id = intval($_GET['bathroom_id']);

 $sql="SELECT * FROM Create_review WHERE Bathroom_id = $id";
 $result = mysqli_query($con,$sql);
 // Print the data from the table row by row
 while($row = mysqli_fetch_array($result)) {
  echo ' <tr>
    <td>' . $row['rating'] . ' </td>
   <td>' . $row['comment'] . ' </td>
   </tr>';
 }
 mysqli_close($con);

 ?>

 </tbody>
 </table>

<a href="http://plato.cs.virginia.edu/~wcc4ch/Project/hooPoo.html" class="btn btn-info" role="button" style="margin-top: 15px">Back</a>
</div>
</div>
</div>
</div>


 </body>
  </html>