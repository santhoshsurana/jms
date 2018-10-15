
<?php require_once('../control/functions.php');
require_once('../control/sendmail.php');
 $message="
 <html><head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel='stylesheet' type='text/css' href='http://azul.in/jm/view/css/bootstrap.css'>
<link rel='stylesheet' type='text/css' href='http://azul.in/jm/view/css/bootstrap-responsive.css'>
<link rel='stylesheet' type='text/css' href='http://azul.in/jm/view/css/style.css'>
<link rel='icon' href='img/favicon.ico'>
<title>Jamesmatrimony.com</title>
</head>

<body>

<center><a href='http://azul.in/jm/index.php'><img src='http://azul.in/jm/view/img/cm_logo.png' style='background:darkorange;'></a></center>

<p>
Hello". $name.",

 This email is to inform you that your new Jamesmatrimony user account has been created.
please verify your user account <a href='http://azul.in/jm/view/verify.php?id=".$id."&token=".$token."'>http://azul.in/jm/view/verify.php?id=".$id."&token=".$token."</a>
To log in to Member Account <a href='http://azul.in/jm/view/login.php'>click here</a>
</p>

</body></html>";
sendMail('santhosh.surana@gmail.com', 'Jamesmatrimony Email Verification', 'noreply@azul.in',  $message);
?>