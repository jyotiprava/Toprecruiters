<?php
include_once('../function.php');
is_admin();
$slno=$_GET['slno'];
$jid=$_GET['jid'];

mysql_query("insert into `admin_suggest` set `jobid`='$jid',`userid`='$slno'")or die(mysql_error());
header("location:view_jobvacancy.php");
?>