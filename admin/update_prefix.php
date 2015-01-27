<?php
include_once("../function.php");
if(isset($_POST['submit']))
{
$prefix=htmlentities($_POST['prefix'],ENT_QUOTES);
$id=htmlentities($_POST['hid'],ENT_QUOTES);
$qwe=mysql_query("update `prefix` set `prefix` = '$prefix' where `slno`='$id' ")or die(mysql_error());
$msg="Updated successfully.";
}
header("location:addprefix.php?msg=$msg");
?>