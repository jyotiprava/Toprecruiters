<?php
include_once("../function.php");
$del=$_GET['id'];
$query=mysql_query("delete from `user_detail` where `slno`='$del'") or die(mysql_error());
//echo "delete from `user_detail` where `slno`='$del'";
$msg="Successfully Deleted";
header("Location:employee_approve.php?msg=$msg");

?>
