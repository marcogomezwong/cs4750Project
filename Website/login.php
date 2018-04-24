<!-- http://form.guide/php-form/php-login-form.html -->

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

<div class="home-title-contatiner">

<form id='login' action='login.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend class="loginLegend">Login</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>

<label class="loginLabel" for='username' >Username*:</label>
<input class="loginLabel" type='text' name='username' id='username'  maxlength="50" />
<br>

<label class="loginLabel" for='password' >Password*:</label>
<input class="loginLabel" type='password' name='password' id='password' maxlength="50" />

<input type='submit' name='Submit' value='Submit' />

</fieldset>
</form>


<a href="http://plato.cs.virginia.edu/~wcc4ch/Project/createaccount.php" class="btn btn-info" role="button">Create Account</a>

</div>

</div>
</div>
</div>
</div>

</body>

</html>