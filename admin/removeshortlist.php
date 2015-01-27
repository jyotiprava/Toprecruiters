<?php
include_once("../function.php");
$cvid=$_GET['id'];
mysql_query("update `cv_detail` set `shortlisted`='0' where `slno`='$cvid'") or die(mysql_error());
?>
 