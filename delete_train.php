<?php
include_once("function.php");
$id=$_GET['sllval'];
mysql_query("delete from `training` where `slno`='$id'");
?>