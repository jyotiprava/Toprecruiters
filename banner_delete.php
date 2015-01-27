<?php
include_once("../function.php");
is_admin();
$id=$_GET['id'];
mysql_query("delete * from `banner` where `id`='$id'")or die(mysql_error());
$msg="Banner Deleted Successfully.";
header("location:banner.php?msg=$msg");
?>