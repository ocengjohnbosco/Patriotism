
<?php
include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title> National Patriotism Corps-Uganda</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel='stylesheet' type='text/css' media='screen' href='stylesheet.css'>
    <script src='main.js'></script>
    <script src='contact.js'></script>
	 <script src ="indexstyle.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
<body>
<div class="main-contacting">
<div class="left-cont">
    
        <h1 class="everest">Contacts Details </h1>
        <p class="everest">For any inquiries call Assistant Commissioner Lulu Itipa 0772955159/0759955159;<br> Principal Assistant Secretary (NSPC) Ms Hadijja Wegosasa 0774616715, <br>
        Principal Officer Ms Rose Bisikwa 0772474211 and<br> 
        Principal Officer Deo Seburimage 0703995943.</p>

        <p class="everest"><b>FOR GOD AND MY COUNTRY</b></p>

        <p class="everest">Lt. Col. Henry Masiko<br>
        Commissioner for Patriotism Clubs<br>
        Office of the President<br>
        Kampala</p>
        <br>
</div>
<div class="right-div">
<h2>Contact Us</h2>
    <p>Please fill in this form and send us.</p>
    <form action="contact.php" method="post">
        <p>
            <label for="inputName">Name:<sup>*</sup></label>
            <input type="text" name="name" id="inputName">
        </p>
        <p>
            <label for="inputEmail">Email:<sup>*</sup></label>
            <input type="text" name="email" id="inputEmail" >
        </p>
        <p>
            <label for="inputSubject">Subject:</label>
            <input type="text" name="subject" id="inputSubject" >
        </p>
        <p>
            <label for="inputComment">Message:<sup>*</sup></label>
            <textarea name="message" id="inputComment" rows="8" cols="60"></textarea>
        </p>
        <input type="submit" name="submit-message" value="Send">
        <input type="reset" value="Reset">
    </form>
   </div>
   <?php
// Functions to filter user inputs
function filterName($field){
    // Sanitize user name
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    
    // Validate user name
    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        return $field;
    } else{
        return FALSE;
    }
}    
function filterEmail($field){
    // Sanitize e-mail address
    $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
    
    // Validate e-mail address
    if(filter_var($field, FILTER_VALIDATE_EMAIL)){
        return $field;
    } else{
        return FALSE;
    }
}
function filterString($field){
    // Sanitize string
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(!empty($field)){
        return $field;
    } else{
        return FALSE;
    }
}
 
// Define variables and initialize with empty values
$nameErr = $emailErr = $messageErr = "";
$name = $email = $subject = $message = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate user name
    if(empty($_POST["name"])){
        $nameErr = "Please enter your name.";
    } else{
        $name = filterName($_POST["name"]);
        if($name == FALSE){
            $nameErr = "Please enter a valid name.";
        }
    }
    
    // Validate email address
    if(empty($_POST["email"])){
        $emailErr = "Please enter your email address.";     
    } else{
        $email = filterEmail($_POST["email"]);
        if($email == FALSE){
            $emailErr = "Please enter a valid email address.";
        }
    }
    
    // Validate message subject
    if(empty($_POST["subject"])){
        $subject = "";
    } else{
        $subject = filterString($_POST["subject"]);
    }
    
    // Validate user comment
    if(empty($_POST["message"])){
        $messageErr = "Please enter your comment.";     
    } else{
        $message = filterString($_POST["message"]);
        if($message == FALSE){
            $messageErr = "Please enter a valid comment.";
        }
    }
    
    // Check input errors before sending email
    if(empty($nameErr) && empty($emailErr) && empty($messageErr)){
        // Recipient email address
        $to = 'johnboscooceng3@gmail.com';
        
        // Create email headers
        $headers = 'From: '. $email . "\r\n" .
        'Reply-To: '. $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        
        // Sending email
        if(mail($to, $subject, $message, $headers)){
            echo '<p class="success">Your message has been sent successfully!</p>';
        } else{
            echo '<p class="error">Unable to send email. Please try again!</p>';
        }
    }
}
?></div>

</body>
</html>
<?php
include 'footer.php';
?>