
<!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_signup_form -->
<!DOCTYPE html>

<body>

<form action="auth_create.php" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Email" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <label for="password_repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="password_2" required>
    
    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>

</body>
</html>
