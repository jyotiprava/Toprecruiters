<?php
include_once("../function.php");
if(isset($_POST['submit']))
{
$citizen=htmlentities($_POST['citizen'],ENT_QUOTES);
$id=htmlentities($_POST['hid'],ENT_QUOTES);
$qwe=mysql_query("update `citizenship` set `citizen` = '$citizen' where `slno`='$id' ")or die(mysql_error());
$msg="Updated successfully.";
}
header("location:addcitizen.php?msg=$msg");
?>