<?php
include_once("../function.php");
$areaid=$_GET['id1'];
mysql_query("delete from `location` where `slno`='$areaid'");
$msg="successfully deleted";
header("location:addlocation.php?msg=$msg");
?>
