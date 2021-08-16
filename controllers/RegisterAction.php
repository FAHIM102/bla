<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
	$isValid = true;
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$password = $_POST['password'];



	$fullnameErr = $usernameErr = $passwordErr =  "";
    $successfulmessage = $errorMessage = "";

    if (empty($fullname)) {
        $fullnameErr = "Full name can not be empty!";
        $isValid = false;
    }

    if (empty($username)) {
        $usernameErr = "Username can not be empty!";
        $isValid = false;
    }

    if (empty($password)) {
        $passwordErr = "Password can not be empty!";
        $isValid = false;
    }

    if (search('username', $username)) {
    	$errorMessage = "Username already exists";
    	$isValid = false;
    }

    if ($isValid) {
    	$arr = array('fullname' => $fullname, 'username' => $username, 'password' => $password);
    	$result = create($arr);
    	if ($result) {
    		$successfulmessage = "Registration successful";
    	} else {
    		$errorMessage = "Error while saving";
    	}
    }
}

	function isValidCredentials($fullname, $username, $password, $fileName)
 {
    $found = false;
    $data = read($fileName);
    if (!empty($data)) {
       $arr1 = json_decode($data);
       for ($i=0 ; $i < count($arr1); $i++ ) { 
           if ($arr1[$i]->fullname === $fullname and $arr1[$i]->username === $username and $arr1[$i]->password === $password) {
              $found = true;
              break;
           }
       }
    }
    return $found;
 }

 ?>