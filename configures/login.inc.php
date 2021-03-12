<?php
include 'config.php';


if (isset($_POST['submit-login'])) {
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = mysqli_real_escape_string($connect, $_POST['pwd']);
	if (empty($email)) {
		header ("location: ../login.php?Enter Your Email Pliz..");
	}
	if (empty($password)) {
		header ("location: ../login.php?Enter Your Password Pliz..");
	}

		$query = "SELECT * FROM users WHERE email =='$email' AND password =='$password';";
		$results = mysqli_query($connect, $query);
		//compare results from table users with actual user inputs
		if (mysqli_num_rows($results) == 1) {
			$row = mysqli_fetch_assoc($results);
			/** fetch username and user id to set session variables */
			$username = $row['username'];
			$P_id = $row['id'];

			$_SESSION['user'] = $username;
			$_SESSION['Id'] = $P_id;
			setcookie('user', $username, time() + (86400 * 2), "/");
			header('location: ../index.php? Successfully Logged in');
		} else {
      header ("location: ../login.php?Wrong Password..");
  }

	
}

/** signup users */
elseif (isset($_POST['signup-btn'])) {


    $firname = $_POST['firstname'];
    $laname = $_POST['lastname'];
    $uname = $_POST['username'];
    $Email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $pwd = $_POST['pwd'];
    
    
    if (empty($uname) || empty($firname) || empty($laname) || empty($Email) || empty($contact) || empty($address) || empty($pwd)) {
        
        header("location: ../signup.php?== Blank field");
    }

    else {
        $connect = mysqli_connect('localhost', 'root', '', 'patriotism');
        
        $sql = "SELECT username FROM users WHERE username = ?;";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?== Error = No table");
    }
    else{
        mysqli_stmt_bind_param($stmt, "s",$Email);
        mysqli_stmt_execute($stmt);
         mysqli_stmt_store_result($stmt);
         $resultCheck = mysqli_stmt_num_rows($stmt);
         if ($resultCheck > 0) {
         header("location: ../signup.php? username taken!");
    
        }
        else{
        $sql = "INSERT INTO users (fir_name, la_name, username, email, contact, address, password
     ) VALUES (?, ?, ?, ?, ?, ?, ?)";
     $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("location: ../signup.php?== Error = Connection failed");
      }
    else{
        mysqli_stmt_bind_param($stmt, "sssssss",$firname, $laname, $uname, $Email,$contact, $address, $pwd);
        mysqli_stmt_execute($stmt);
        header("Location: ../index.php?==:: Registered Succesfully");
        exit();
          }
        }
      }
     
     mysqli_stmt_close($stmt);
     mysqli_close($connect);
    }
    }
    