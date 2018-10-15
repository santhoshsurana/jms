<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<div class="row-fluid">
<h3 align="center">Reset password</h3>
            <form id="login" method="post" class="offset3 span6 form-horizontal" action="../control/reset.php" onSubmit="return logIn();">
                <div class="control-group">
                    <label class="control-label " for="nPass">New Password</label>
                    <div class="controls">
                        <input type="password" id="nPass" name="nPass" placeholder="new password" autocomplete='off' />
                    </div>
                  </div>
                  <div class="control-group"> 
                    <label class="control-label" for="cPass">Confirm Password</label>
                    <div class="controls">
                        <input type="password" id="cPass" name="cPass" placeholder="confirm password" onBlur="chkpass" autocomplete='off' />
                        <input type="hidden" name="password" value="" />
                    </div>
                    </div>
                    <div class="control-group">
                    <div class="controls">
                        <input type="submit" name="reset" value="Reset" class="btn offset3 " />
                    </div>
                    </div>
                </div>
                </div>
            </form>
<?php require_once('../control/functions.php');
if(isset($_GET['id'])){
	$user_id=$_GET['id'];
	$token=$_GET['token'];
	$sql = "SELECT `login_token` FROM `user` WHERE `id`='$user_id'";
	$result=_db($sql);
	$data=mysqli_fetch_row($result);
	if($token==$data['0'])
	{
		if(isset($_GET['target']))
		{
			?>
            <h3 align="center">Reset password</h3>
            <form id="login" method="post" class="offset3 span6 form-horizontal" action="../control/reset.php" onSubmit="return logIn();">
                <div class="control-group">
                    <label class="control-label " for="nPass">New Password</label>
                    <div class="controls">
                        <input type="password" id="nPass" name="nPass" placeholder="new password" autocomplete='off' />
                    </div><br/>
                    <label class="control-label" for="cPass">Confirm Password</label>
                    <div class="controls">
                        <input type="password" id="cPass" name="cPass" placeholder="confirm password" autocomplete='off' />
                    </div>
                    <div class="controls">
                        <input type="submit" name="login" value="login" class="btn offset2 pull-right">
                    </div>
                </div>
                </div>
            </form>
            <?php
		}
		else{
			$sql = "UPDATE `matrimony`.`user` SET `status` = '5' WHERE `user`.`id` = '$user_id';";
			$result=_db($sql);
		 	header('Location:../view/home.php');
		}
	}
}
?>
</div>
<?php require_once('footer.php');?>
