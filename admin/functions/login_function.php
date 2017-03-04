<?php
session_start();
include "../../config.php";

$username=$conn->real_escape_string(htmlspecialchars($_POST['username']));
$password=$conn->real_escape_string(htmlspecialchars(sha1($_POST['password'])));

$sql="SELECT * FROM user WHERE user_name='$username' AND password='$password'";
$result = $conn->query($sql);

if($result->num_rows > 0){ //if account exists	
	$row = $result->fetch_assoc();
	$_SESSION["user_id"]= $row["user_id"];
	$_SESSION["user_name"]= $row["user_name"];
	
	header('Location:../index.php');
	
} else { //if account does not exist
	echo "<script>alert('Error: Access Denied'); window.location.href='../login.php'</script>";
	exit();
}