<?php
include_once("function.php");
if(isset($_POST['loginbtn'])){
$user=htmlentities($_POST['email'],ENT_QUOTES);
$res=mysql_query("select * from `user_detail` where `emailid`='$user' and `is_employer`='0'");
echo "select * from `user_detail` where `emailid`='$user' and `is_employer`='0'";
$no=mysql_num_rows($res);
if($no>=1){
$to =$user;
$subject = "forgot password.";
$link = "23.253.22.203/job/updatepwd.php?emailid=$user";
$message = "Please click the following link to activate your account: ".$link; 
$from = "info@mysite.com";
$headers = "From: $from";
$msg="Please check your mail";
mail($to,$subject,$message,$headers); 
header("location:login.php?mess=$msg");
}
else{
header("location:forgotpassword.php");
}
}
?>
