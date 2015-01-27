<?php
include_once("../function.php");
if(isset($_POST['submit'])){

$username=htmlentities($_POST['usrname'],ENT_QUOTES);
$password=md5(htmlentities($_POST['pass'],ENT_QUOTES));

$qwery=mysql_query("select * from `admin` where `username`='$username' and `password`='$password' and `status`='1'")or die(mysql_error());
//echo "select * from `admin` where `username`='$username' and `password`='$password'";
echo "select * from `admin` where `username`='$username' and `password`='$password' and `status`='1'";
$result=mysql_num_rows($qwery);
$res=mysql_fetch_array($qwery);
if($result>0)
{
  	$_SESSION['username']=$username;
	 $_SESSION['password']=$res['password'];
	 $_SESSION['type']="admin";
     header("location:viewrequest.php");
}
else{
    $msg='Invalid username or password.';
   header("location:index.php?msg=$msg");
   
	}
}
?>