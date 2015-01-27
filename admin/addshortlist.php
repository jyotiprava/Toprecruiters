<?php
include_once("../function.php");
$id=$_GET['id'];
mysql_query("update `cv_detail` set `shortlisted`='1' where `slno`='$id'") or die(mysql_error());
$qwe=mysql_query("select * from `cv_detail` where `slno`='$slno' ")or die(mysql_error());
$res=mysql_fetch_array($qwe);
$emails=$res['email'].'<br />';
$contacts=$res['home_contact'].'<br />';
echo $emails.'|'.$contacts;
?>
 