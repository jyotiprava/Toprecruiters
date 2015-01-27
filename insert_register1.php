<?php
include_once("function.php");
if(isset($_POST['registerbtn'])){
$firstname=htmlentities($_POST['fname'],ENT_QUOTES);
$lastname=htmlentities($_POST['lname'],ENT_QUOTES);
$email=htmlentities($_POST['newemail'],ENT_QUOTES);
$contact=htmlentities($_POST['contact'],ENT_QUOTES);
$password=md5(htmlentities($_POST['password1'],ENT_QUOTES));
$join_date=date('Y-m-d');
$uniquekey=md5($firstname.'--'.$lastname.'--'.$email.'--'.$join_date.'--'.time());
	$sql=mysql_query("select * from `user_detail` where `emailid`='$email'and `is_employer`='1'")or die(mysql_error());
    $num=mysql_num_rows($sql);
    if($num==0)
    {
    mysql_query("insert into `user_detail` set `first_name`='$firstname',`last_name`='$lastname',`emailid`='$email',`password`='$password',`join_date`='$join_date',`uniquekey`='$uniquekey',`contact`='$contact' ,`is_employer`='1'")or die(mysql_error());
	
$to = $email;
$subject = "Account details for $firstname  $lastname at Top Recruiters";

$message = "
<html>
<head>
<title>Account details for $firstname  $lastname at Top Recruiters</title>
</head>
<body>
<p>Dear $firstname  $lastname,

Thank you for registering for Top Recruiters. You may now log in by clicking this link:

http://23.253.22.203/job/validate.php?uniquekey=$uniquekey

This will verify your account and log you into the site. In the future you will be able to log in to http://krititech.in/job/mypage.php using the username and password that you created during registration.
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

	$msg="Dear $firstname Congratulations! Your new account has been successfully created!";
	}
	else{
	$msg="This is already exist.Please register with another emailid.";
	}
}
header("location:login1.php?mess=$msg");
?>
