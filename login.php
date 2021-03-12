<?php 
require 'configures/config.php';
include 'header.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet"  href="loginstyle.css">
	<script src ="loginstyle.js"></script>
	<link rel="icon" type="image" href="bardge.jpg"></li>
</head>
<body>
<div class="container">
  <div class="promo-2">
    <form action="configures/login.inc.php" method="post>
    <center> <h3>NPC Registration form</h3></center>
        <div>
            <label for="email"> Enter Email</label>
            <input type="email" id="email" name="email"/>
            <label for="name"> Enter Password</label>
            <input type="password"  name="pwd" />
            <button type="submit" name="submit-login">Login</button>
            <center>
              Do not have an account? <small><a href="#">Signup</a></small>
            </center>
        </div>
      </form>
    </div>
		</div>
	
</body>
</html>