<?php
include_once("../function.php");
$delete=$_GET['id'];
$query=mysql_query("delete from `admin_testimonial` where `slno`='$delete'") or die(mysql_error());
$msg="Deleted Successfully";
header("Location:add_testimonial.php?msg=$msg");

?>