<?php
include_once("../function.php");
$jobid=$_GET['id1'];
mysql_query("delete from `alljob` where `id`='$jobid'");
$msg="successfully deleted";
header("location:addjob.php?msg=$msg");
?>
