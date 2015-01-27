<?php
include_once("../function.php");
$jobid=$_GET['id1'];
echo "delete from `alljob` where `id`='$jobid'";
mysql_query("delete from `alljob` where `id`='$jobid'");
$msg="successfully deleted";
header("location:post.php?msg=$msg");
?>
