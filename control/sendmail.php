<?php
function sendMail($toEmail, $subject, $fromEmail, $message){
$headers = "From: " . strip_tags($fromEmail)."\r\n";
$headers .= "Reply-To: ". strip_tags($fromEmail) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//send the email
$mail_sent = @mail( $toEmail, $subject, $message, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
}
?>