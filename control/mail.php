<?php
//define the receiver of the email
$to = $_POST[''];
//define the subject of the email
$subject = $_POST['']; 
//create a boundary string. It must be unique 
//so we use the MD5 algorithm to generate a random hash
$random_hash = md5(date('r', time())); 
$headers = "From: " . strip_tags('noreply@azul.in')."\r\n";
$headers .= "Reply-To: ". strip_tags('noreply@azul.in') . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//define the body of the message.
ob_start(); //Turn on output buffering
$message = '<html><body>';
$message .= '<img src="http://azul.in/jm/view/img/cm_logo.png" alt="jm logo" />';
$message .= "<h3>" . strip_tags('noreply@azul.in') . "</h3>";
$message .= "</body></html>";
//send the email
$mail_sent = @mail( $to, $subject, $message, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
?>