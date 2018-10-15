<?php require_once('functions.php');
	$password=$_POST['Password'];
	$sql = "SELECT `login_token` FROM `user` WHERE `id`='$user_id'";
	$result=_db($sql);
	$data=mysqli_fetch_row($result);
	?>