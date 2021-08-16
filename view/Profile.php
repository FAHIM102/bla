<?php
 
 require '../shopms/files/FileOperation.php';
 require '../shopms/controllers/ProfileAction.php';
 require '../shopms/controllers/include/Navigation.php';

 ?>


<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
<fieldset style="width: fit-content">
<legend>Profile</legend>

 <br><br>

<label for="fullname">Full Name<span style="color: red;">*</span>: </label>
<input type="name" name="fullname" id="fullname" value = "<?php if (isset($fullname)) echo $fullname; ?>">
<span style= "color: red"><?php if (isset($fullnameErr)) {
	echo "$fullnameErr";
} ?></span>

 <br><br>

<label for="username">User Name<span style="color: red;">*</span>: </label>
<input type="name" name="username" id="username" value = "<?php if (isset($username)) echo $username; ?>">
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

 <input type = "submit" name ="update" value="Update" style = "background-color: limegreen">
 <br><br>

 <span style = "color: green"><?php if (isset($successfulMessage)) echo $successfulMessage; ?></span>
 <span style = "color: red"><?php if (isset($errorMessage)) echo $errorMessage; ?></span>
</fieldset>

</form>

?>