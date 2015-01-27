<?php
include_once("../function.php");
$id=$_GET['id'];
mysql_query("delete from `page` where `slno`='$id'")or die(mysql_error());
$msg="Sucessfully deleted.";
header("location:add_indexcontent.php?msg=$msg");
?>