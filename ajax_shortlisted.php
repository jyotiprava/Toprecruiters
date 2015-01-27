<?php
include_once("function.php");
$applyid=$_GET['id'];
//echo "update `job_apply` set `shortlisted`='1' where `id`='$applyid'";
mysql_query("update `job_apply` set `shortlisted`='1' where `id`='$applyid'") or die(mysql_error());
echo "OK";
?>
