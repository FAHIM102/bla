<?php
 
 require '../shopms/controllers/include/Header.php';
 require '../shopms/controllers/include/Navigation.php';
 require '../shopms/controllers/ChangePasswordAction.php';

 ?>


<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
<fieldset style="width: fit-content">
<legend>Change Password</legend>



 <br><br>

<label for="username">User Name<span style="color: red;">*</span>: </label>
<input type="name" name="username" id="username" value = "<?php if (isset($username)) echo $username; ?>" disabled>
<span style= "color: red"><?php if (isset($usernameErr)) {
	echo "$usernameErr";
} ?></span>


 <br><br>

 <label for="password">Password<span style="color: red;">*</span>: </label>
<input type="password" name="password" id="password" value = "<?php if (isset($password)) echo $password; ?>">
<span style= "color: red"><?php if (isset($passwordErr)) {
	echo "$passwordErr";
} ?></span>

 <br><br>

 <input type = "submit" name ="update" value="Change Password" style = "background-color: limegreen">
 <br><br>

 <span style = "color: green"><?php if (isset($successfulMessage)) echo $successfulMessage; ?></span>
 <span style = "color: red"><?php if (isset($errorMessage)) echo $errorMessage; ?></span>
</fieldset>

</form>

?>