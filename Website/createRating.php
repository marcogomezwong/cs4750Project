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
             echo "<a href='http://plato.cs.virginia.edu/~wcc4ch/Project/createBathroom.php'> Submit New Restroom</a>";

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

 <script>

  var bathroom_id = sessionStorage.getItem('bathroom_id');
  sessionStorage.clear()

  </script>

<?php
$id = intval($_GET['bathroom_id']);
?>



<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="new-bathroom-form-container">
  <h1 style="text-align:center;" > Rate Bathroom </h1>

<!--
<p><script type="text/javascript">document.write(bathroom_id)</script></p>
-->






<form class="new-bathroom-form simple_form form-verticle" action="insertRating.php" method="post">

<input type="hidden" name="bathroom_id" id="id" value="<?php echo $id;?>">

<div class="form-group slidecontainer">
<label>
Rating: (0-5) 
</label>
<input class="form-control" type="range" name="rating" min="0" max="5" class="" id="myRange" list="tickmarks">
<datalist id="tickmarks">
  <option value="0" label="0">
  <option value="1" label="1">
  <option value="2" label="2">
  <option value="3" label="3">
  <option value="4" label="4">
  <option value="5" label="5">
  </datalist>
  <p> Value: <span id="rating"></span></p>
</div>

<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("rating");
output.innerHTML = slider.value;
slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>


<div class="form-group text optional">
<label>
Comment
</label>
<textarea class="text optional form-control span6" placeholder="(e.g. : Very crowded...only two stalls)" name="comment" id="restroom_comment"></textarea>
</div>



<input type="Submit" class="linkbutton">

</form> 


<script>
 // document.getElementById('id').value = bathroom_id;
</script>

</div>
</div>
</div>
</div>


</div>
  


</body>

 </html>