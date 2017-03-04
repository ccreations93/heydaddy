<?php

include '../../config.php';

$id=$_GET['id'];

$sql="SELECT * from post where post_id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$img = $row['post_image'];

$query="DELETE FROM post where post_id='$id'";
$delete=$conn->query($query);

if($delete){	
	//Delete existing images when updating images
	unlink("../../img/post/".$img);
	echo "<script>window.location.href='../index.php';</script>";
	exit();	
}else{
	echo "<script>alert('Delete fail!');window.history.go(-1);</script>";
	exit();	
}

?>