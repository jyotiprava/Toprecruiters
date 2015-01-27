<?php
include_once("../function.php");
$qualification=htmlentities($_POST['qualification'],ENT_QUOTES);
$idval=$_POST['idval'];

mysql_query("update `qualification` set `qualification`='$qualification' where `id`='$idval'")or die(mysql_error());
$msg="Qualification Updated Successfully";
header("location:addqualification.php?msg=$msg");
?>