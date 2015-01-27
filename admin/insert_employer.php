<?php
include_once("../function.php");
$emplr_fname=htmlentities($_POST['emplr_fname'],ENT_QUOTES);
$emplr_lname=htmlentities($_POST['emplr_lname'],ENT_QUOTES);
$emplr_email=htmlentities($_POST['emplr_email'],ENT_QUOTES);
$emplr_password1=md5(htmlentities($_POST['emplr_password1'],ENT_QUOTES));
$join_date=date('Y-m-d');
$uniquekey=md5($emplr_fname.'--'.$emplr_lname.'--'.$emplr_email.'--'.$join_date.'--'.time());
if(isset($_SESSION['user'])){
$type=$_SESSION['user'];
}
else
{
$type=$_SESSION['username'];
}

$sql1=mysql_query("select * from `user_detail` where `emailid`='$emplr_email' and `is_employer`='1'");  
$num1=mysql_num_rows($sql1);
if($num1==0){
mysql_query("insert into `user_detail` set `emailid`='$emplr_email',`first_name`='$emplr_fname',`last_name`='$emplr_lname',`password`='$emplr_password1',`join_date`='$join_date',`uniquekey`='$uniquekey',`is_employer`='1',`type`='$type'")or die(mysql_error());
$subject="New account created";
$message="Congratulations! Your new account has been successfully created!Username=$emplr_email and Password=$emplr_password1";
 $to = $emplr_email;
$subject = "Account details for $emplr_fname  $emplr_lname at Top Recruiters";

$message = "
<html>
<head>
<title>Account details for $emplr_fname  $emplr_lname at Top Recruiters</title>
</head>
<body>
<p>Dear $emplr_fname  $emplr_lname,

Thank you for registering for Top Recruiters. You may now log in by clicking this link:

http://23.253.22.203/job/admin/approve_account.php?uniquekey=$uniquekey
<br/>
--
<br/>
Top Recruiters team</p>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webmaster@example.com>' . "\r\n";

mail($to,$subject,$message,$headers);

	$msg="Dear $emplr_fname Congratulations! Your new account has been successfully created!";
	}
	else{
	$msg="This is already exist.Please register with another emailid.";
	}

header("location:create_account1.php?msg=$msg");
?>