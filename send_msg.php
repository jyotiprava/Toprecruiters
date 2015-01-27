<?php 
include_once("function.php");
if(isset($_POST["post"])){
$email=htmlentities($_POST['email'],ENT_QUOTES);
$msg=htmlentities($_POST['message'],ENT_QUOTES);
$to=$email;
$subject="You are Shortlisted."	;
$message=$msg;
$headers="From: webmaster@example.com\r\nReply-To: webmaster@example.com";
$mail = mail( $to, $subject , $message, $headers );	
echo $mail ? "Mail sent" : "Mail failed";
}
?>