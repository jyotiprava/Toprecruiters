<?php
include_once("../function.php");
$delete=$_GET['id'];
$query=mysql_query("delete from `feautred_emplyer` where `id`='$delete'") or die(mysql_error());
$msg="Deleted Successfully";
header("Location:add_fetrempl.php?msg=$msg");

?>