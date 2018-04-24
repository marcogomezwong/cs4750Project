<!-- http://form.guide/php-form/php-login-form.html -->

<!DOCTYPE html>


<form id='login' action='auth.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Login</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>

<label for='username' >UserName*:</label>
<input type='text' name='username' id='username'  maxlength="50" />

<label for='password' >Password*:</label>
<input type='password' name='password' id='password' maxlength="50" />

<input type='submit' name='Submit' value='Submit' />

</fieldset>
</form>

<a href="http://plato.cs.virginia.edu/~wcc4ch/Project/createaccount.php" class="btn btn-info" role="button">Create Account</a>

</html>