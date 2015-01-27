<?php
include_once("function.php");
$email=$_SESSION['userid'];
$cpwd=md5(htmlentities($_POST['cpwd'],ENT_QUOTES));
$npwd=md5(htmlentities($_POST['npwd'],ENT_QUOTES));
$conpwd=md5(htmlentities($_POST['conpwd'],ENT_QUOTES));
$sqlpwd=mysql_query("select `password` from `user_detail` where `emailid`='$email'");
$respwd=mysql_fetch_array($sqlpwd);
if($cpwd!=$respwd['password'])
{
$msg="<span style='color:red;'>Incorrect Current Password</span>";
}
else if($npwd!=$conpwd)
{
$msg="<span style='color:red;'>New Password and Confirm Password are mismatched</span>";
}
else{
mysql_query("update `user_detail` set `password`='$npwd' where `emailid`='$email'");
$msg="Password changed successfully";
}
header("location:mypage.php?msg=$msg");
?>