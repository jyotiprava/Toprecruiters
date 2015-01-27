<?php
include_once("../function.php");
$id=$_GET['id'];

mysql_query("delete from `fieldofstudy` where `id`='$id'");
echo "OK";
?>