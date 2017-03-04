<?php

//session
session_start();

if(!isset($_SESSION['user_id'])){
	header('Location: ../login.php');
}

include '../../config.php';
date_default_timezone_set("Asia/Singapore");

$id = $_POST["post_id"];
$title=$_POST["title"];
$author=$_POST["author"];
$description=$_POST["description"];
$category=$_POST["category"];
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


$nm_img = $_FILES['attach']['name'];
$tmp_img  = $_FILES['attach']['tmp_name'];
$type_img = $_FILES['attach']['type'];


$sql="SELECT * FROM post WHERE post_id='$id'";
$result=$conn->query($sql);
$rows=$result->fetch_assoc();

$img = $rows["post_image"];


if(empty($tmp_img)){
	
	$update2="UPDATE post SET post_title='$title', post_description='$description', post_content='$content', post_author='$author', post_category='$category' WHERE post_id='$id'";
	$result2=$conn->query($update2); 
	if($result2){
		//echo "Success";
		echo "<script>window.location.href='../index.php';</script>";
	} else {
		echo "<script>alert('Posting has failed! Please try again!');window.history.go(-1);';</script>";
	}
	
}else{
		
	//Check on file extensions
		$allowedExts = array("jpg", "jpeg", "gif", "png");
		$extension = end(explode(".", $_FILES["attach"]["name"]));
		if ((($_FILES["attach"]["type"] == "image/gif")
		  || ($_FILES["attach"]["type"] == "image/jpeg")
		  || ($_FILES["attach"]["type"] == "image/png")
		  || ($_FILES["attach"]["type"] == "image/pjpeg"))
		  && ($_FILES["attach"]["size"] < 500000)
		  && in_array($extension, $allowedExts))
		{
			$targetPath="../../img/post/";
			$imageName=basename($_FILES['attach']['name']);
				
			
			//Check for duplication of image name
			$select="SELECT * FROM post where post_image='$imageName' and post_id!=$id'";
			$check=$conn->query($select);
			
			if($check->num_rows > 0){ 
				echo "<script>alert('Error: Image Duplication. Please avoid posting duplication image or rename the image if it is not a duplication image!');window.history.go(-1);</script>";
				exit();
			} else {
				
			//Delete existing images when updating images
				unlink("../../img/post/".$img);
				
				$targetPath=$targetPath.$imageName;
				move_uploaded_file($_FILES['attach']['tmp_name'],$targetPath);
				
				$update="UPDATE post SET post_title='$title', post_image='$imageName', post_description='$description', post_content='$content', post_author='$author',post_category='$category' WHERE post_id='$id'";
				$result=$conn->query($update);
				
				if($result){
				//echo "Successful<BR>";
					echo "<script>window.location.href='../index.php';</script>";
				} else {
					echo "<script>alert('Posting has failed! Please try again!');window.history.go(-1);</script>";
				}
				
			}	
			
		}else{
		
			echo "<script>alert('Error:Invalid attachment or Image size should not be more than 500kB!');window.history.go(-1);</script>";
			exit();
			
		}
		
}



?>