<?php
include_once("../function.php");
$id=$_GET['id'];
//echo "update `user_detail` set `shortlisted`='0' where `slno`='$id'";
mysql_query("update `user_detail` set `shortlisted`='0' where `slno`='$id'")or die(mysql_error());     
?>