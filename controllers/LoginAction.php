 <?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $isValid = true;
    $username = $_POST['username'];
    $password = $_POST['password'];

    $usernameErr = $passwordErr = "";
    $errorMessage = "";

    if (empty($username)) {
        $usernameErr = "Username can not be empty!";
        $isValid = false;
    }

    if (empty($password)) {
        $passwordErr = "password can not be empty!";
        $isValid = false;
    }

    if ($isValid) {
        $result = isValidCredentials($username, $password);
        if ($result) {
            session_start();
            $_SESSION['username'] = $username;
            header(Location: shopms/Home.php);
        } else {
            $errorMessage = "Login Failed";
        }
    }
}

 function isValidCredentials($username, $password, $fileName)
 {
    $found = false;
    $data = read($fileName);
    if (!empty($data)) {
       $arr1 = json_decode($data);
       for ($i=0 ; $i < count($arr1); $i++ ) { 
           if ($arr1[$i]->username === $username and $arr1[$i]->password === $password) {
              $found = true;
              break;
           }
       }
    }
    return $found;
 }

 ?>