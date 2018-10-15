<?php 
 require_once('functions.php');
if(isset($_GET['email'])){
	$email=$_GET['email'];
	$sql = "SELECT * FROM `notifications` WHERE `email`='".$email."'";
	$result=_db($sql);
	$count=mysqli_num_rows($result);
	if($count==1){
		echo "Already subscribed thanks for your interest!";
	}else{
	$sql = "INSERT INTO `matrimony`.`notifications` (`id`, `email`, `date`) VALUES (NULL, '".$email."', CURRENT_TIMESTAMP);";
	$result=_db($sql);
	echo "you are successfully subscribed to notifications.";
	}
 }
 
?>