<?php session_start();
$id=$_SESSION['_JMUID'];
if(!isset($_SESSION['_JMEMAIL']))
	{
		header('Location:login.php');
		}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="icon" href="img/favicon.ico">
<title>Jamesmatrimony.com</title>
</head>

<body>
<div id="fb-root"></div>
<div class="yellow_bg"></div>
<div class="cm_logo"><img src="img/cm_logo.png"></div>
<div class="box">
<?php require_once('menu.php');?>
<div class="container-fluid">
<section class="row-fluid" >