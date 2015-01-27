<?php
include_once("../function.php");
is_admin();
$id=$_GET['id'];
mysql_query("delete from `qualification` where `id`='$id'")or die(mysql_error());
$msg="Qualification deleted successfully";
header("location:addqualification.php?msg=$msg");
?>