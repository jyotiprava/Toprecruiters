<?php
include_once("../function.php");
$id=$_GET['id'];
$res=mysql_query("delete from `country`  where `slno`='$id'");
$msg="sucessfully deleted";
header("location:addcountry.php?msg=$msg");
?>
