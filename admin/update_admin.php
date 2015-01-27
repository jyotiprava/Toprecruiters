<?php
include_once("../function.php");
if(isset($_POST['submit']))
{
$email=htmlentities($_POST['email'],ENT_QUOTES);
$loction=htmlentities($_POST['loction'],ENT_QUOTES);
$usrname=htmlentities($_POST['usrname'],ENT_QUOTES);
$pwd=md5(htmlentities($_POST['pwd'],ENT_QUOTES));
$id=htmlentities($_POST['hdval'],ENT_QUOTES);

$qwe=mysql_query("update `admin` set `emailid`='$email',`location`='$loction',`username`='$usrname',`password`='$pwd' where `slno`='$id' ")or die(mysql_error());
$msg="Updated successfully.";
}
header("location:new_account.php?msg=$msg");
?>