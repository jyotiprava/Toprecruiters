<?php
include_once("../function.php");
$id=$_GET['id'];
$res=mysql_query("delete from `job_function`  where `slno`='$id'");
$msg="sucessfully deleted";
header("location:add_subspecialization.php?msg=$msg");
?>
