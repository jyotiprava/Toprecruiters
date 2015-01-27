<?php
include_once("function.php");
$id=$_GET['slvall'];
mysql_query("delete from `education` where `slno`='$id'");
?>