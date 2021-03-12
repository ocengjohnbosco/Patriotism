<?php 
	/* session_start();

	$username = "";
	$email    = "";
	$errors = array();
	$_SESSION['success'] = "";*/

	$connect = mysqli_connect('localhost', 'root', '');

	$ib = "CREATE DATABASE IF NOT EXISTS patriotism";
	mysqli_query($connect, $ib);

    $use = "patriotism";
	mysqli_query($connect, $use);
	
	$user = "CREATE TABLE IF NOT EXISTS users (
		/* 8 columns */
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
		fir_name VARCHAR(30),
		la_name VARCHAR(50),
		username VARCHAR(30),
		email VARCHAR(50),
		contact VARCHAR(50),
		address varchar(50),
        reg_date datetime,
		password VARCHAR(50)
		)";
		mysqli_query($connect, $user);

		$admin = "CREATE TABLE IF NOT EXISTS admin (
			/* 8 columns - doctors table */
			ad_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			fir_name VARCHAR(30),
			la_name VARCHAR(50),
			ad_username VARCHAR(30),
			ad_email VARCHAR(50),
			ad_contact VARCHAR(50),
            reg_date datetime,
			ad_password VARCHAR(50)

			)";
			mysqli_query($connect, $admin);
			
			$uploads = "CREATE TABLE IF NOT EXISTS uploads(
				/* 8 columns Admin table */
				up_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				filetype VARCHAR(30),
				filename VARCHAR(50),
                author VARCHAR(50),
				content VARCHAR(30),
				u_image VARCHAR(30),
                upload_date datetime update on current_time,
				update_date datetime update on current_time
                )";
				mysqli_query($connect, $uploads);
		
	

/*  === This will Inserts data into table sepecified above..  */
$Inserttousers = "INSERT INTO `users` (`id`, `fir_name`, `la_name`, `username`, `email`, 'contact', 'reg_date', 'password') VALUES
	(01, 'bosco ', 'oceng', 'johnbosco', 'johnbosco@gmail.com', '0780910316', 06-03-2021,'users1'),
    (02, 'godfrey ', 'obita', 'godfrey', 'obita@gmail.com', '0770656976', 06-03-2021,'users2'),
    (03, 'Christine ', 'Atuha', 'atuhaic', 'atuhaic@gmail.com', '0770013257', 06-03-2021,'users3'),
    (04, 'ronald ', 'okwir', 'ronald', 'ronald@gmail.com', '0780918997',06-03-2021, 'users4'),
    (05, 'winfred ', 'namugabo', 'winfredNabo', 'winfress@gmail.com', '0780123466', 06-03-2021, 'users5')
    ";
mysqli_query($connect, $Inserttousers ); 

/** Insert into admin */
$InserttoAdmin = "INSERT INTO `admin` (`ad_id`, `fir_name`, `la_name`, `ad_username`, `ad_email`, 'ad_contact', 'reg_date', 'ad_password') VALUES
	(01, 'bosco ', 'oceng', 'johnbosco', 'johnbosco@gmail.com', '0780910316', 06-03-2021, 'users1'),
    (02, 'godfrey ', 'obita', 'godfrey', 'obita@gmail.com', '0770656976',  06-03-2021,'users2'),
    (03, 'Christine ', 'Atuha', 'atuhaic', 'atuhaic@gmail.com', '0770013257', 06-03-2021, 'users3'),
    (04, 'ronald ', 'okwir', 'ronald', 'ronald@gmail.com', '0780918997', 06-03-2021, 'users4'),
    (05, 'winfred ', 'namugabo', 'winfredNabo', 'winfress@gmail.com', '0780123466', 06-03-2021, 'users5')
    ";
mysqli_query($connect, $InserttoAdmin ); 

?>
