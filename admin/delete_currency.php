<?php
include_once("../function.php");

$id=$_GET['id'];

$query=mysql_query("delete from `currency` where `slno`='$id'") or die(mysql_error());
$msg="deleted successfully";
header("Location:add_currency.php?msg=$msg");

?>
