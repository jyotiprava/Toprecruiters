<?php
include_once("../function.php");
$id=$_GET['id'];
$res=mysql_query("delete from `skill`  where `slno`='$id'");
$msg="sucessfully deleted";
header("location:add_skill.php?msg=$msg");
?>
