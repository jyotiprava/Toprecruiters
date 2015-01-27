<?php
include_once("../function.php");

$id=$_GET['id'];

$query=mysql_query("delete from `position_level` where `slno`='$id'") or die(mysql_error());
$msg="deleted successfully";
header("Location:positionlevel.php?msg=$msg");

?>
