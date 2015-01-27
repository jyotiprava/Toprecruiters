<?php
include_once("../function.php");
$vals=$_GET['vals'];
$slno=$_GET['slno'];
mysql_query("update `user_detail` set `status`='$vals' where `slno`='$slno'") or die(mysql_error());
?>
