<?php
include_once("../function.php");
$email=htmlentities($_POST['email'],ENT_QUOTES);
$loction=htmlentities($_POST['loction'],ENT_QUOTES);
$usrname=htmlentities($_POST['usrname'],ENT_QUOTES);
$pwd=md5(htmlentities($_POST['pwd'],ENT_QUOTES));

$sql=mysql_query("select * from `admin` where `location`='$loction' and `status`='1'");  
$num=mysql_num_rows($sql);	
if($num==0){
$sql1=mysql_query("select * from `admin` where `username`='$usrname' and `status`='1'");  
$num1=mysql_num_rows($sql1);
if($num1==0){
mysql_query("insert into `admin` set `emailid`='$email',`location`='$loction',`username`='$usrname',`password`='$pwd',`status`='1'")or die(mysql_error());
$subject="New account created";
$message="Congratulations! Your new account has been successfully created!Username=$usrname and Password=$pwd";
 $to=$email;
 $headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <info@mysite.com>' . "\r\n";
 mail($to,$subject,$message,$headers);
 $msg="Succesfully Added";
}
else{
$msg="Username is already exist";
}
}
else{
$msg="This user exist in this location";
}
header("location:new_account.php?msg=$msg");
?>