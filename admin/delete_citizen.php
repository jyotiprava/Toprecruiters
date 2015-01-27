<?php
include_once("../function.php");
$id=$_GET['id'];
$res=mysql_query("delete from `citizenship`  where `slno`='$id'");
$msg="sucessfully deleted";
header("location:addcitizen.php?msg=$msg");
?>
