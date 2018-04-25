
<!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_signup_form -->
<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

<body class="loginPage">

<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="new-bathroom-form-container">

<div class="login-contatiner  loginForm" id="formLogin">

<form action="auth_create.php" method='post'>
 
    <h1 class="loginLegend" style="padding-top: 15px;">Sign Up</h1>
    <p style="text-align: center;">Please fill in this form to create an account.</p>
    <hr>

    <label class="loginLabel"  for="username"><b>Username</b></label>
    <input class="loginLabel"  type="text" placeholder="Enter Email" name="username" required>

    <br>

    <label class="loginLabel" for="password"><b>Password</b></label>
    <input  class="loginLabel" type="password" placeholder="Enter Password" name="password" required>
    <br>

    <label  class="loginLabel"  for="password_repeat"><b>Repeat Password</b></label>
    <input  class="loginLabel" type="password" placeholder="Repeat Password" name="password_2" required>

    <br>
        <button type="submit" class="btn btn-info">Sign Up</button>
</form>

</div>
</div>
</div>
</div>

</body>
</html>
