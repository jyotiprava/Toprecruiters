<?php
include_once("function.php");
$email=$_SESSION['userid'];
$fname=htmlentities($_POST['fname'],ENT_QUOTES);
$lname=htmlentities($_POST['lname'],ENT_QUOTES);
$newemail=htmlentities($_POST['newemail'],ENT_QUOTES);
mysql_query("update `user_detail` set `first_name`='$fname',`last_name`='$lname' where `emailid`='$newemail'");
$msg="successfully updated";
header("location:mypage.php?msg=$msg");
?>
