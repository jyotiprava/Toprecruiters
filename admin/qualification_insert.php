<?php
include_once("../function.php");
$qualification=htmlentities($_POST['qualification'],ENT_QUOTES);

mysql_query("insert into `qualification` set `qualification`='$qualification'")or die(mysql_error());
$msg="Qualification Added Successfully";
header("location:addqualification.php?msg=$msg");
?>