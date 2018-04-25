

<!DOCTYPE html>
  <html>
  <head>
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!-- search form -->
<style>
input[type=text] {
    width: 100%;
    height: 80px;
    box-sizing: border-box;
    border: 4px solid rgba(0,0,0,0.6);
    border-radius: 4px;
    font-size: 21px;
    background-color: white;
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
</style>





  </head>





  <body class="home-page-background">

  <! navbar >

    <div class="container">
    <div class="row min-headroom">
      <div class="col-xs-12">
      <nav class="nav navbar-default" roll="navigation">
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
              <a href="http://plato.cs.virginia.edu/~wcc4ch/Project/serviceList.php"> Service Bathroom</a>
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

    <div class="container">
      <div class="home-content">


        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
              <div class="home-title-contatiner centered-text">
                  <h3 class="headroom">
                    Find a proven restroom near you with...
                    </h3>
                    <h1 class="centered-text">
                    HooPoo
                    </h1>
              </div>
            </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-8 col-sm-offset-2 more-headroom">

          <form action="http://plato.cs.virginia.edu/~wcc4ch/Project/getBuildings.php" method="get">
          <input type="text" name="search" placeholder="Search restrooms by building...">
          </form>

          </div>
          </div>

        <div class="row more-headroom">
            <div >
              <div id="map" class="home-map"></div>
                  <script>

                 var customLabel = {
                    restaurant: {
                      label: 'R'
                    },
                    bar: {
                      label: 'B'
                    }
                  };

                  function myMap() {

                      var mapOptions = {
                          center: new google.maps.LatLng(38.0344642, -78.5125328),
                          zoom: 15,
                          mapTypeId: google.maps.MapTypeId.ROADMAP
                      }
                  var map = new google.maps.Map(document.getElementById("map"), mapOptions);



                 // var infoWindow = new google.maps.InfoWindow;

                  downloadUrl('http://plato.cs.virginia.edu/~wcc4ch/Project/getBathrooms.php', function(data) {
                  var xml = data.responseXML;
                  var markers = xml.documentElement.getElementsByTagName("bathroom");
                  Array.prototype.forEach.call(markers, function(markerElem) {
                  var id = markerElem.getAttribute('Bathroom_id');
                  var name = markerElem.getAttribute('building_id');
                  var building = markerElem.getAttribute('building_name');
                  var rating = markerElem.getAttribute('overall_rating');
                  var type = markerElem.getAttribute('floor');
                  var point = new google.maps.LatLng(
                      parseFloat(markerElem.getAttribute('latitude')),
                      parseFloat(markerElem.getAttribute('longitude')));

                 

                  //var infowincontent = document.createElement('div');
                  //var strong = document.createElement('strong');
                  //var review_link = '<a href="http://plato.cs.virginia.edu/~wcc4ch/Project/bathroomReviews.php?varname' + id + '=<?php echo $var_value ?>">Page2</a>'
                  //strong.textContent = "Bathroom: " + name
                  //infowincontent.appendChild(strong);
                  //infowincontent.appendChild(document.createElement('br'));

                 var contentString = '<div id="content">'+
                   '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading" style="font-size: 22px;"> ' + building + ', Floor: ' + type +  '</h1>'+
            '<div class="reivewLinks" id="bodyContent">'+
            '<p> Average Rating: ' + rating +
            '<br>' +
            '<a href="http://plato.cs.virginia.edu/~wcc4ch/Project/reviewsList.php?bathroom_id=' + id + '" class="btn btn-info" role="button">See Reviews</a>' +
            '<a href="http://plato.cs.virginia.edu/~wcc4ch/Project/createRating.php?bathroom_id=' + id + '" class="btn btn-info" role="button">Review Bathroom</a>' +
            '</div>'+
            '<a href="http://plato.cs.virginia.edu/~wcc4ch/Project/flagService.php?bathroom_id=' + id + '" class="btn btn-info" role="button">Flag Service</a>' +
            '</div>'+
            '</div>';



                  var infoWindow = new google.maps.InfoWindow({
                    content: contentString
                  });

                  //var text = document.createElement('text');
                  //text.textContent = "Click here to see reviews:  " + review_link;
                  //infowincontent.appendChild(text);
                  var icon = customLabel[type] || {};
                  var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    label: icon.label
                  });
                  marker.addListener('click', function() {
                    //infoWindow.setContent(infowincontent);
                    sessionStorage.setItem('bathroom_id', id);
                    infoWindow.open(map, marker);
                  });
                });
              });

              }


                  function downloadUrl(url, callback) {
                  var request = window.ActiveXObject ?
                      new ActiveXObject('Microsoft.XMLHTTP') :
                      new XMLHttpRequest();

                  request.onreadystatechange = function() {
                    if (request.readyState == 4) {
                      request.onreadystatechange = doNothing;
                      callback(request, request.status);
                    }
                  };

                  request.open('GET', url, true);
                  request.send(null);
                }

                function doNothing() {}

                  </script>
                  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJhSOn-35f0yjQbGfJ_BOycFzVgl5doXM&callback=myMap"></script>
              </div>
        </div>




      </div>
      </div>


    </body>



  </body>
  </html>
