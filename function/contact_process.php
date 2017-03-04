<?php
include '../config.php';

$fname = $_POST["first_name"];
$lname = $_POST["last_name"];
$email = $_POST["email"];
$message = $_POST["message"];

if(($fname=="") OR ($lname=="") OR ($email=="") OR ($message=="")){
	echo "<script>alert('Empty field!');window.history.go(-1);</script>";
	exit();
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	echo "<script>alert('Invalid Email!');window.history.go(-1);</script>";
	exit();
}

$to = "heydaddycares@gmail.com";
$subject = "[Contact] Hey Daddy - Enquiries";
$msg =  "Hi admin,

$fname $lname had sent a message using contact us form. 

Email: $email
Message:

$message


This message is auto-generated. Please do not reply to this email.";


if (mail($to,$subject,$msg)){	

echo "<script>alert('Thank you for your message! We will get back to you soon!');window.history.go(-2);</script>";
	exit();

}else{

echo "Fail";
echo "<script>alert('Error sending message! Please try again with a valid email address!');window.history.go(-1);</script>";
	exit();

}

	 

?>

