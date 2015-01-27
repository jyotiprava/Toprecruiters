<?php
include_once("../function.php");
$locname=htmlentities($_POST['locname'],ENT_QUOTES);
$id=htmlentities($_POST['hidden_id'],ENT_QUOTES);
mysql_query("update `location` set `location`='$locname' where `slno`='$id'");
$msg="successfully updated";
header("location:addlocation.php?msg=$msg");
?>
