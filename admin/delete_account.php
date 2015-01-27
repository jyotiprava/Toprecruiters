<?php
include_once("../function.php");

$id=$_GET['id'];

$query=mysql_query("delete from `admin` where `slno`='$id'") or die(mysql_error());
$msg="deleted successfully";
header("Location:new_account.php?msg=$msg");

?>
