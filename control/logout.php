<?php
session_start();
session_unset('_JMEMAIL');
if(isset($_COOKIE['JMS_user']))
{
	setcookie('JMS_user', null, $time - 3600, '/');
	setcookie('JMS_token', null, $time - 3600, '/');
}        
header('location: ../index.php');
exit();
?>