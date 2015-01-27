<?php
include_once("../function.php");
$slno=$_GET['id'];
//echo "update `user_detail` set `shortlisted`='1' where `slno`='$slno'";
mysql_query("update `user_detail` set `shortlisted`='1' where `slno`='$slno'")or die(mysql_error());
$qwe=mysql_query("select * from `user_detail` where `slno`='$slno' ")or die(mysql_error());
$res=mysql_fetch_array($qwe);
$mail=$res['emailid'].'<br />';
$status=$res['shortlisted'];
$contact=$res['contact'].'<br />';
echo $mail.'|'.$contact;

?>
