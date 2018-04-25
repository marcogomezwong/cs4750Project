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
        <a class="hooPoo-logo" href="http://plato.cs.virginia.edu/~wcc4ch/Project/hooPoo.php" id="logo">
        <div class="navbar-brand">HooPoo</div>
        </a>
        </div>
        <div class="collapse navbar-collapse">
           <ul class="nav navbar-nav navbar-right" style="margin-top: 13px">
              <li>
               <?php
                  session_start();
                  $user = $_SESSION['username'];
                  if ($user != "") {
             echo "<a href='http://plato.cs.virginia.edu/~wcc4ch/Project/createBathroom.html'> Submit New Restroom</a>";

            }else{

            }
            ?>
              </li>
              <li>
              <a href="http://plato.cs.virginia.edu/~wcc4ch/Project/aboutus.html"> About HooPoo</a>
              </li>
              <li>
              <?php
                  session_start();
                  $cust_id = $_SESSION['cust_id'];
                  if ($cust_id != -1) {
              echo "<a href='http://plato.cs.virginia.edu/~wcc4ch/Project/serviceList.php'> Service Bathroom</a>";
                }else{
                  
                }

              ?>
              </li>
              <li>
                <?php
                  session_start();
                  $user = $_SESSION['username'];
                  if ($user != "") {

                  echo "<li>";
                  echo '<a href="http://plato.cs.virginia.edu/~wcc4ch/Project/logout.php"> Logout </a>';
                  echo "</li>";
                    
                  echo "<li>";
                  echo "<div class='helloUser'>
                   <p style='padding-right:5px; padding-left:5px;'> Hello, " . $user . "</p>";
                  echo "</div>";
                  echo "</li>";

                } else {

                  echo '<a href="http://plato.cs.virginia.edu/~wcc4ch/Project/login.php"> Login </a>';

                }
                ?>
        
                


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


<h1>Bathrooms</h1>
  <table class="data-table">
    <thead>
      <tr>
        <th>Building</th>
        <th>Floor</th>
        <th>Avg. Rating </th>
        <th>See Reviews List </th>
        <th>Rate Bathroom </th>
        <th>Flag for Service </th>
      </tr>
    </thead>
    <tbody>

<?php


$name_arg = $_GET['search'];

 $sql="SELECT A.*, B.name FROM Bathrooms as A JOIN Building As B ON A.building_id = B.building_id WHERE name like '%$name_arg%';";
 $result = mysqli_query($con,$sql);
 // Print the data from the table row by row
 while($row = mysqli_fetch_array($result)) {
  echo ' <tr>
    <td>' . $row['name'] . ' </td>
    <td>' . $row['floor'] . ' </td>
    <td>' . $row['overall_rating'] . ' </td>
    <td>
             <a href="http://plato.cs.virginia.edu/~wcc4ch/Project/reviewsList.php?bathroom_id=' . $row['Bathroom_id'] . '" class="btn btn-info" role="button">See Reviews</a>
             </td>
    
    <td>
             <a href="http://plato.cs.virginia.edu/~wcc4ch/Project/createRating.php?bathroom_id=' . $row['Bathroom_id'] . '" class="btn btn-info" role="button">Review Bathroom</a>
             </td>
<td>
             <a href="http://plato.cs.virginia.edu/~wcc4ch/Project/flagService.php?bathroom_id=' . $row['Bathroom_id'] . '" class="btn btn-info" role="button">Flag Service</a>
             </td>
    </tr>
    </tr>';
 }
 mysqli_close($con);

 ?>

 </tbody>
 </table>

 <a href="http://plato.cs.virginia.edu/~wcc4ch/Project/hooPoo.php" class="btn btn-info" role="button" style="margin-top: 15px">Back</a>

</div>
</div>
</div>
</div>


 </body>
  </html>
