<?php
include_once("function.php");
$id=$_GET['idval'];
$sel=$_GET['sel'];
mysql_query("update `alljob` set `status`='$sel' where `id`='$id'");
?>