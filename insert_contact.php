<?php
include_once("function.php");
if(isset($_POST['submit'])){
$title=htmlentities($_POST['title'],ENT_QUOTES);
$name=htmlentities($_POST['name'],ENT_QUOTES);
$company=htmlentities($_POST['company'],ENT_QUOTES);
$email=htmlentities($_POST['email'],ENT_QUOTES);
$contact=htmlentities($_POST['contact'],ENT_QUOTES);
$subject=htmlentities($_POST['subject'],ENT_QUOTES);
$other=htmlentities($_POST['other'],ENT_QUOTES);
$message=htmlentities($_POST['message'],ENT_QUOTES);
	
}
header("location:index.php?msg=$msg");
?>
