<?php

date_default_timezone_set("Asia/Singapore");
include '../../config.php';

$title=$_POST["title"];
$author=$_POST["author"];
$description=$_POST["description"];
$category=$_POST["category"];
$attach = $_POST["attach"];
$content=$_POST["content"];


if($title==""){
	echo "<script>alert('Empty field: Title!');window.history.go(-1);</script>";
	exit();
}

if($description==""){
	echo "<script>alert('Empty field: Description!');window.history.go(-1);</script>";
	exit();
}

if($content==""){
	echo "<script>alert('Empty field: Content!');window.history.go(-1);</script>";
	exit();
}


$allowedExts = array("jpg", "jpeg", "gif", "png");
$extension = end(explode(".", $_FILES["attach"]["name"]));
if ((($_FILES["attach"]["type"] == "image/gif")
      || ($_FILES["attach"]["type"] == "image/jpeg")
      || ($_FILES["attach"]["type"] == "image/png")
      || ($_FILES["attach"]["type"] == "image/pjpeg"))
      && in_array($extension, $allowedExts))
{
		
	$targetPath="../../img/post/";
	$imageName=basename($_FILES['attach']['name']);
	$targetPath=$targetPath.$imageName;


	//Check for duplication of image name
	$sql="SELECT * FROM post WHERE post_image='$imageName'";
	$result=$conn->query($sql);

	if($result->num_rows > 0){ 
		echo "<script>alert('Error: Image Duplication. Please avoid posting duplication image or rename the image if it is not a duplication image!');window.history.go(-1);</script>";
		exit();
	} else {

		$insert="INSERT INTO post (post_title, post_image, post_description, post_content, post_author, post_category, post_date) VALUES('$title','$imageName','$description','$content','$author','$category',now())";
		$result1=$conn->query($insert); 

		if($result1){
			move_uploaded_file($_FILES['attach']['tmp_name'],$targetPath);
			echo "<script>window.location.href='../index.php?menu=events';</script>";
		}else {
			echo "<script>alert('Posting has failed! Please try again!');window.history.go(-1);</script>";
		}
	}
		 
}else { 
	echo "<script>alert('Error:Invalid attachment or Image size should not be more than 500kB!');window.history.go(-1);</script>";
	exit();
}



?>