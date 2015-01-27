<?php
include_once("../function.php");
$req_status=htmlentities($_POST['req_status'],ENT_QUOTES);
$progress=htmlentities($_POST['progress'],ENT_QUOTES);
$staffid=$_POST['staffid'];
$signed_date=htmlentities($_POST['signed_date'],ENT_QUOTES);
$signed_by=htmlentities($_POST['signed_by'],ENT_QUOTES);
$designation=htmlentities($_POST['designation'],ENT_QUOTES);
$client_feedback=htmlentities($_POST['client_feedback'],ENT_QUOTES);


mysql_query("update `staff_request` set `request_status`='$req_status',`progress`='$progress',`signed_date`='$signed_date',`signed_by`='$signed_by',`designation`='$designation',`client_feedback`='$client_feedback' where `id`='$staffid'")or die(mysql_error());
header("location:viewrequest.php?id=$staffid");
?>