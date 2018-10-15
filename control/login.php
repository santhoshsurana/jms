<?php 
 session_start();
 require_once('functions.php');
 if(isset($_POST['login'])){
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	if(strlen($username)==9){$username = ltrim($username, 'JM');}
	$remember=$_POST['logedIn'];
	$sql = "SELECT `id`,`email` FROM `user` WHERE (`email`='".$username."' OR id='".$username."') AND `password`='".$password."'";
	$result=_db($sql);
	$count=mysqli_num_rows($result);
	$data=mysqli_fetch_row($result);
	$id=$data['0'];
	$email=$data['1'];
	if($count==1)
	{
		$date = date('Y-m-d H:i:s');
		$token=md5($id.time());
		$sql = "UPDATE `user` SET `login_token` = '".$token."', `last_login` = '".$date."' WHERE `user`.`id` = '".$id."';";
		_db();
		mysqli_query($CON, $sql);
		$_SESSION['_JMUID']=$id;
		$_SESSION['_JMEMAIL']=$email;
		if($remember==1) {
		$time = time();
		setcookie("JMS_user", $username, $time + 3600, '/');
		setcookie("JMS_token", $token, $time + 3600, '/');
		}
		if($username=='admin'){
			header('location: ../admin/index.php');
		}else{
			header('location: ../view/home.php');
		}
	}

 }else if(isset($_POST['password'])){
	$username=$_POST['username'];
	if(strlen($username)==9){$username = ltrim($username, 'JM');}
	$password=md5($_POST['password']);
	$sql = "SELECT `id` FROM `user` WHERE (`email`='".$username."' OR id='".$username."') AND `password`='".$password."'";
	$result=_db($sql);
	$count=mysqli_num_rows($result);
	echo $count;
 }else {
	$username=$_POST['username'];
	if(strlen($username)==9){$username = ltrim($username, 'JM');}
	$sql = "SELECT `id` FROM `user` WHERE `email`='".$username."' OR id='".$username."'";
	$result=_db($sql);
	$count=mysqli_num_rows($result);
	echo $count;
 }
?>