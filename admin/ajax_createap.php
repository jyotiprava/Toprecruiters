<?php
include_once("../function.php");

$staffid=$_GET['staffid'];
$candidateid=$_GET['candidateid'];
$ap_position=$_GET['ap_position'];
$start_date=$_GET['start_date'];
$ap_netsale=$_GET['ap_netsale'];
$ap_remark=$_GET['ap_remark'];
$ap_consultant=$_GET['ap_consultant'];

mysql_query("insert into `appointment_candidate` set `staffid`='$staffid',`candidateid`='$candidateid',`ap_position`='$ap_position',`start_date`='$start_date',`ap_netsale`='$ap_netsale',`ap_remark`='$ap_remark',`ap_consultant`='$ap_consultant'")or die(mysql_error());
echo "OK";
?>