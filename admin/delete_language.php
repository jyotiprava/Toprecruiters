<?php
include_once("../function.php");
$id=$_GET['id'];
mysql_query("delete from `language`  where `slno`='$id'");
$msg="sucessfully deleted";
header("location:addlanguage.php?msg=$msg");
?>