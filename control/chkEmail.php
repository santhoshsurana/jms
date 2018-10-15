<?php 
 require_once('functions.php');
 $email=$_POST['email_value'];
 $sql = "SELECT `email` FROM `user` WHERE `email`= '$email'";
 $result=_db($sql);
 $count=mysqli_num_rows($result);
	if($count==1)
	{
		echo "1";
	}
	else{
		echo "0";
	}

?>