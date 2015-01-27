<?php
include_once("../function.php");
if(isset($_POST['submit'])){

$username1=htmlentities($_POST['usrname'],ENT_QUOTES);
$password1=md5(htmlentities($_POST['pass'],ENT_QUOTES));

$qwery1=mysql_query("select * from `admin` where `username`='$username1' and `password`='$password1' and `status`='2'")or die(mysql_error());
$result1=mysql_num_rows($qwery1);
$res1=mysql_fetch_array($qwery1);
if($result1>0)
{
   	$_SESSION['user']=$username1;
	 $_SESSION['pwd']=$res1['password'];
	 $_SESSION['type']="superadmin";
     header("location:../admin/viewrequest.php");
	
}
else{
    $msg='Invalid username or password.';
   header("location:index.php?msg=$msg");
  
	}
}
?>