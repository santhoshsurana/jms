<?php session_start();
if(isset($_SESSION['_JMEMAIL']))
	{
		header('Location:home.php');
		}
require_once('../control/functions.php');

if(isset($_COOKIE['JMS_user']))
{
	$username = $_COOKIE['JMS_user'];
	$token = $_COOKIE['JMS_token'];
	$sql = "SELECT `id` FROM `user` WHERE (`email`='".$username."' OR id='".$username."') AND `login_token`='".$token."'";
	$result=_db($sql);
	$count=mysqli_num_rows($result);
	$data=mysqli_fetch_row($result);
	$id=$data['0'];
	if($count==1) 
	{
		$date = date('Y-m-d H:i:s');
		$sql = "UPDATE `user` SET `last_login` = '".$date."' WHERE `user`.`id` = '".$id."';";
		_db($sql);
		$_SESSION['_JMUID']=$id;
		$_SESSION['_JMEMAIL']=$username;
		header('Location: index.php');
	}
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="img/favicon.ico">
    <title>Jamesmatrimony.com</title>
</head>

<body>
    <div class="alert alert-error" style="display:none;" id="error">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>Warning!</h4>
        <p id="errorTxt" class="text-error"></p>
    </div>
    <div class="bottom_content" align="center">
        <div style="left: 10px; position: fixed; bottom: 10px; font-size: 14px">
            <div style="height: 10px; margin-bottom: 10px">
                <p>© 2013 Reserved to Jamesmatrimony.com. Developed By <a href='http://azul.in'>AZUL</a>
                    &nbsp;
                    <a href="#" onClick="model('term');">Terms</a> &amp; <a href="#" onClick="model('policy');">Policies</a>
                </p>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="login">
            <a href="../index.php" class="pull-right"><span class="icon-white icon-remove"></span>Close</a>
            <center>
                <a href="../index.php">
                    <img src="img/cm_logo.png" alt="login logo">
                </a>
            </center>
            <br />
            <form id="login" method="post" action="../control/login.php?login=true" onSubmit="return logIn();">
                <div class="control-group">
                    <label class="control-label" for="username">Matrimony ID (or) E-mail</label>
                    <div class="controls">
                        <input type="text" class="span12" id="username" name="username" placeholder="Ex: JM1111537 (or) username@domain.com" onBlur="logIn();" onKeyPress="charChk(event,'uid' );" />
                        <p id="email_error" style="color:#FFFFFF;"></p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input type="password" class="span12" id="password" name="password" placeholder="Password" onBlur="logIn();" />
                        <p id="pass_error" style="color:#FFFFFF;"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label for="logedIn">
                            <input type="checkbox" name="logedIn" id="logedIn">Keep me logged In</label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" name="login" value="login" class="btn offset2 pull-right">
                        <a href="#" class="offset1" onClick="frgtPswd_click()">Forgot password</a>
                    </div>
                </div>
            </form>
            <form id="forgotPass" style="display:none" method="post" action="../control/forgot.php">
                <div class="control-group">
                    <label class="control-label" for="username">E-mail address</label>
                    <div class="controls">
                        <input type="text" class="span12 " id="email" name="email" placeholder="Please enter recovery email address" onBlur="emailChk();forgotEmailAvail(1);" onKeyPress="charChk(event,'email' );" />
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="button" name="send" value="send" class="btn" onclick="forgot()">
                    </div>
                </div>
            </form>
        </div>
    </div>
 <?php require_once('terms.php');?>
<script src="js/jquery-2.0.3.min.js"></script>
<script src="js/bootstrap.js"></script>   
<script src="js/custom.js"></script>
<script src='js/register_val.js'></script>
<script src="js/login.js"></script>
</body>
</html>