<?php
include_once("../function.php");
$hid=$_GET['id'];
$expno=explode(',', $hid);
foreach($expno as $value)
{												 
if($value!="")
{
 $res=mysql_query("update `cv_detail` set `shortlisted`='0'") or die(mysql_error());
 }
}
?>
