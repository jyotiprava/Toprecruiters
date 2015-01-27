<?php
include_once("../function.php");

$staffid=$_GET['staffid'];
$candidateid=$_GET['candidateid'];
$in_pos=$_GET['in_pos'];
$date=$_GET['date'];
$in_datetime=$_GET['in_datetime'];
$consultant=$_GET['consultant'];

mysql_query("insert into `create_interview` set `staff_id`='$staffid',`candiate_id`='$candidateid',`position`='$in_pos',`arrangon`='$date',`in_datetime`='$in_datetime',`consultant`='$consultant'")or die(mysql_error());
echo "OK";
?>