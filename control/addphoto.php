<?php
session_start();
$id = $_SESSION['_JMUID'];
require_once('functions.php');

if (isset($_POST['upload']))
	{
	$allowedExts = array(
		"gif",
		"jpeg",
		"jpg",
		"png"
	);
	$temp = explode(".", $_FILES["profile_pic"]["name"]);
	$extension = end($temp);
	if ((($_FILES["profile_pic"]["type"] == "image/gif") || ($_FILES["profile_pic"]["type"] == "image/jpeg") || ($_FILES["profile_pic"]["type"] == "image/jpg") || ($_FILES["profile_pic"]["type"] == "image/pjpeg") || ($_FILES["profile_pic"]["type"] == "image/x-png") || ($_FILES["profile_pic"]["type"] == "image/png")) && ($_FILES["profile_pic"]["size"] < 20000) && in_array($extension, $allowedExts))
		{
		echo "Invalid profile pic image";
		}

	include ('si.php');

	$image = new SimpleImage();
	$image->load($_FILES['profile_pic']['tmp_name']);
	$image->resizeToWidth(600);
	$name=uniqid();
	$src='../uploads/' . $name.'.jpg';
	$image->save($src);
	
	$sql = "INSERT INTO `photos` (`photo_id`, `Photo_name`, `user_id`, `url`, `status`, `dp_flag`, `date`) VALUES (NULL, '$name', '$id', '$src', '1', '1', CURRENT_TIMESTAMP);";
	_db($sql);
	header("Location: ../view/managephoto.php?photo=".$name);
	}

?>
