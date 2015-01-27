<?php
include_once("../function.php");
$slno=$_GET['slno'];

mysql_query("update `staff_request` set `shortlist`='0' where `id`='$slno'")or die(mysql_error());
echo "OK";
?>