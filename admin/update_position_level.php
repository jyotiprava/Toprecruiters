<?php
include_once("../function.php");
if(isset($_POST['submit']))
{
$pos_level=htmlentities($_POST['position'],ENT_QUOTES);
$id=htmlentities($_POST['hid'],ENT_QUOTES);
//echo "update `position_level` set `position` = '$pos_level' where `slno`='$id'";
$qwe=mysql_query("update `position_level` set `position` = '$pos_level' where `slno`='$id' ")or die(mysql_error());
$msg="Updated successfully.";
header("location:positionlevel.php?msg=$msg");
}
header("location:positionlevel.php?msg=$msg");
?>