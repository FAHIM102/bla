<?php
 
require '../shopms/files/FileOperation.php';

$userData = getOne("../shopms/user.json", 'username', $_SESSION['username']);
$fullname = $userData->fullname;
$username = $userData->username;
$password = $userData->password;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
	$isValid = true;
	$password = $_POST['password'];

	$fullnameErr = $usernameErr = $passwordErr = "";
	$successfulmessage = $errormessage = "";

	if(empty($fullname)) {
	$fullnameErr = "Full name can not be empty!";
	$isValid = false;
	}

	if(empty($username)) {
	$usernameErr = "User name can not be empty!";
	$isValid = false;
	}

	if(empty($password)) {
	$passwordErr = "Password can not be empty!";
	$isValid = false;
	}

	if ($isValid) {
		$arr = array('fullname' => $fullname, 'username' => $username, 'password' => $password);

		$result = update("../shopms/user.json", $arr);
		if ($result) {
			$successfulmessage = "Successfully saved";
		} else {
			$errormessage = "Error while saving";
		}
	}
}

 ?>