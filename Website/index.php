 //Checks the parameter passed in by the login servlet
      if (isset($_GET['username']))
      {
 +        //Creates a new session once the user is logged in.
          $_SESSION['username']=$_GET['username'];
          header("Refresh:0; url=index.php");
      }
 +
 +    //Checks the parameter passed in by the logout servlet
      if (isset($_GET['loggedout']))
      {
 +        //Deletes the session with the user
          unset($_SESSION['username']);
          header("Refresh:0; url=index.php");
      }
 +
 +    //Sets the username value to the logged-in user's username
      if (isset($_SESSION['username']))
      {
          $username = $_SESSION['username'];
