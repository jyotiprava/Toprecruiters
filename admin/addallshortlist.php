<?php
include_once("../function.php");
$hid=$_GET['id'];
$expno=explode(',', $hid);
foreach($expno as $value)
{												 
if($value != "")
{
 $res=mysql_query("update `cv_detail` set `shortlisted`='1' where `slno`='$value'") or die(mysql_error());
 $cvdetail=mysql_query("select * from `cv_detail` where `slno`='$value'");
	while($res=mysql_fetch_array($cvdetail))
	{
	$email=$res['email'];
	$email1=$email."<br>";
	$phone=$res['home_contact'].'<br />';
	echo $email1.'|'.$phone;
	}							
 }
//echo "Remove from shortlist";
}
?>
