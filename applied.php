<?php
include_once("function.php");
if(isset($_POST['submit'])){
$id=$_SESSION['useridval'];
$postid=htmlentities($_POST['hid'],ENT_QUOTES);
$fname=htmlentities($_POST['fname'],ENT_QUOTES);
$lname=htmlentities($_POST['lname'],ENT_QUOTES);
$mail=htmlentities($_POST['email'],ENT_QUOTES);
$phone=htmlentities($_POST['phone'],ENT_QUOTES);       
$qwe=mysql_query("insert into `job_apply` set `fname`='$fname',`lname`='$lname',`email`='$mail',`contactno`='$phone',`employee_id`='$id',`postid`='$postid'")or die(mysql_error());

if($qwe){
$msg="You are successfully applied";
}
else{
$msg="Please try Again!";
}
}
header("location:index.php?msg=$msg");

?>
