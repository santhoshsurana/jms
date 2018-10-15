<?php 
 session_start();
 require_once('functions.php');
 require_once('sendmail.php');
	$email=$_POST['email'];
	$sql = "SELECT `id`,`login_token` FROM `user` WHERE `email`=".$email;
	_db($sql);
	$result=mysqli_query($CON, $sql);
	$data=mysqli_fetch_row($result);
	$id=$data['0'];
	$token=$data['1'];
	
$message = "
 <html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' href='http://jamesmatrimony.com/jm/view/css/bootstrap.css'>
    <link rel='stylesheet' type='text/css' href='http://jamesmatrimony.com/jm/view/css/bootstrap-responsive.css'>
    <link rel='stylesheet' type='text/css' href='http://jamesmatrimony.com/jm/view/css/style.css'>
    <link rel='icon' href='img/favicon.ico'>
    <title>
      Jamesmatrimony.com
    </title>
  </head>
  
  <body>
    <div style='width:600px;margin:0 auto;'>
      <center>
        <a href='http://jamesmatrimony.com/jm/index.php'>
          <img src='http://jamesmatrimony.com/jm/view/img/cm_logo.png' style='background:darkorange;'>
        </a>
      </center>
      
      <p>
             
        Please click the below link to reset your jamesmatrimony account password 
        <a href='http://jamesmatrimony.com/jm/view/verify.php?id=".$id."&token=".$token."&target=reset'>
          http://jamesmatrimony.com/jm/view/verify.php?id=".$id."&token=".$token."&target=reset
        </a>
        \r\n
        To log in to Member Account 
        <a href='http://jamesmatrimony.com/jm/view/login.php'>
          click here
        </a>
      </p>
    </div>
  </body>
</html>";

	sendMail($email, 'Jamesmatrimony Password reset', 'noreply@jamesmatrimony.com', $message);
	
?>