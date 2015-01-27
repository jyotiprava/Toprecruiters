<?php
include_once("../function.php");
$del=$_GET['id'];
echo "delete from `industry` where `slno`='$del'";
$query=mysql_query("delete from `industry` where `slno`='$del'") or die(mysql_error());
$msg="deleted successfully";
header("Location:addspecialization.php?msg=$msg");
?>
