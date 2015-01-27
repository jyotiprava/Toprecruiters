<?php
include_once("../function.php");
$id=$_GET['id'];
$res=mysql_query("delete from `prefix`  where `slno`='$id'");
$msg="sucessfully deleted";
header("location:addprefix.php?msg=$msg");
?>
