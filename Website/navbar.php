session_start();
  //Embedding javascript into php based on https://stackoverflow.com/questions/23574306/executing-php-code-inside-a-js-file/23574397
  $username = "";
 +
 +//Checks the logged-in user's username
  if (isset($_SESSION['username']))
  {
      $username = $_SESSION['username'];
  }
  header("Content-type: application/javascript");
 +
 +//Displays the link for a logged-out user
  $text1 = "Login";
  $link1 = "http://localhost:8080/HooPoo_Servlet/LoginServlet";
 +
 +//Hides the profile link for a logged-out user
  $text = "";
  $link="?";
  $logout = "";
 +
 +//Changes the links for a logged in user
  if ($username != "") {
 +
 +    //Displays the link to the logout servlet for a logged-in user
      $link1 = "http://localhost:8080/HooPoo_Servlet/LogoutServlet";
      $text1 = "Logout";
<!--  +
 +    //Displays the link to the logged-in user's profile
      $link = "http://localhost/StoryShare/profile.php";
      $text = "Welcome, $username"; -->
