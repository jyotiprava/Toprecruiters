<?php
include_once("../function.php");
$delete=$_GET['id'];
$query=mysql_query("delete from `bottomimage` where `slno`='$delete'") or die(mysql_error());
$msg="Deleted Successfully";
header("Location:add_banner1.php?msg=$msg");

?>