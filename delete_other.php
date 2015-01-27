<?php
include_once("function.php");
$id=$_GET['slval'];
mysql_query("delete from `language_details` where `slno`='$id'");
?>