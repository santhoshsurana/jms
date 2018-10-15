<?php 
	session_start();
	if(!isset($_SESSION['_JMEMAIL'])){header('Location:login.php');}
	$id=$_SESSION['_JMUID'];
    include "../control/functions.php"; 
	include "../control/array.php";  
	$username=$_SESSION['_JMEMAIL'];
	$sql = "SELECT `status` FROM `user` WHERE (`email`='$username' OR id='$username')";
	$result=_db($sql);
	$data=mysqli_fetch_row($result);
	$status=$data['0'];
	if($status==0)
	{
		header('Location: verify.php');
	}
	else if($status==1)
	{
		header('Location:interests.php');
	}else if($status==2)
	{
		header('Location:partner.php');
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
    <div class="cm_logo">
        <img src="img/cm_logo.png">
    </div>
    <div class="box">
        <?php require_once( 'menu.php');?>
        <div class="container-fluid">
            <section class="row-fluid">
                <?php require_once( 'sidebar.php');?>
                <div class="span7">
                    <div class="thumbnails">
                        <div class="row-fluid">
                            <h4>Recently joined </h4>
                            <article align="center">
                                
<?php getRecent($id);
?>
                               
                                
                            </article>
                        </div>
                        <div class="row-fluid">
                            <h4>viewed profiles</h4>
                            <article align="center">
                            <?php 
                                $sql="SELECT `viewed_id` FROM `viewed_profile` WHERE `viewed_id`=".$id;
								$result=_db($sql);
								$count   = mysqli_num_rows($result); 
								$data=mysqli_fetch_row($result); 
								?>
                                <?php  getViewed($id);
?>
                            </article>
                        </div>
                     </div>
                 </div>
<?php require_once('ads.php');?>
<?php require_once('footer.php');?>