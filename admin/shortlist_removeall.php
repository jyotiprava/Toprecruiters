<?php
include_once("../function.php");
$hid=$_GET['id'];
$expno=explode(',', $hid);
foreach($expno as $value)
{												 
if($value != "")
{
 $res=mysql_query("update `cv_detail` set `shortlisted`='0' where `slno`='$value'") or die(mysql_error());						
 }
}
?>
<span style="float: left;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;" onclick="return addallshort();">Add All to Shortlist</span>	
